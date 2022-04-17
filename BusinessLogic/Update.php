<?php

class Update extends Dabes
{
    // update film
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
        $trailer = self::validate($data['trailer']);

        // check if the trailer is from youtube then add embed if thats true
        $valid_trailer = $trailer;
        $tr = explode('/', $trailer);
        if ($tr[2] != 'www.youtube.com' && $tr[2] != 'youtu.be') {
            return 0;
        } else {
            if (in_array('embed', $tr)) {
                $valid_trailer = $trailer;
            } else {
                if ($tr[2] == 'www.youtube.com') {
                    $exp = explode('watch?v=', $trailer);
                    $valid_trailer = $exp[0] . "/embed/" . $exp[1];
                } else if ($tr[2] == 'youtu.be') {
                    $valid_trailer = "https://www.youtube.com" . "/embed/" . $tr[3];
                }
            }
        }


        // mergering genre 
        $merge_genre = implode(", ", $genres);

        // check if user no upload the picture
        $oldPicture = $data['oldPicture'];

        if ($_FILES['picture']['error'] === 4) {
            $picture = $oldPicture;
        } else {
            $picture = self::uploadFilm();
        }

        // update data from table genre_films and film_genre
        $sql = "UPDATE genres_films, films_genres SET genres_films.genre_name = '$merge_genre' WHERE films_genres.genre_id = genres_films.genre_id AND films_genres.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $genre_count = $query->execute();

        // update data from table film director and directors
        $sql = "UPDATE films_directors, directors SET films_directors.directors_id = '$director' WHERE films_directors.directors_id = directors.id AND films_directors.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $director_count = $query->execute();

        // update data from table film director and productions
        $sql = "UPDATE films_productions, productions SET films_productions.production_id = '$production' WHERE films_productions.production_id = productions.id_production AND films_productions.film_id = '$id_film'";
        $query = $this->db->prepare($sql);
        $production_count = $query->execute();


        // update data from table films with id
        $sql = "UPDATE films SET title = :title , release_date = :release_date , picture = :picture, synopsis = :synopsis, runtime = :runtime, trailer = :trailer WHERE id_film = '$id_film'";
        $query = $this->db->prepare($sql);
        $query->bindParam(':title', $title);
        $query->bindParam(':synopsis', $synopsis);
        $query->bindParam(':release_date', $release_date);
        $query->bindParam(':picture', $picture);
        $query->bindParam(':runtime', $runtime);
        $query->bindParam(':trailer', $valid_trailer);
        $film_count = $query->execute();

        $result = $genre_count + $director_count + $production_count + $film_count;

        return $result;
    }

    // update data from production table
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

    // update data from director table
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

    // update data from genre list table
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
