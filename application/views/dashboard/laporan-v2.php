<!-- Experience-->
<section class="resume-section page-dashboard pt-3" id="laporan">
    <div class="align-self-start mb-5 w-100 border-bottom bg-light py-2 ps-2 rounded">

        <nav class="breadcrumb mb-0">
            <a class="breadcrumb-item" href="#">Home</a>

            <span class="breadcrumb-item active" aria-current="page">Laporan</span>
        </nav>
    </div>

    <div class="resume-section-content p-3" style="background: linear-gradient(to bottom, #fff, #e9ecef);">
        <h2 class="mb-3">Laporan</h2>

        <div class="row">

            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        Tabel Laporan
                    </div>
                    <div class="card-body">

                        <form class="d-flex mb-3" action="<?= base_url('dashboard/laporan') ?>" method="post">
                            <div class="form-group me-1">
                                <label for="exampleFormControlSelect1">Pilih Tanggal</label>
                                <input type="date" name="tgl" value="<?= date('d/m/Y') ?>" class="form-control">
                            </div>

                            <div class="form-group align-self-end">
                                <button type="submit" class="btn btn-primary text-white">View</button>
                            </div>
                        </form>


                        <div class="d-flex border-bottom mb-3">
                            <h4><?= $tgl; ?></h4>
                            <a href="<?= base_url('dashboard/laporan/cetak/' . $tgl) ?>" class="ms-auto badge bg-info align-self-center py-2"><i class="fas fa-print"></i> Cetak</a>

                        </div>

                        <div class="table-responsive">
                            <table class="table-bordered table text-nowrap" cellpadding="2">
                                <tr>
                                    <th style="vertical-align: middle; text-align: center" rowspan="2" class="">No</th>
                                    <th style="vertical-align: middle; text-align: center" rowspan="2" class="">Nama</th>
                                    <th style="vertical-align: middle; text-align: center" rowspan="2">NIP</th>
                                    <th style="vertical-align: middle; text-align: center" rowspan="2">Pangkat/Gol</th>
                                    <th style="vertical-align: middle; text-align: center" rowspan="2">Hadir</th>
                                    <th class="text-center" colspan="3">Keterangan</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Sakit</th>
                                    <th class="text-center">Izin</th>
                                    <th class="text-center">Tampa Keterangan</th>
                                </tr>
                                <?php foreach ($data as $no => $val) { ?>
                                    <tr>
                                        <td><?= $no + 1; ?></td>
                                        <td><?= $val->nama_guru; ?></td>
                                        <td><?= $val->nip; ?></td>
                                        <td><?= $val->pangkat; ?></td>
                                        <td>
                                            <?= ($val->sts_absen == 'h') ? '<i class="fas fa-check"></i>' : '-' ?>
                                        </td>
                                        <td>
                                            <?= ($val->sts_absen == 's') ? '<i class="fas fa-check"></i>' : '-' ?>
                                        </td>
                                        <td>
                                            <?= ($val->sts_absen == 'i') ? '<i class="fas fa-check"></i>' : '-' ?>
                                        </td>
                                        <td>
                                            <?= ($val->sts_absen == 'a') ? '<i class="fas fa-check"></i>' : '-' ?>
                                        </td>
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