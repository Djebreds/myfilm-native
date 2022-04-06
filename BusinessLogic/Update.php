<?php

class Update extends Dabes
{
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


        if ($_FILES['picture']['error'] === 4) {
            $picture = $oldPicture;
        } else {
            $picture = self::uploadFilm();
        }

        $sql = "UPDATE genres_films, films_genres SET genres_films.genre_name = '$merge_genre' WHERE films_genres.genre_id = genres_films.genre_id AND films_genres.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $genre_count = $query->execute();

        $sql = "UPDATE films_directors, directors SET films_directors.directors_id = '$director' WHERE films_directors.directors_id = directors.id AND films_directors.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $director_count = $query->execute();


        $sql = "UPDATE films_productions, productions SET films_productions.production_id = '$production' WHERE films_productions.production_id = productions.id_production AND films_productions.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $production_count = $query->execute();


        $sql = "UPDATE films SET title = '$title', release_date = '$release_date', picture = '$picture', synopsis = '$synopsis', runtime = '$runtime' WHERE id_film = '$id_film'";
        $query = $this->db->prepare($sql);
        $film_count = $query->execute();

        $result = $genre_count + $director_count + $production_count + $film_count;

        return $result;
    }
}
