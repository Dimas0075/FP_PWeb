<?php
    class Admin extends Controller
    {

        public function index($nama = "Dimas", $pekerjaan="Pelajar", $umur=20){
            $data = [];
            $data['judul'] = "About Index";
            $data ['nama'] = $nama;
            $data ['pekerjaan'] = $pekerjaan;
            $data ['umur'] = $umur;
            $this->view('templates/header', $data);
            $this->view('admin/index', $data);
            $this->view('templates/footer');
        }

        public function page(){
            $judul['judul'] = "About Page";
            $this->view('templates/header', $judul);
            $this->view('admin/page');
            $this->view('templates/footer');
        }
    }
    