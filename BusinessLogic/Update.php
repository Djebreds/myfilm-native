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

    public function updateProduction($data)
    {
        $id_production = self::validate($data['id_production']);
        $name_production = self::validate($data['name_production']);
        $founded_date = self::validate($data['founded_date']);

        $sql = "UPDATE productions SET name_production = '$name_production', founded_date = '$founded_date' WHERE id_production = '$id_production'";
        $query = $this->db->prepare($sql);

        $result = $query->execute();

        return $result;
    }
    public function updateDirector($data)
    {
        $director_id = self::validate($data['id']);
        $name_director = self::validate($data['name_director']);
        $about_director = self::validate($data['about_director']);

        $sql = "UPDATE directors SET name_director = '$name_director', about = '$about_director' WHERE id = $director_id";
        $query = $this->db->prepare($sql);
        $result = $query->execute();

        return $result;
    }
    public function updateGenrelist($data)
    {
        $id_list = self::validate($data['id_list']);
        $genre_name = self::validate($data['genre_list']);

        $sql = "UPDATE genre_list SET genre_list = '$genre_name' WHERE id_list = $id_list";
        $query = $this->db->prepare($sql);
        $result = $query->execute();

        return $result;
    }
}
