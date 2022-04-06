<?php

class Dabes
{
    public function __construct()
    {
        // connection database
        $db_user = "root";
        $db_pass = "root";
        $db_host = "localhost";
        $db_name = "Films";

        // check the connection
        try {
            $this->db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage());
        }
    }

    public function uploadFilm()
    {
        $name = $_FILES['picture']['name'];
        $tmp_name = $_FILES['picture']['tmp_name'];
        $size = $_FILES['picture']['size'];
        $error = $_FILES['picture']['error'];

        if ($error === 4) {
            echo "choose the picture first";
            return false;
        }
        $extension_valid = ['png', 'jpg', 'jpeg'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        if (!in_array($extension, $extension_valid)) {
            echo "the picture must be [png, jpg or jpeg]";
            return false;
        }
        if ($size > 3000000) {
            echo "the picture size to big";
        }

        $namePicture = uniqid();
        $namePicture .= ".";
        $namePicture .= $extension;

        move_uploaded_file($tmp_name, '../Views/uploaded/' . $namePicture);

        return $namePicture;
    }
    public function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
