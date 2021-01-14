<?php
    class Mahasiswa_model
    {
        private $table = "user";
        private $db;

        public function __construct()
        {
            $this->db = new Database;

        }

        public function getAllUser()
        {
            $this->db->query("SELECT * FROM status, ". $this->table ." WHERE user.path_status = status.id_status");
            return $this->db->resultSet();
        }

        public function getAllUserPath($path)
        {
            $this->db->query("SELECT user.nama, toefl.nama_path FROM `user`, `toefl`, `status` WHERE toefl.id_path = $path AND user.path = $path AND status.id_status = 1 AND user.path_status = 1");
            return $this->db->resultSet();
        }

        public function getPesertaByUsername($username)
        {
            $this->db->query("SELECT * FROM ". $this->table ." WHERE user.username = '$username'");
            return $this->db->single();
        }

        public function getMahasiswaById($id)
        {
            $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
            $this->db->bind('id', $id);
            return $this->db->single();
        }

        public function getProfile($username)
        {
            $this->db->query("SELECT * FROM status, toefl, " . $this->table . " WHERE username=:username AND user.path_status = status.id_status AND toefl.id_path = user.path");
            $this->db->bind('username', $username);
            return $this->db->single();
        }

        public function tambahDataMahasiswa($data)
        {
            $query = "INSERT INTO user VALUES ('', :nama, :ktp, :path)";
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('ktp', $data['ktp']);
            $this->db->bind('path', $data['path']);
            $this->db->execute();

            return $this->db->rowCount();
        }
        
        public function hapusDataPeserta($id)
        {
            $query = "DELETE FROM user WHERE id = :id";
            
            $this->db->query($query);
            $this->db->bind('id', $id);
    
            $this->db->execute();
    
            return $this->db->rowCount();
        }

        public function ubahDataPeserta($data)
        {
            $query = "UPDATE user SET nama = :nama, username = :username, password= :password, nomor_identitas = :ktp, path = :path, path_status = :path_status WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', $data['password']);
            $this->db->bind('ktp', $data['ktp']);
            $this->db->bind('path', $data['path']);
            $this->db->bind('path_status', $data['path_status']);
            $this->db->bind('id', $data['id']); //dapet id dari mana
            $this->db->execute();

            return $this->db->rowCount();
        }

        public function ubahProfile($data)
        {
            if($_FILES['foto']['name'] == null)
            {
                $foto = $data['fotoLama'];
            } else {
                $foto = $this->upload();
            }
            $query = "UPDATE user SET nama = :nama, username = :username, password= :password, nomor_identitas = :nomor_identitas, foto = :foto WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('nama',  $data['nama']);
            $this->db->bind('username',  $data['username']);
            $this->db->bind('password',  $data['password']);
            $this->db->bind('nomor_identitas',  $data['nomor_identitas']);
            $this->db->bind('foto',  $foto);
            $this->db->bind('id', $data['id']); //dapet id dari mana
            $this->db->execute();

            return $this->db->rowCount();
        }

        public function cariDataMahasiswa()
        {
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
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
    }