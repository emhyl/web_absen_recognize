<!-- Experience-->
<section class="resume-section page-dashboard pt-3" id="data-absen">
    <div class="align-self-start mb-5 w-100 border-bottom bg-light py-2 ps-2 rounded">

        <nav class="breadcrumb mb-0">
            <a class="breadcrumb-item" href="#">Home</a>
            <span class="breadcrumb-item active" aria-current="page">Absen</span>
        </nav>
    </div>

    <div class="resume-section-content ">
        <h2 class="mb-3">Data Absen</h2>

        <div class="d-flex flex-column flex-md-row justify-content-between mb-1">
            <div class="flex-grow-1">
                <!-- <h3 class="mb-0"><?= date('Y-m-d') ?></h3> -->
                <!-- <div class="subheading ">Hari ini</div> -->
            </div>
            <div class="flex-shrink-0"><span class="text-primary">Absen <?= $tgl_absen; ?></span></div>
        </div>

        <div class="card">
            <div class="card-header">
                Table absen
            </div>
            <div class="card-body">

                <div class="row justify-content-between mb-2">
                    <div class="col-md-6 pt-3">
                        <h6 class="card-title mb-1">Input Tanggal</h6>
                        <form action="" method="post">
                            <input type="date" class="p-1 border rounded" name="tgl" value="<?= $tgl_absen; ?>">
                            <button class="border p-1 rounded px-2 bg-primary text-white">View</button>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <p class="card-text">
                        <div class="row">
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td>Jumlah Hadir</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= $jml_absen->hadir; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Izin</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= $jml_absen->izin; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td>Jumlah Sakit</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= $jml_absen->sakit; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Alpa</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= $jml_absen->alpa; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        </p>
                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Absen</th>
                                <th scope="col">Waktu Absen</th>
                                <th scope="col">Status Absen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_absen as $absen) { ?>
                                <tr class="">
                                    <td scope="row"><?= $absen->nip; ?></td>
                                    <td><?= $absen->nama; ?></td>

                                    <?php if ($absen->data_absen) { ?>
                                        <td><?= $absen->data_absen->tgl_absen; ?></td>
                                        <td><?= $absen->data_absen->jam_absen; ?></td>
                                        <th><?= $this->DB->statusAbsen($absen->data_absen->sts_absen); ?></th>
                                    <?php } else { ?>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><span class="badge bg-danger">Belum Absen</span></td>
                                    <?php } ?>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>


    </div>
</section>