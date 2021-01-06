<?php
    class User_model
    {
        private $nama = 'Dimas';

        public function getUser(){
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
            $this->db->query("SELECT * FROM ". $this->table);
            return $this->db->resultSet();
        }

        public function tambahPesertaToefl($data)
        {
            $query = "INSERT INTO user VALUES ('', :nama, :nomor_identitas, :path)";
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nomor_identitas', $data['ktp']);
            $this->db->bind('path', $data['path']);
            $this->db->execute();

            return $this->db->rowCount();
        }
    }