<?php
class Admin extends Controller
{

    public function index()
    {
        $data = [];
        $data['judul'] = "Admin Page";
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllUser();
        $this->view('templates/headerAdmin', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    public function getUbah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        var_dump($_POST);
        if ($this->model('Mahasiswa_model')->ubahDataPeserta($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin');
            exit;
        } else {
            header('Location: ' . BASEURL . '/login/loginAdmin');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataPeserta($id) > 0) {
            Flasher::setFlash('berhasil ', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/admin');
            exit;
        } else {
            Flasher::setFlash('gagal ', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/admin');
            exit;
        }
    }
}
