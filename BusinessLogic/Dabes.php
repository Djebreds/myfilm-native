<?php

class Dabes
{
    // connection database
    public function __construct()
    {
        $db_user = "developer";
        $db_pass = "myfilm";
        $db_host = "db";
        $db_name = "myfilm";

        try {
            $this->db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage());
        }
    }

    // function to upload picture
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

        // extension valid
        $extension_valid = ['png', 'jpg', 'jpeg'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        if (!in_array($extension, $extension_valid)) {
            echo "the picture must be [png, jpg or jpeg]";
            return false;
        }

        if ($size > 2000000) {
            echo "the picture size to big";
        }

        // change name picture into random number
        $namePicture = uniqid();
        $namePicture .= ".";
        $namePicture .= $extension;

        move_uploaded_file($tmp_name, '../Views/uploaded/' . $namePicture);

        return $namePicture;
    }

    // function to make validate data
    public function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // function to add user admin
    public function register($data)
    {
        $username = self::validate(ucwords($data['username']));
        $email = self::validate(strtolower($data['email']));
        $password = self::validate(htmlspecialchars($data['password']));

        // encriypt the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin (email, username, password) VALUES ('$email', '$username', '$password')";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->rowCount();
    }

    // check if username has registered on database
    public function checkUsername($data)
    {
        $username = self::validate($data);
        $sql = "SELECT username FROM admin WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->rowCount();
    }
}
