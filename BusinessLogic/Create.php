<?php
class CreateFilm extends Dabes
{

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
        $picture = parent::uploadFilm();

        if (!$picture) {
            return false;
        }

        $query = $this->db->prepare("INSERT INTO films (title, release_date, picture, synopsis ,runtime) VALUES (:title, :release_date, :picture, :synopsis, :runtime)");
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

    public function addGenre_ist($data)
    {
        $name_genre = self::validate($data['genre_list']);
        $sql = "INSERT INTO genre_list (genre_list) VALUE (:new_genre)";
        $query = $this->db->prepare($sql);
        $query->bindParam(':new_genre', $name_genre);
        $query->execute();

        return $query->rowCount();
    }

    public function addProduction_list($data)
    {
        $name_production = self::validate($data['name_production']);
        $founded_date = $data['founded_date'];

        $sql = "INSERT INTO productions (name_production, founded_date) VALUES (:new_production, :founded_date)";
        $query = $this->db->prepare($sql);
        $query->bindParam(':new_production', $name_production);
        $query->bindParam(':founded_date', $founded_date);
        $query->execute();

        return $query->rowCount();
    }

    public function addDirector_list($data)
    {
        $director_name = self::validate($data['name_director']);
        $about = self::validate($data['about_director']);

        $sql = "INSERT INTO directors (name_director, about) VALUES ('$director_name', '$about')";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->rowCount();
    }
}
