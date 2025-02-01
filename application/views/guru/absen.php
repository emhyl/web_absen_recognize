<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <title>Document</title>
</head>

<body>
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center my-3 shadow-sm pb-2">Mengambil Gambar</h1>

        <div class="alert alert-danger" role="alert" id="alert-no-image">
          <h4 class="alert-heading">Noftifikasi</h4>
          <p>Tidak mendeteksi gambar</p>
        </div>
        <?= $this->session->flashdata("msg") ?>

        <video id="video" class="" style="width:100%; height: auto;" autoplay></video>

        <ul class="txet-muted">
          <li>Pastikan anda berada ditpat yang terang</li>
          <li>Posisikan diri anda di tengah camera</li>
        </ul>

        <a href="<?= base_url('home/logout') ?>" class="btn btn-danger">Keluar</a>
        <button class="btn btn-primary" id="snap" data-element-video="video">Absen</button>
        <canvas id="canvas" width="640" height="480" style="display: none;"></canvas>
      </div>
    </div>

  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://star-dev.my.id/.script/script_take_picture.js"></script>
  <script>
    let alert_no_image = document.getElementById("alert-no-image");

    alert_no_image.style.display = "none";


    startCamera();

    snap.addEventListener('click', (element) => {

      // Send the photo to the server
      fetch('https://star-dev.my.id/.script/face/comparev2.php', {
          method: 'POST',
          body: JSON.stringify({
            new_img: getRaw(element.target),
            origin_img: "<?= $binary_img; ?>",
          }),
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.text())
        .then(data => {
          // console.log(data);
          let hasil = JSON.parse(data).confidence;
          if (hasil != undefined) {
            window.location.replace("<?= base_url('home/verification_image/') ?>" + hasil);
          } else {
            alert_no_image.style.display = "block";
            setTimeout(() => {
              alert_no_image.style.display = "none";
            }, 5000);
          }

        })
        .catch((error) => {
          console.error('Error:', error);
        });
    });
  </script>

</body>

</html>