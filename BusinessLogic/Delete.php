<?php
class Delete extends Dabes
{

    // delete data from table film with id
    public function deleteFilm($id)
    {
        $sql = "DELETE FROM films WHERE id_film = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        // $query->bindParam(':id_film', $id);

        return $query->rowCount();
    }

    // delete data from table production with id
    public function deleteProduction($id)
    {
        $sql = "DELETE FROM productions WHERE id_production = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }

    // delete data from table director with id
    public function deleteDirector($id)
    {
        $sql = "DELETE FROM directors WHERE id = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }

    // delete data from table genre_list with id
    public function deleteGenreList($id)
    {
        $sql = "DELETE FROM genre_list WHERE id_list = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }
}
