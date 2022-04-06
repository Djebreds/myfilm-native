<?php

class Dabes
{
    public function __construct()
    {
        // connection database
        $db_user = "root";
        $db_pass = "root";
        $db_host = "localhost";
        $db_name = "Films";

        // check the connection
        try {
            $this->db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage());
        }
    }

    public function addFilm($data)
    {
        $title = self::validate($data['title']);
        $genres = $data['genres'];
        $synopsis = self::validate($data['synopsis']);
        $release_date = self::validate($data['release_date']);
        $runtime = self::validate($data['runtime']);
        $production = self::validate($data['production']);
        $director = self::validate($data['director']);
        $merge_genre = implode(", ", $genres);

        // query to Films table
        $picture = self::uploadFilm();

        if (!$picture) {
            return false;
        }

        $query = $this->db->prepare("INSERT INTO Films (title, release_date, picture, synopsis ,runtime) VALUES (:title, :release_date, :picture, :synopsis, :runtime)");
        $query->bindParam(':title', $title);
        $query->bindParam(':synopsis', $synopsis);
        $query->bindParam(':release_date', $release_date);
        $query->bindParam(':picture', $picture);
        $query->bindParam(':runtime', $runtime);
        $query->execute();

        // insert data genres_films
        $query = $this->db->prepare("INSERT INTO genres_films (genre_name) VALUE (:genre) ");
        $query->bindParam(':genre', $merge_genre);
        $query->execute();

        // select the newest data from films
        $query = $this->db->prepare("SELECT max(id_film) AS last_id FROM films LIMIT 1");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $last_id = $result[0]["last_id"];

        // select the newest data from genres_films
        $query = $this->db->prepare("SELECT max(genre_id) AS genre FROM genres_films LIMIT 1");
        $query->execute();
        $id_result = $query->fetchAll(PDO::FETCH_ASSOC);
        $id_genre = $id_result[0]["genre"];

        // insert data film_production
        $query = $this->db->prepare("INSERT INTO films_productions (film_id, production_id) VALUES (:last_id, :production_id)");
        $query->bindParam(':last_id', $last_id);
        $query->bindParam(':production_id', $production);
        $query->execute();

        // insert data films_genres
        $query = $this->db->prepare("INSERT INTO films_genres (film_id, genre_id) VALUES (:last_id, :id_genre)");
        $query->bindParam(':last_id', $last_id);
        $query->bindParam(':id_genre', $id_genre);
        $query->execute();

        // insert data films_directors
        $query = $this->db->prepare("INSERT INTO films_directors (film_id, directors_id) VALUE (:last_id, :director_id)");
        $query->bindParam(':last_id', $last_id);
        $query->bindParam(':director_id', $director);
        $query->execute();

        return $query->rowCount();
    }

    public function showGenres()
    {
        $query = $this->db->prepare("SELECT * FROM genres");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showListGenres()
    {
        $query = $this->db->prepare("SELECT * FROM genre_list");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showProduction()
    {
        $query = $this->db->prepare("SELECT * FROM productions");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function showDirector()
    {
        $query = $this->db->prepare("SELECT * FROM directors");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function showFilms()
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date FROM films 
                INNER JOIN films_genres ON films.id_film = films_genres.film_id 
                INNER JOIN films_productions ON films.id_film = films_productions.film_id
                INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
                INNER JOIN productions ON productions.id_production = films_productions.production_id
                ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function addGenre_ist($data)
    {
        $name_genre = self::validate($data['genre_list']);

        $query = $this->db->prepare("INSERT INTO genre_list (genre_list) VALUES (:new_genre)");
        $query->bindParam(':new_genre', $name_genre);
        $query->execute();

        return $query->rowCount();
    }

    public function addProduction_list($data)
    {
        $name_production = self::validate($data['name_production']);
        $founded_date = $data['founded_date'];

        $query = $this->db->prepare("INSERT INTO productions (name_production, founded_date) VALUES ()");
        $query->bindParam(':new_production', $name_production);
        $query->bindParam(':founded_date', $founded_date);
        $query->execute();

        return $query->rowCount();
    }

    public function addDirector_list($data)
    {
        $director_name = self::validate($data['name']);
        $about = self::validate($data['about']);

        $query = "INSERT INTO directors (name, about) VALUES ('$director_name', '$about')";
        $query = $this->db->prepare("INSERT INTO directors (name, about) VALUES ()");
        $query->bindParam(':new_director', $director_name);
        $query->bindParam(':about', $about);
        $query->execute();

        return $query->rowCount();
    }

    public function showFilmsById($id)
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name FROM films 
                INNER JOIN films_genres ON films.id_film = films_genres.film_id 
                INNER JOIN films_productions ON films.id_film = films_productions.film_id
                INNER JOIN films_directors ON films.id_film = films_directors.film_id
                INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
                INNER JOIN productions ON productions.id_production = films_productions.production_id
                INNER JOIN directors ON directors.id = films_directors.directors_id
                WHERE films.id_film = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateFilm($data)
    {

        // select the newest data from films
        $id_film = self::validate($data['id_film']);
        $title = self::validate($data['title']);
        $genres = $data['genres'];
        $synopsis = self::validate($data['synopsis']);
        $release_date = self::validate($data['release_date']);
        $runtime = self::validate($data['runtime']);
        $production = self::validate($data['production']); // id na
        $director = self::validate($data['director']); // id na
        $merge_genre = implode(", ", $genres);
        $oldPicture = $data['oldPicture'];
        $genre_id = $data['genre_id'];

        if ($_FILES['picture']['error'] === 4) {
            $picture = $oldPicture;
        } else {
            $picture = self::uploadFilm();
        }
        // $query = $this->db->prepare("SELECT max(id_film) AS last_id FROM films LIMIT 1");
        // $query->execute();
        // $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // $last_id = $result[0]["last_id"];

        // // select the newest data from genres_films
        // $query = $this->db->prepare("SELECT max(genre_id) AS genre FROM genres_films LIMIT 1");
        // $query->execute();
        // $id_result = $query->fetchAll(PDO::FETCH_ASSOC);
        // $id_genre = $id_result[0]["genre"];

        // $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name 
        //         FROM films 

        // $sql = "UPDATE films 
        //         INNER JOIN films_genres ON films.id_film = films_genres.film_id
        //         INNER JOIN films_productions ON films.id_film = films_productions.film_id
        //         INNER JOIN films_directors ON films.id_film = films_directors.film_id
        //         INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id
        //         INNER JOIN productions ON productions.id_production = films_productions.production_id
        //         INNER JOIN directors ON directors.id = films_directors.directors_id 
        //         SET films.title = $title, films.release_date = $release_date, films.picture = $picture, films.synopsis = $synopsis, films.runtime = $runtime,
        //             -- films_produciton.film_id = $id_film, 
        //             -- 7 = 43
        //             films_directors.directors_id = $director;
        //             films_productions.production_id = $production,
        //             genres_films.genre_name = $merge_genre,
        //             films_directors.directors_id = $id_film
        //             WHERE films.id_films = $id_film";

        // select the newest data from genres_films
        // $query = $this->db->prepare("SELECT max(genre_id) AS genre FROM genres_films LIMIT 1");
        // $query->execute();
        // $id_result = $query->fetchAll(PDO::FETCH_ASSOC);
        // $id_genre = $id_result[0]["genre"];

        // // insert data film_production
        // $query = $this->db->prepare("INSERT INTO films_productions (film_id, production_id) VALUES (:last_id, :production_id)");
        // $query->bindParam(':last_id', $last_id);
        // $query->bindParam(':production_id', $production);
        // $query->execute();

        // $query = $this->db->prepare("SELECT max(genre_id) AS genre FROM genres_films LIMIT 1");
        // $result = $query->execute();
        // $id_result = $query->fetchAll(PDO::FETCH_ASSOC);
        // $id_genre = $id_result[0]["genre"];


        $sql = "UPDATE films SET title = '$title', release_date = '$release_date', picture = '$picture', synopsis = '$synopsis', runtime = '$runtime' WHERE id_film = '$id_film'";
        $query = $this->db->prepare($sql);
        $query->execute();

        $sql = "UPDATE genres_films, films_genres SET genres_films.genre_name = '$merge_genre' WHERE films_genres.genre_id = genres_films.genre_id AND films_genres.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $query->execute();

        $sql = "UPDATE films_directors, directors SET films_directors.directors_id = directors.id WHERE directors.id = '$director' AND films_directors.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $query->execute();

        $sql = "UPDATE films_productions, productions SET films_productions.production_id = productions.id_production WHERE productions.id_production = '$production' AND films_productions.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $query->execute();

        // // var_dump($query);

        // $sql = "UPDATE genres_films, films_genres SET genres_films.genre_name = '$merge_genre' WHERE films_genres.genre_id = genres_films.genre_id AND films_genres.film_id = '$id_film'";
        // $query = $this->db->prepare($sql);
        // $query->execute();
        // // var_dump($query);
        // // $sql = "UPDATE films_productions 
        // //         JOIN films ON films.id_film = films_productions.film_id
        // //         JOIN productions ON productions.id_production = films_productions.production_id
        // //         SET films_productions.production_id = productions.id_production WHERE productions.name_production = '$production'";

        // $sql = "UPDATE films_productions, productions SET films_productions.production_id = productions.id_production WHERE films_productions.film_id = '$id_film'";
        // $query = $this->db->prepare($sql);
        // $query->execute();

        // $sql = "UPDATE films_directors,films SET films_directors.directors_id = '$director' WHERE films.id_film = '$id_film'";
        // // $sql = "UPDATE films_directors SET directors_id =  ";
        // $query = $this->db->prepare($sql);
        // $query->execute();
        // // var_dump($query);
        // // $sql = "UPDATE films_directors 
        // //         JOIN films ON films.id_film = films_directors.film_id
        // //         JOIN directors ON directors.id = films_directors.directors_id
        // //         SET films_directors.directors_id = directors.id WHERE directors.name = '$director'";
        // $query = $this->db->prepare($sql);
        // $query->execute();
        // // var_dump($query);
        // // die;
        // var_dump($query);
        // var_dump($query->rowCount());
        // die;

        return $query->rowCount();
    }

    public function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function uploadFilm()
    {
        $name = $_FILES['picture']['name'];
        $tmp_name = $_FILES['picture']['tmp_name'];
        $size = $_FILES['picture']['size'];
        $error = $_FILES['picture']['error'];

        if ($error === 4) {
            echo "choose the picture first";
            return false;
        }
        $extension_valid = ['png', 'jpg', 'jpeg'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        if (!in_array($extension, $extension_valid)) {
            echo "the picture must be [png, jpg or jpeg]";
            return false;
        }
        if ($size > 3000000) {
            echo "the picture size to big";
        }

        $namePicture = uniqid();
        $namePicture .= ".";
        $namePicture .= $extension;

        move_uploaded_file($tmp_name, '../Views/uploaded/' . $namePicture);

        return $namePicture;
    }

    public function deleteFilm($id)
    {
        $sql = "DELETE FROM films WHERE id_film = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        // $query->bindParam(':id_film', $id);

        return $query->rowCount();
    }
}
