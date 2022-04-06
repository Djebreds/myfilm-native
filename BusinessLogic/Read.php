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
        $sql = "SELECT films.id_film, films.picture, films.title, genres_films.genre_name, productions.name_production, films.release_date, directors.name FROM films 
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
}
