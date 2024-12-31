<!-- Experience-->
<section class="resume-section page-dashboard pt-3" id="laporan">
    <div class="align-self-start mb-5 w-100 border-bottom bg-light py-2 ps-2 rounded">

        <nav class="breadcrumb mb-0">
            <a class="breadcrumb-item" href="#">Home</a>

            <span class="breadcrumb-item active" aria-current="page">Laporan</span>
        </nav>
    </div>

    <div class="resume-section-content ">
        <h2 class="mb-3">Laporan</h2>

        <div class="row">

            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header">
                        Tabel Jam Absen
                    </div>
                    <div class="card-body">

                        <form class="d-flex mb-3" action="<?= base_url('dashboard/laporan') ?>" method="post">

                            <div class="form-group me-1">
                                <label for="exampleFormControlSelect1">Pilih Bulan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="bulan">
                                    <option <?= $bulan == '01' ? 'selected' : ''; ?> value="01">Januari</option>
                                    <option <?= $bulan == '02' ? 'selected' : ''; ?> value="02">Februari</option>
                                    <option <?= $bulan == '03' ? 'selected' : ''; ?> value="03">Maret</option>
                                    <option <?= $bulan == '04' ? 'selected' : ''; ?> value="04">April</option>
                                    <option <?= $bulan == '05' ? 'selected' : ''; ?> value="05">Mei</option>
                                    <option <?= $bulan == '06' ? 'selected' : ''; ?> value="06">Juni</option>
                                    <option <?= $bulan == '07' ? 'selected' : ''; ?> value="07">Juli</option>
                                    <option <?= $bulan == '08' ? 'selected' : ''; ?> value="08">Agustus</option>
                                    <option <?= $bulan == '09' ? 'selected' : ''; ?> value="09">September</option>
                                    <option <?= $bulan == '10' ? 'selected' : ''; ?> value="10">Oktober</option>
                                    <option <?= $bulan == '11' ? 'selected' : ''; ?> value="11">November</option>
                                    <option <?= $bulan == '12' ? 'selected' : ''; ?> value="12">Desember</option>
                                </select>
                            </div>

                            <div class="form-group me-1">
                                <label for="exampleFormControlSelect1">Pilih Tahun</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="tahun">
                                    <?php for ($x = 2020; $x <= 2024; $x++) { ?>
                                        <option <?= $tahun == $x ? 'selected' : ''; ?> value="<?= $x; ?>"><?= $x; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group align-self-end">
                                <button type="submit" class="btn btn-primary text-white">View</button>
                            </div>
                        </form>


                        <div class="d-flex border-bottom mb-3">
                            <h4><?= date('F Y', strtotime($tahun . '-' . $bulan)) ?></h4>
                            <a href="<?= base_url('dashboard/laporan/cetak/' . $bulan . '/' . $tahun) ?>" class="ms-auto badge bg-info align-self-center py-2"><i class="fas fa-print"></i> Cetak</a>

                        </div>

                        <div class="table-responsive">
                            <table class="table-bordered" cellpadding="2">
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <?php for ($jml = 1; $jml <= $jml_hari; $jml++) { ?>
                                        <th><?= $jml; ?></th>
                                    <?php } ?>
                                </tr>
                                <?php foreach ($data as $guru) { ?>
                                    <tr>
                                        <td><?= $guru->nama; ?></td>
                                        <td><?= $guru->nip; ?></td>
                                        <?php foreach ($guru->absen as $absen) { ?>
                                            <?php if ($absen['nama_hari'] != 'Sun') { ?>
                                                <td><?= $absen['status']; ?></td>
                                            <?php } else { ?>
                                                <td class="bg-danger"></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>



                    </div>
                </div>
            </div>

        </div>





    </div>
</section>