  <div class="container">
      <div class="jumbotron mt-3">
          <h1 class="display-4">Selamat Datang!</h1>
          <hr class="my-4">
          <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
          <a class="btn btn-primary btn-lg" href="#" role="button" data-toggle="modal" data-target="#formModal">Daftar</a>
          <div class="row mt-3">
              <div class="col-lg-6">
                  <?php Flasher::flash(); ?>
              </div>
          </div>
      </div>

      <div class="card-deck">
          <?php foreach ($data['toefl'] as $data) : ?>
              <div class="card mb-3">
                  <img class="card-img-top" src="<?= BASEURL; ?>/img/<?= $data['image']; ?>" alt="Card image cap">
                  <div class="card-body">
                      <h5 class="card-title"><?= $data['nama_path']; ?></h5>
                      <p class="card-text"><?= $data['deskripsi']; ?></p>
                      <p class="card-text"><small class="text-muted">Rp.<?= $data['harga']; ?></small></p>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>
  </div>


  <!-- Modal -->
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
                              <a class="dropdown-item" href="#">1. Beginner</a>
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