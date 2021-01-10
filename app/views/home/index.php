  <div class="utama">
      <h1>TOEFL</h1>
      <p lang="id" translate="no">Exam Prepation and Online Courses</p>
  </div>

  <!-- <?= var_dump($data); ?> -->
  <main>
      <div id="services" class="card">
          <h1>Paket</h1>
          <div class="row">
              <?php foreach ($data['toefl'] as $data) : ?>
                  <div class="column">
                      <div class="header">
                          <h2><?= $data['nama_path']; ?></h2>
                      </div>
                      <div class="container">
                          <p><?= $data['deskripsi']; ?></p>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
      </div>
  </main>

  <!-- Modal! -->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="formModalLabel">Daftar Kelas TOEFL</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form action="<?= BASEURL; ?>/home/tambah" method="post">
                      <input type="hidden" name="id" id="id">
                      <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="nrp">Nomor Identitas</label>
                          <input type="number" class="form-control" id="ktp" name="ktp" autocomplete="off">
                      </div>

                      <div class="input-group-prepend">
                          <button class="btn btn-outline-secondary dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Path</button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#path">1. Beginner</a>
                              <a class="dropdown-item" href="#">2. Intermediate</a>
                              <a class="dropdown-item" href="#">3. Expert</a>
                          </div>
                      </div>
                      <input type="text" class="form-control" aria-label="Text input with dropdown button" id="path" name="path" autocomplete="off" placeholder="Tuliskan angka saja...">

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary tombolKonfirmasi">Daftar</button>
                  </form>
              </div>
          </div>
      </div>
  </div>