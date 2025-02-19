<!-- Experience-->
<section class="resume-section page-dashboard pt-3" id="data-guru">
    <div class="align-self-start mb-5 w-100 border-bottom bg-light py-2 ps-2 rounded">

        <nav class="breadcrumb mb-0">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="#">Tabel</a>
            <a class="breadcrumb-item" href="#">Data Guru</a>
            <span class="breadcrumb-item active" aria-current="page">Edit Face</span>
        </nav>
    </div>

    <div class="resume-section-content ">



        <div class="card">

            <div class="card-body text-center">
                <div class="text-start">
                    <a href="<?= base_url('dashboard/data_guru/') ?>">Kembali</a>
                </div>
                <video id="video" width="640" height="480"></video>
                <div class="">
                    <button class="btn btn-primary text-white" id="capture" data-element-video="video" onclick="update_face.show(this, '<?= base_url('dashboard/data_guru/update_face') ?>', '<?= $id_guru ?>')">Ambil Gambar</button>
                </div>
                <script src="<?= url_cam ?>"></script>
                <script>
                    startCamera();
                </script>
            </div>
        </div>


    </div>
</section>
<!-- <script src="https://stardemoapps.my.id/my_code/script_take_picture.js"></script>
<script>
    startCamera();
    let button = document.getElementById('capture');
    button.addEventListener('click', function(e) {
        console.log(getRaw(e.target));
    });
</script> -->