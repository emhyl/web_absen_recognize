<!-- Experience-->
<section class="resume-section page-dashboard pt-3" id="data-guru">
    <div class="align-self-start mb-5 w-100 border-bottom bg-light py-2 ps-2 rounded">

        <nav class="breadcrumb mb-0">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="#">Tabel</a>
            <span class="breadcrumb-item active" aria-current="page">Data Guru</span>
        </nav>
    </div>

    <div class="resume-section-content p-3" style="background: linear-gradient(to bottom, #fff, #e9ecef);">
        <h2 class="mb-3">Data Guru / Staf</h2>



        <div class="card">
            <div class="card-header bg-primary text-white">
                Tabel Guru / Staf
            </div>
            <div class="card-body">

                <div class="row mb-3 pt-3 justify-content-between">

                    <div class="col-md-6">
                        <form action="" method="post">
                            <input type="text" class="p-1 border rounded" placeholder="Kata kunci..">
                            <button class="border p-1 rounded px-2 bg-primary text-white">Cari</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="text-end">
                            <button data-bs-toggle="modal" data-bs-target="#propModal" class="border p-1 rounded px-2 text-white" style="background-color: rgb(74, 174, 241);">Tambah</button>
                        </div>
                        <div class="modal fade" id="propModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('dashboard/data_guru/tambah') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input required type="text" name="nama" class="form-control" id="nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nip" class="form-label">NIP</label>
                                                <input required type="text" name="nip" class="form-control" id="nip">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input required type="text" name="password" class="form-control" id="password">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_guru as $no => $guru) { ?>
                                <tr class="">
                                    <td scope="row"><?= $no + 1; ?></td>
                                    <td scope="row"><?= $guru->nama; ?></td>
                                    <td scope="row"><?= $guru->nip; ?></td>
                                    <td>
                                        <a onclick="return confirm('Hapus??')" href="<?= base_url('dashboard/data_guru/hapus/' . $guru->id_guru) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                        <button data-bs-toggle="modal" data-bs-target="#modalEdit_<?= $guru->id_guru; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</button>

                                        <div class="modal fade" id="modalEdit_<?= $guru->id_guru; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('dashboard/data_guru/edit/' . $guru->id_guru) ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_guru" value="<?= $guru->id_guru; ?>">
                                                            <input type="hidden" name="old_img" value="<?= $guru->face_recognize; ?>">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $guru->nama; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nip" class="form-label">NIP</label>
                                                                <input type="text" name="nip" class="form-control" id="nip" value="<?= $guru->nip; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" name="username" class="form-control" id="username" value="<?= $guru->username; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Password</label>
                                                                <input type="password" name="password" class="form-control" id="password" value="<?= $guru->password; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <button data-bs-toggle="modal" data-bs-target="#viewFace<?= $guru->id_guru; ?>" class="btn btn-info text-light btn-sm"><i class="fa fa-image"></i> Face</button>

                                        <div class="modal fade" id="viewFace<?= $guru->id_guru; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">View Face recognize</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?= base_url("assets/face_img/" . $guru->face_recognize) ?>" class="img-fluid" alt="...">

                                                        <div class="mt-3">
                                                            <a href="<?= base_url('dashboard/data_guru/edit_face/' . $guru->id_guru) ?>">Edit face</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <span class="text-decoration-underline">Menampilkan <?= count($data_guru) ?> data</span>


                </div>



            </div>
        </div>


    </div>
</section>
<!-- <script src="https://stardemoapps.my.id/my_code/script_take_picture.js"></script>
<script>
    startCamera();
    let button = document.getElementById('capture');
    button.addEventListener('click', function(e) {
        console.log(getRaw(e.target));
    });
</script> -->