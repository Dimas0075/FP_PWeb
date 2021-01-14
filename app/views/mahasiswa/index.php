<?php
// echo $_SESSION['username'];
// session_unset();

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: " . BASEURL . "/login");
}

?>

<main>
    <div id="services" class="card">
        <h1>Peserta</h1>
        <table>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Kelas</th>
                <!-- <th>Status</th> -->
            </tr>
            <?php $jumlah_array = 1; ?>
            <?php foreach ($data['mhs'] as $row) : ?>
                <tr>
                    <td><?= $jumlah_array; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nama_path']; ?></td>
                    <!-- <td><?= $row['status']; ?></td> -->
                </tr>
                <?php $jumlah_array++ ?>
            <?php endforeach; ?>
        </table>
    </div>
</main>