<?php
// echo $_SESSION['username'];
// session_unset();

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: " . BASEURL . "/login/loginadmin/");
}
?>
<main>
    <div id="services" class="card">
        <h1>Peserta</h1>


        <table>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Status</th>
            </tr>
            <?php $jumlah_array = 1; ?>
            <?php foreach ($data['mhs'] as $row) : ?>
                <tr>
                    <td><?= $jumlah_array; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td>
                        <?= $row['status']; ?>
                        <a href="<?= BASEURL; ?>/admin/hapus/<?= $row['id']; ?>" class="badge badge-danger float-right ml-2" onclick="return confirm('yakin?');">hapus</a>
                        <a href="<?= BASEURL; ?>/admin/ubah/<?= $row['id']; ?>" class="badge badge-success float-right ml-2 tampilModalUpdate" data-toggle="modal" data-target="#formModal" data-id="<?= $row['id']; ?>">update</a>
                    </td>

                </tr>
                <?php $jumlah_array++ ?>
            <?php endforeach; ?>
        </table>
    </div>
</main>

<!-- Modal! -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/admin/ubah" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                    </div>

                    <div class="form-group mb-4">
                        <label for="ktp">Nomor Identitas</label>
                        <input type="number" class="form-control" id="nomor_identitas" name="nomor_identitas" autocomplete="off">
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="path">Path</label>
                        </div>
                        <select class="custom-select" id="path" name="path">
                            <option selected>Choose...</option>
                            <option value="1">Beginner</option>
                            <option value="2">Intermediate</option>
                            <option value="3">Expert</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="path">Status</label>
                        </div>
                        <select class="custom-select" id="path_status" name="path_status">
                            <option selected>Status Dari Peserta...</option>
                            <option value="0">Tidak Terdaftar</option>
                            <option value="1">On Going</option>
                            <option value="3">Gagal</option>
                            <option value="3">Lulus</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary tombolKonfirmasi">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>