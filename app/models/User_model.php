<?php
class User_model
{
    private $nama = 'Dimas';

    public function getUser()
    {
        return $this->nama;
    }

    private $table = "toefl";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllToefl()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function upload()
    {
        $target_dir = "../../public/img/";

        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
           
        }

        var_dump($uploadOk);

        return $target_file;
    }

    public function tambahPesertaToefl($data)
    {
        $foto = $this->upload();
        echo "test";
        var_dump($_FILES["foto"]["nama"]);
        $query = "INSERT INTO user VALUES ('', :nama, :username, :password, :nomor_identitas, :path, 1, :foto )";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('nomor_identitas', $data['ktp']);
        $this->db->bind('path', $data['path']);
        $this->db->bind('foto', $foto);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
