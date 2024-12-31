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

      <div class="shadow-sm py-3 px-5 mb-5 bg-body rounded">
        <div class="text-center mb-4">
          <a href="<?= base_url('home') ?>"><i class="bi bi-arrow-left"></i> Kembali</a>
          <h1 class="mb-1">Registrasi</h1>
          <h6 class="text-muted">Silakan masukkan NIM dan Password</h6>
        </div>
        <hr>
        <?= $this->session->flashdata("msg"); ?>

        <form action="<?= base_url('home/registrasi') ?>" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input required type="text" class="form-control" id="nip" name="nip">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input required type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="face" class="form-label">Face <span class="text-danger" id="lbl-error">(Ekstensi gambar harus jpg, png)</span></label>
            <input required type="file" class="form-control" id="face" name="face">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input required type="password" class="form-control" id="password" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>

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

  <script>
    let lbl_gambar = document.getElementById('lbl-error');
    let face = document.getElementById('face');
    lbl_gambar.style.display = "none";
    face.addEventListener('change', function(e) {
      // let ext = this.value.split('.');
      // ext = ext[ext.length - 1];

      // if ((ext == 'png') || (ext == 'PNG') || (ext == 'jpg') || (ext == 'jpeg')) {
      //   lbl_gambar.style.display = "none";
      // } else {
      //   console.log(lbl_gambar);
      //   lbl_gambar.style.display = "inline";
      //   this.value = '';
      // }

    })
  </script>


</body>

</html>