<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <title>Document</title>
</head>

<body>
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center my-3 shadow-sm pb-2">Selesai <i class="bi bi-check-circle-fill text-success"></i></h1>

        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Absensi selesai!</h4>
          <p>Anda telah melakukan absensi hari ini pada pukul <b><?= $data_absen->jam_absen; ?></b>.</p>
          <hr>
          <p class="mb-0">Detail absen :</p>
          <table>
            <tr>
              <th>Nama Guru</th>
              <th>&nbsp;:&nbsp;</th>
              <th><?= $data_guru->nama; ?></th>
            </tr>
            <tr>
              <th>Status Absen</th>
              <th>&nbsp;:&nbsp;</th>
              <th><?= $this->DB->statusAbsen($data_absen->sts_absen) ?></th>
            </tr>
            <tr>
              <th>Tanggal Absen</th>
              <th>&nbsp;:&nbsp;</th>
              <th><?= $data_absen->tgl_absen; ?></th>
            </tr>
          </table>
          <a href="<?= base_url('home/logout') ?>" class="btn btn-primary mt-3"><i class="bi bi-arrow-left"></i> Keluar</a>
        </div>

      </div>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>