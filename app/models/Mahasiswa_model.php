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

        public function getMahasiswaById($id)
        {
            $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
            $this->db->bind('id', $id);
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
        
        public function hapusDataMahasiswa($id)
        {
            $query = "DELETE FROM mahasiswa WHERE id = :id";
            
            $this->db->query($query);
            $this->db->bind('id', $id);
    
            $this->db->execute();
    
            return $this->db->rowCount();
        }

        public function ubahDataMahasiswa($data)
        {
            $query = "UPDATE mahasiswa SET nama = :nama, nrp = :nrp, asal = :asal WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nrp', $data['nrp']);
            $this->db->bind('asal', $data['asal']);
            $this->db->bind('id', $data['id']);
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
    }