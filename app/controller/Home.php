<?php
    class Home  extends Controller
    {
        public function index()
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            $data['judul'] = "Home Index";
            $data['toefl'] = $this->model('User_model')->getAllToefl();
            if (!isset($_SESSION['username'])) {
                $this->view('templates/header', $data);
            } else if (isset($_SESSION['username'])){
                $this->view('templates/headerPeserta', $data);
            } 
            
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }

        public function tambah()
        {
            if ($this->model('User_model')->tambahPesertaToefl($_POST) > 0) {
                Flasher::setFlash("berhasil", " ditambahkan ", "success");
                header('Location: ' . BASEURL . '/home');
                exit;
            } else {
                Flasher::setFlash("gagal", " ditambahkan ", "danger");
                header('Location: ' . BASEURL . '/home');
                exit;
            }
        }
    }