<?php

    class Mahasiswa extends Controller
    {
        public function index()
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            
            if (!isset($_SESSION['username'])) {
                header("Location: " . BASEURL . "/login");
            }
            
            $data['judul'] = "List Mahasiswa";
            $data['peserta'] = $this->model('Mahasiswa_model')->getPesertaByUsername($_SESSION['username']);
            $data['mhs'] = $this->model('Mahasiswa_model')->getAllUserPath($data['peserta']['path']);
            $this->view('templates/headerPeserta', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer', $data);
        }

        public function profile()
        {
            $data['judul'] = "List Mahasiswa";
            $data['mhs'] = $this->model('Mahasiswa_model')->getProfile($_SESSION['username']);
            $this->view('templates/headerPeserta', $data);
            $this->view('mahasiswa/profile', $data);
            $this->view('templates/footer', $data);
        }

        public function detail($id)
        {
            $data['judul'] = "Detail Mahasiswa";
            $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
            $this->view('templates/header', $data);
            $this->view('mahasiswa/detail', $data);
            $this->view('templates/footer', $data);
        }

        public function tambah()
        {
            if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
                Flasher::setFlash("berhasil", " ditambahkan ", "success");
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash("gagal", " ditambahkan ", "danger");
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
        
        public function hapus($id)
        {
            if( $this->model('Mahasiswa_model')->hapusDataPeserta($id) > 0 ) {
                Flasher::setFlash('berhasil ', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash('gagal ', 'dihapus', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function getUbah()
        {
            echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
        }

        public function ubah()
        {
            $nama = var_dump($_POST);
            if ($this->model('Mahasiswa_model')->ubahProfile($_POST) > 0) {
                header('Location: ' . BASEURL . '/mahasiswa/profile');
                exit;
            } else {
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function cari()
        {
            $data['judul'] = "List Mahasiswa";
            $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer', $data);
        }
    }