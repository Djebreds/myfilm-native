<?php

class Read extends Dabes
{

    // show all data from table genre_lsit
    public function showListGenres()
    {
        $query = $this->db->prepare("SELECT * FROM genre_list");

        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    // show all data from table production
    public function showProduction()
    {
        $query = $this->db->prepare("SELECT * FROM productions");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show all data from table director
    public function showDirector()
    {
        $query = $this->db->prepare("SELECT * FROM directors");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show all data from table films
    public function showTableFilm()
    {
        $sql = "SELECT * FROM films";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // merge data to show all data from table genre, film, production, director
    public function showFilms()
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, directors.name_director, films.trailer FROM films 
                INNER JOIN films_genres ON films.id_film = films_genres.film_id 
                INNER JOIN films_productions ON films.id_film = films_productions.film_id
                INNER JOIN films_directors ON films.id_film = films_directors.film_id
                INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
                INNER JOIN productions ON productions.id_production = films_productions.production_id
                INNER JOIN directors ON directors.id = films_directors.directors_id
                ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // search data films with title and release date
    public function searchFilm($search)
    {
        $sql = "SELECT * FROM films WHERE title LIKE '%$search%' OR release_date LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    // search data genre with genre_list
    public function searchGenre($search)
    {
        $sql = "SELECT * FROM genre_list WHERE genre_list LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // search data director with name_director
    public function searchDirector($search)
    {
        $sql = "SELECT * FROM directors WHERE name_director LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // search data with name_production and founded_date
    public function searchProduction($search)
    {
        $sql = "SELECT * FROM productions WHERE name_production LIKE '%$search%' OR founded_date LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // search all data with merge table
    public function searchMain($search)
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name_director, films.trailer FROM films 
                INNER JOIN films_genres ON films.id_film = films_genres.film_id 
                INNER JOIN films_productions ON films.id_film = films_productions.film_id
                INNER JOIN films_directors ON films.id_film = films_directors.film_id
                INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
                INNER JOIN productions ON productions.id_production = films_productions.production_id
                INNER JOIN directors ON directors.id = films_directors.directors_id
                WHERE films.title LIKE '%$search%' OR genres_films.genre_name LIKE '%$search%' OR films.release_date LIKE '%$search%' OR directors.name_director LIKE '%$search%' OR productions.name_production LIKE '%$search%' ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show film with id
    public function showFilmsById($id)
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name_director, films.trailer FROM films 
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

    // show all film with limited data
    public function showLimitFilm($firstData, $countPerPage)
    {
        $sql = "SELECT * FROM films LIMIT $firstData, $countPerPage";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show all genre with limited data
    public function showLimitGenre($firstData, $countPerPage)
    {
        $sql = "SELECT * FROM genre_list ORDER BY id_list DESC LIMIT $firstData, $countPerPage";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show all production with limited data
    public function showLimitProduction($firstData, $countPerPage)
    {
        $sql = "SELECT * FROM productions ORDER BY id_production DESC LIMIT $firstData, $countPerPage";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show all director with limited data
    public function showLimitDirector($firstData, $countPerPage)
    {
        $sql = "SELECT * FROM directors ORDER BY id DESC LIMIT $firstData, $countPerPage";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show all table with limited data
    public function showLimitMain($firstData, $countPerPage)
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, directors.name_director, films.trailer FROM films 
        INNER JOIN films_genres ON films.id_film = films_genres.film_id 
        INNER JOIN films_productions ON films.id_film = films_productions.film_id
        INNER JOIN films_directors ON films.id_film = films_directors.film_id
        INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
        INNER JOIN productions ON productions.id_production = films_productions.production_id
        INNER JOIN directors ON directors.id = films_directors.directors_id
        ORDER BY films.id_film ASC LIMIT $firstData, $countPerPage";

        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show production data with id
    public function showProductionById($id)
    {
        $sql = "SELECT * FROM productions WHERE id_production = $id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show director data with id
    public function showDirectorById($id)
    {
        $sql = "SELECT * FROM directors WHERE id = $id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show genre list data with id
    public function showGenreListById($id)
    {
        $sql = "SELECT * FROM genre_list WHERE id_list = $id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // show admin data if registered on database
    public function showAdmin($data)
    {
        $username = self::validate($data);
        $sql = "SELECT * FROM admin WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // public function showFilmByGenre($search)
    // {
    //     $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name_director FROM films 
    //             INNER JOIN films_genres ON films.id_film = films_genres.film_id 
    //             INNER JOIN films_productions ON films.id_film = films_productions.film_id
    //             INNER JOIN films_directors ON films.id_film = films_directors.film_id
    //             INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
    //             INNER JOIN productions ON productions.id_production = films_productions.production_id
    //             INNER JOIN directors ON directors.id = films_directors.directors_id
    //             WHERE genres_films.genre_name = '%$search%'";
    //     $query = $this->db->prepare($sql);
    //     $query->execute();
    //     $data = $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $data;
    // }

    // show all data film with genre
    public function showFilmByGenre($data)
    {
        $genre = $data;
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name_director, films.trailer FROM films 
                 INNER JOIN films_genres ON films.id_film = films_genres.film_id 
                 INNER JOIN films_productions ON films.id_film = films_productions.film_id
                 INNER JOIN films_directors ON films.id_film = films_directors.film_id
                 INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
                 INNER JOIN productions ON productions.id_production = films_productions.production_id
                 INNER JOIN directors ON directors.id = films_directors.directors_id
                 WHERE genres_films.genre_name LIKE '%$genre%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    // show all data film with date
    public function showFilmByDate($data)
    {
        $date = $data;
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name_director, films.trailer FROM films 
                 INNER JOIN films_genres ON films.id_film = films_genres.film_id 
                 INNER JOIN films_productions ON films.id_film = films_productions.film_id
                 INNER JOIN films_directors ON films.id_film = films_directors.film_id
                 INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
                 INNER JOIN productions ON productions.id_production = films_productions.production_id
                 INNER JOIN directors ON directors.id = films_directors.directors_id
                 WHERE films.release_date LIKE '%$date%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
