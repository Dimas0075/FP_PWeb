<?php
class Login  extends Controller
{
    public function index()
    {
        $this->view('login/index');
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
        }
    }
}
