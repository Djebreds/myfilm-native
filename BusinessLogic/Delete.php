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
}
