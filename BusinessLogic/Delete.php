<?php
class Delete extends Dabes
{

    public function deleteFilm($id)
    {
        $sql = "DELETE FROM films WHERE id_film = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        // $query->bindParam(':id_film', $id);

        return $query->rowCount();
    }
    public function deleteProduction($id)
    {
        $sql = "DELETE FROM productions WHERE id_production = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }

    public function deleteDirector($id)
    {
        $sql = "DELETE FROM directors WHERE id = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }
    public function deleteGenreList($id)
    {
        $sql = "DELETE FROM genre_list WHERE id_list = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }
}
