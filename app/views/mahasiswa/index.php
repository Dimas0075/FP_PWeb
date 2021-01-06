<div class="container mt-3">

    <!-- <?php var_dump($data['mhs']); ?> -->
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomer Identitas</th>
                <th scope="col">Path</th>
            </tr>
        </thead>
        <tbody>
            <?php $jumlah_array = 1; ?>
            <?php foreach ($data['mhs'] as $row) : ?>
                <?php 
                    if ($row['path'] == 1) {
                        $namaPath = "Beginner";
                    } else if ($row['path'] == 2) {
                        $namaPath = "Intermediate";
                    } else if ($row['path'] == 3) {
                        $namaPath = "Expert";
                    }
                ?>
                <tr>
                    <th scope="row"><?= $jumlah_array; ?></th>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nomor_identitas']; ?></td>
                    <td><?= $namaPath; ?></td>
                </tr>
                <?php $jumlah_array++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>