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
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        //mengecek apakah upload kosong
        if ($error === 4) {
            echo "<script>
                alert('Pilih gambar terlebih dahulu');
            </script>";
            return false;
        }

        $eksentsiFile = ['jpg', 'jpeg', 'png'];
        $ekstensiFoto = explode(".", $namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto));

        if (!in_array($ekstensiFoto, $eksentsiFile)) {
            echo "<script>
                alert('Format file tidak diizinkan!');
            </script>";
            return false;
        }

        if ($ukuranFile > 10000000) {
            echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .=  $ekstensiFoto;

        move_uploaded_file($tmpName, 'C:\\xampp\\htdocs\\pwebFP\\public\\img\\' . $namaFileBaru);

        return $namaFileBaru;
    }

    function tambahPesertaToefl($data)
    {
        $foto = $this->upload();
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
