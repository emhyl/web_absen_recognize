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
  <?= $this->session->flashdata("success"); ?>


</head>

<body>

  <div class="container">
    <div id="box-main">

      <?php if ($this->session->flashdata("location") == "true") { ?>
        <!-- Elemen yang ingin di center -->
        <div class="shadow-sm py-3 px-5 mb-5 bg-body rounded">
          <div class="text-center mb-4">
            <a href="<?= base_url('home') ?>"><i class="bi bi-arrow-left"></i> Kembali</a>
            <h1 class="mb-1">Login</h1>
            <h6 class="text-muted">Silakan masukkan NIM dan Password</h6>
          </div>
          <hr>
          <?= $this->session->flashdata("msg"); ?>

          <form action="<?= base_url('home/login') ?>" method="post">
            <div class="mb-3">
              <label for="nip" class="form-label">NIP</label>
              <input type="text" class="form-control" id="nip" name="nip" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>

        </div>
      <?php } else if ($this->session->flashdata("location") == "false") { ?>
        <div class="shadow-sm p-3 rounded text-center">
          <img src="<?= base_url("assets/img/maps.png") ?>" class="img-fluid rounded-top" alt="" />
          <h3 class="mt-2 text-danger">Anda berada diluar area</h3>
          <ul class="text-start text-info">
            <li>Kalibrasi perngkat terlebih dahulu</li>
            <li>Pastikan anda berada di area yang di tentukan</li>
          </ul>

          <a href="<?= base_url('home') ?>"><i class="bi bi-arrow-left"></i> Kembali</a>

        </div>
      <?php } else { ?>
        <h5>Memeriksa area</h5>
      <?php } ?>

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

  <?php if (!$this->session->flashdata("location")) { ?>
    <script>
      if (navigator.geolocation) { //jika navigator tersedia
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else { //jika navigator tidak tersedia
        console.log("Geolocation is not supported by this device");
      }

      //jika location allowed
      function showPosition(position) {
        let lat = position.coords.latitude;
        let long = position.coords.longitude;

        window.location.replace("<?= base_url('home/verification_location/') ?>" + lat + "/" + long);

        // let latlong = lat + "," + long;
        // console.log(latlong);
      }

      //jika location disabled atau not allowed
      function showError(error) {

        switch (error.code) {
          case error.PERMISSION_DENIED:
            console.log("User denied the request for Geolocation.");
            break;
          case error.POSITION_UNAVAILABLE:
            console.log("Location information is unavailable.");
            break;
          case error.TIMEOUT:
            console.log("The request to get user location timed out.");
            break;
          case error.UNKNOWN_ERROR:
            console.log("An unknown error occurred.");
            break;
        }
      }
    </script>
  <?php } ?>
</body>

</html>