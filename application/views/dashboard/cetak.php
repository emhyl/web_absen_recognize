<?php

$total = 0;

?>

<!doctype html>

<html lang="en">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">



  <!-- Bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="<?= base_url('assets/offline/css/bootstrap.min.css') ?>"> -->

  <title>Cetak</title>

  <style type="text/css">
    td {

      font-size: 14px;

    }

    th {

      font-size: 12px;

    }

    body {
      margin: 1cm 4cm 0cm 5cm;
    }

    @media print {

      h1 {

        /*font-size:100px;*/

      }

      #btn {

        display: none;

      }

      @page {
        margin: 0;
      }

      body {
        margin: 1cm 2cm 0cm 2cm;
        background-color: #333;
      }

    }
  </style>

</head>

<body>



  <div class="container pt-2">




    <div class="d-flex">

      <img class="align-self-center" src="<?= base_url('assets/logo_sulsel.png') ?>" width="90" height="90">
      <div class="ms-3 text-center pt-3">
        <h5 class="mb-0">PEMERINTAH PROVINSI SULAWESI SELATAN</h5>
        <h5 class="  m-0">DINAS PENDIDIKAN </h5>
        <h5 class="  m-0">UPT.SMKN 3 BULUKUMBA</h5>
        <small style=""><i>Jl.Poros Lembang-Bira KM. 6 Telp.: 085255961066, Bulukumba, kode pos 92661
            Web : www.smkn3bulukumba.sch.id , email : smknegeri3bulukumba@gmail.com</i></small>
      </div>
    </div>

    <div class="border border-dark mb-1"></div>
    <h6 class=" text-center  mt-1 mb-3">DAFTAR HADIR UPACARA GURU & TENAGA KEPENDIDIKAN</h6>
    <p>Hari/Tanggal: Senin, <?= date('d M Y', strtotime($tgl)) ?></p>
    <!-- <div class="border border-dark mb-3"></div> -->

    <!-- <p>
      Data keselurusan laporan hasil penjualan CV.Sumber Laut</b>
    </p> -->

    <table class="table table-bordered" cellpadding="2">
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
            <?= ($val->sts_absen == 'h') ? '&#10004;' : '-' ?>
          </td>
          <td>
            <?= ($val->sts_absen == 's') ? '&#10004;' : '-' ?>
          </td>
          <td>
            <?= ($val->sts_absen == 'i') ? '&#10004;' : '-' ?>
          </td>
          <td>
            <?= ($val->sts_absen == 'a') ? '&#10004;' : '-' ?>
          </td>
        </tr>
      <?php } ?>
    </table>


    <div class="container p-0 pt-4">

      <a href="<?= base_url('dashboard/laporan') ?>" id="btn" class="btn btn-warning">Kembali</a>

      <button type="button" id="btn" class="btn btn-primary" onclick="cetak();">Cetak</button>

    </div>


  </div>





  <!-- Optional JavaScript; choose one of the two! -->



  <!-- Option 1: Bootstrap Bundle with Popper -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- <script src="<= base_url('assets/offline/js/bootstrap.min.js') ?>"></script> -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>

</html>

<script type="text/javascript">
  let container = document.querySelectorAll('.container');

  let form = document.getElementById('#form');


  // window.print();

  function cetak() {

    container.forEach(function(el) {

      el.classList.remove('container');

      el.classList.add('container-fluid');

    });

    window.print();

    container.forEach(function(el) {

      el.classList.remove('container-fluid');

      el.classList.add('container');

    });

  }
</script>