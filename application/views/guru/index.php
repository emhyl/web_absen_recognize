<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />

  <style>
    #box-main {
      margin: auto;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%)
    }

    @media screen and (max-width: 768px) {
      #box-main {
        margin: none;
        position: absolute;
        top: 40%;
        left: 0;
        right: 0;
        transform: translate(-0%, -50%)
      }
    }
  </style>


</head>

<body>

  <div class="container">
    <div id="box-main">
      <!-- Elemen yang ingin di center -->
      <div class="shadow-sm py-3 px-5 mb-5 bg-body rounded">
        <div class="text-center mb-4">
          <h1 class="mb-0">Selamat Datang</h1>
          <h6 class="text-muted">Siste absensi sekolah</h6>
          <hr>
        </div>

        <div class="row g-2">

          <div class="col-md-4">
            <a href="<?= base_url('home/login') ?>" class="d-block text-center py-2 rounded border border-dark text-light text-decoration-none fw-bold" style="background-color: rgb(226, 160, 61);"><i class="bi bi-person-bounding-box"></i> Hadir</a>
          </div>
          <div class="col-md-4">
            <a href="<?= base_url('home/izin') ?>" class=" d-block text-center py-2 rounded border border-dark text-light text-decoration-none fw-bold" style="background-color: rgb(226, 160, 61);"><i class="bi bi-file-earmark-text"></i> Izin</a>
          </div>
          <div class="col-md-4">
            <a href="<?= base_url('home/sakit') ?>" class=" d-block text-center py-2 rounded border border-dark text-light text-decoration-none fw-bold" style="background-color: rgb(226, 160, 61);"><i class="bi bi-emoji-frown"></i> Sakit</a>
          </div>

        </div>

        <span class="d-block mt-3">Jika belum punya akun silahkan registrasi</span>
        <a href="<?= base_url('home/registrasi') ?>"><i class="bi bi-person-plus-fill"></i> Registrasi</a>



      </div>

    </div>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

  <!-- <script>
    fetch('https://star-dev.my.id/.script/sendMail/kirim.php', {
        method: 'POST',
        body: 'email=emhylstar.97@gmail.com & judul=OTP & title=Code Verification & pesan=ini test API',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
      })
      .then(response => response.text())
      .then(data => console.log(data))
      .catch(error => console.error(error));
  </script> -->
</body>

</html>