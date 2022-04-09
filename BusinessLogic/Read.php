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
        $sql = "SELECT id_film, title, picture, release_date, runtime FROM films WHERE title LIKE '%$search%'";
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
        $sql = "SELECT id_film, title, picture, release_date, runtime FROM films LIMIT $firstData, $countPerPage";
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
}
