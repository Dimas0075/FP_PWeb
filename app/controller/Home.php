<?php
    class Home  extends Controller
    {
        public function index()
        {
            $data['judul'] = "Home Index";
            $data['toefl'] = $this->model('User_model')->getAllToefl();
            $this->view('templates/header', $data);
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