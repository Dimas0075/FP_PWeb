<main>
    <div class="container">
        <form action="<?= BASEURL; ?>/mahasiswa/ubah" method="post" enctype="multipart/form-data">
            <div class="form">

                <div class="text-center">
                    <img src="<?= BASEURL; ?>/img/<?= $data['mhs']['foto']; ?>" class="rounded-circle" width="200px" height="200px">
                </div>


            </div>
            <div class="w3-section">
                <input class="w3-input w3-border w3-margin-bottom" type="hidden" value="<?= $data['mhs']['id']; ?>" name="id" required>
                <label><b>Nama</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= $data['mhs']['nama']; ?>" name="nama" required>
                <label><b>Username</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= $data['mhs']['username']; ?>" name="username" required>
                <label><b>Password</b></label>
                <input class="w3-input w3-border" type="password" value="<?= $data['mhs']['password']; ?>" name="password" required>
                <label><b>No Identitas</b></label>
                <input class="w3-input w3-border" type="number" value="<?= $data['mhs']['nomor_identitas']; ?>" name="nomor_identitas" required>
                <label><b>Path</b></label>
                <input class="w3-input w3-border" type="text" value="<?= $data['mhs']['nama_path']; ?>" name="path" disabled>
                <label><b>Path Status</b></label>
                <input class="w3-input w3-border" type="text" value="<?= $data['mhs']['status']; ?>" name="status" disabled>
                <label><b>Foto</b></label>
                <input class="w3-input w3-border" type="file" name="foto" id="foto" >
                <input class="w3-input w3-border" type="hidden" value="<?= $data['mhs']['foto']; ?>" name="fotoLama" id="fotoLama" >
            </div>
            <div class="row">
                <input type="submit" value="Edit">
            </div>
    </div>
    </form>
    </div>
</main>