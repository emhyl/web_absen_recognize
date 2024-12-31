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

      font-size: 16px;

    }

    th {

      font-size: 14px;

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
        margin: 1cm 1cm 0cm 1cm;
      }

    }
  </style>

</head>

<body>



  <div class="container pt-2">




    <div class="d-flex">

      <img src="<?= base_url('assets/images/rumput.png') ?>" width="100">
      <div>
        <h4 class="display-4  m-0">SMK</h4>
        <small><i>xxxx</i></small>
      </div>
    </div>

    <div class="border border-dark mb-3"></div>

    <!-- <p>
      Data keselurusan laporan hasil penjualan CV.Sumber Laut</b>
    </p> -->

    <table class="table-bordered" cellpadding="2">
      <tr>
        <th class="">Nama</th>
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
            <?php if ($absen['nama_hari'] != "Sun") { ?>
              <td><?= $absen['status']; ?></td>
            <?php } else { ?>
              <td class="bg-danger"></td>
            <?php } ?>
          <?php } ?>
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