<?php
class Login  extends Controller
{
    public function index()
    {
        $this->view('login/index');
    }

    public function loginadmin()
    {
        $this->view('login/loginadmin');
    }

    public function cek()
    {
        if ($this->model('Login_model')->getLoginPeserta($_POST) > 0) {
            header('Location: ' . BASEURL . '/mahasiswa');
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['username'] = $_POST['username'];
            exit;
        } else {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function cekAdmin()
    {
        if ($this->model('Login_model')->getLoginAdmin($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin');
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['username'] = $_POST['username'];
            exit;
        } else {
            header('Location: ' . BASEURL . '/login/loginAdmin');
            exit;
        }
    }

    public function logout()
    {
        if (isset($_SESSION)) {
            session_unset();
            header('Location: ' . BASEURL);
        }
    }

    public function logoutAdmin()
    {
        if (isset($_SESSION)) {
            session_unset();
            header('Location: ' . BASEURL . '/login/loginAdmin');
        }
    }


}
