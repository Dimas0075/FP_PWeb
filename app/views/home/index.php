  <div class="utama">
      <h1>TOEFL</h1>
      <p lang="id" translate="no">Exam Prepation and Online Courses</p>
  </div>

  <!-- <?= var_dump($data); ?> -->
  <div class="row">
      <div class="col-lg-6">
          <?php Flasher::flash(); ?>
      </div>
  </div>
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

                  <form action="<?= BASEURL; ?>/home/tambah" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id">
                      <input type="hidden" name="status" id="status">
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
                          <input type="number" class="form-control" id="ktp" name="ktp" autocomplete="off">
                      </div>

                      <div class="input-group mb-4">
                          <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Path</label>
                          </div>
                          <select class="custom-select" id="inputGroupSelect01" name="path">
                              <option selected>Choose...</option>
                              <option value="1">Beginner</option>
                              <option value="2">Intermediate</option>
                              <option value="3">Expert</option>
                          </select>
                      </div>

                      <div class="input-group mb-4">
                          <div class="custom-file mb-3">
                              <input type="file" class="custom-file-input" id="foto" name="foto">
                              <label class="custom-file-label" for="foto">Choose file</label>
                          </div>
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