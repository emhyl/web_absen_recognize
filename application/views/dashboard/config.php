<!-- Experience-->
<section class="resume-section page-dashboard pt-3" id="config">
    <div class="align-self-start mb-5 w-100 border-bottom bg-light py-2 ps-2 rounded">

        <nav class="breadcrumb mb-0">
            <a class="breadcrumb-item" href="#">Home</a>

            <span class="breadcrumb-item active" aria-current="page">Config</span>
        </nav>
    </div>

    <div class="resume-section-content p-3" style="background: linear-gradient(to bottom, #fff, #e9ecef);">
        <h2 class="mb-3">Konfigurasi</h2>

        <div class="row">

            <div class="col-md-5">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        Tabel Jam Absen
                    </div>
                    <div class="card-body">

                        <h3 class="text-center mb-3">JAM ABSEN</h3>
                        <h2 class="text-center mb-4 shadow px-3 rounded">
                            <span class=""><?= date('H:i', strtotime($data_jam->min)) ?></span>
                            <span class="">-</span>
                            <span class=""><?= date('H:i', strtotime($data_jam->max)) ?></span>
                        </h2>

                        <p>
                            <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Update Jam absen
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form action="<?= base_url('dashboard/config/update_jam') ?>" method="post">
                                    <div class="form-group mb-1">
                                        <label for="">Jam Mulai</label>
                                        <input type="time" class="form-control" name="jam_mulai" value="<?= date('H:i', strtotime($data_jam->min)) ?>">
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="">Jam Akhir</label>
                                        <input type="time" class="form-control" name="jam_selesai" value="<?= date('H:i', strtotime($data_jam->max)) ?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary text-white"><i class="fas fa-save"></i> Update</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-7">

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Tabel Area
                    </div>
                    <div class="card-body">

                        <div class="row">


                            <div class="col-md-6">
                                <div class="mb-2">
                                    <button data-bs-toggle="modal" data-bs-target="#propModal" class="border p-1 rounded px-2 text-white" style="background-color: rgb(74, 174, 241);">Tambah</button>
                                </div>
                                <div class="modal fade" id="propModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('dashboard/config/tambah') ?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label for="nm_area" class="form-label">Nama Area</label>
                                                        <input type="text" class="form-control" id="nm_guru" name="nm_area" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="lat_min" class="form-label">Lat min</label>
                                                        <input type="text" class="form-control" id="lat_min" name="lat_min" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lat_max" class="form-label">Lat max</label>
                                                        <input type="text" class="form-control" id="lat_max" name="lat_max" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="long_min" class="form-label">Long min</label>
                                                        <input type="text" class="form-control" id="long_min" name="long_min" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="long_max" class="form-label">Long max</label>
                                                        <input type="text" class="form-control" id="long_max" name="long_max" required>
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
                            <table class="table table-bordered text-nowrap">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Area</th>
                                        <th scope="col">Lat min</th>
                                        <th scope="col">Lat max</th>
                                        <th scope="col">Long min</th>
                                        <th scope="col">Long max</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    #each area
                                    $no = 1;
                                    foreach ($data_area as $area) {
                                    ?>

                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $area->nm_area ?></td>
                                            <td><?= $area->lat_min ?></td>
                                            <td><?= $area->lat_max ?></td>
                                            <td><?= $area->long_min ?></td>
                                            <td><?= $area->long_max ?></td>
                                            <td>
                                                <?php if ($area->status_area) {
                                                    $link = base_url('dashboard/config/nonaktif/' . $area->id);
                                                } else {
                                                    $link = base_url('dashboard/config/aktif/' . $area->id);
                                                }
                                                ?>
                                                <a href="<?= $link; ?>" class="badge <?= ($area->status_area) ? 'bg-success' : 'bg-warning' ?> me-1 align-self-center"><?= ($area->status_area) ? 'Aktif' : 'Tidak Aktif' ?></a>
                                            </td>
                                            <td class="d-flex">
                                                <!-- <form action="<= base_url('dashboard/config/edit') ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?= $area->id ?>">
                                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                                                </form>
                                                &nbsp; -->
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus')" href="<?= base_url('dashboard/config/hapus/' . $area->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                                            </td>
                                        </tr>


                                    <?php } ?>

                                </tbody>
                            </table>

                        </div>



                    </div>
                </div>
            </div>


        </div>





    </div>
</section>