<?php

class Read extends Dabes
{

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
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showDirector()
    {
        $query = $this->db->prepare("SELECT * FROM directors");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showTableFilm()
    {
        $sql = "SELECT * FROM films";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showFilms()
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, directors.name_director FROM films 
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

    public function searchFilm($search)
    {
        $sql = "SELECT * FROM films WHERE title LIKE '%$search%' OR release_date LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function searchGenre($search)
    {
        $sql = "SELECT * FROM genre_list WHERE genre_list LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function searchDirector($search)
    {
        $sql = "SELECT * FROM directors WHERE name_director LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function searchProduction($search)
    {
        $sql = "SELECT * FROM productions WHERE name_production LIKE '%$search%' OR founded_date LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function searchMain($search)
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name_director FROM films 
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

    public function showFilmsById($id)
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name_director FROM films 
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

    public function showLimitFilm($firstData, $countPerPage)
    {
        $sql = "SELECT * FROM films LIMIT $firstData, $countPerPage";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showLimitGenre($firstData, $countPerPage)
    {
        $sql = "SELECT * FROM genre_list LIMIT $firstData, $countPerPage";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showLimitProduction($firstData, $countPerPage)
    {
        $sql = "SELECT * FROM productions LIMIT $firstData, $countPerPage";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showLimitDirector($firstData, $countPerPage)
    {
        $sql = "SELECT * FROM directors LIMIT $firstData, $countPerPage";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function showLimitMain($firstData, $countPerPage)
    {
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, directors.name_director FROM films 
        INNER JOIN films_genres ON films.id_film = films_genres.film_id 
        INNER JOIN films_productions ON films.id_film = films_productions.film_id
        INNER JOIN films_directors ON films.id_film = films_directors.film_id
        INNER JOIN genres_films ON genres_films.genre_id = films_genres.genre_id 
        INNER JOIN productions ON productions.id_production = films_productions.production_id
        INNER JOIN directors ON directors.id = films_directors.directors_id
        LIMIT $firstData, $countPerPage";

        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function showProductionById($id)
    {
        $sql = "SELECT * FROM productions WHERE id_production = $id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showDirectorById($id)
    {
        $sql = "SELECT * FROM directors WHERE id = $id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function showGenreListById($id)
    {
        $sql = "SELECT * FROM genre_list WHERE id_list = $id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
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

    public function showFilmByGenre($data)
    {
        $genre = $data;
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, films.synopsis, films.runtime, directors.name_director FROM films 
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
}
