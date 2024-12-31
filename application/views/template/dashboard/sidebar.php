 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
   <!-- <h5>star</h5> -->
   <a class="navbar-brand mt-md-4 js-scroll-trigger" href="#page-top">
     <span class="d-block d-lg-none">Administrator</span>
     <span class="d-none d-lg-block"><img class="img-fluid img-profile bg-dark rounded-circle mx-auto mb-1" src="<?= base_url("assets/img/admin.png") ?>" alt="..." /></span>
   </a>
   <h3 class="d-none d-lg-block text-light shadow-sm px-2">Administrator</h3>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
   <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav ">
       <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('dashboard/') ?>#home">Dashboard</a></li>
       <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('dashboard/data_absen/') ?>#data-absen">Absensi</a></li>
       <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('dashboard/data_guru/') ?>#data-guru">Data Guru/Staf</a></li>
       <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('dashboard/config/') ?>#config">Konfigurasi</a></li>
       <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('dashboard/laporan/') ?>#laporan">Laporan</a></li>
       <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="return confirm('Keluar??')" href="<?= base_url('dashboard/home/logout') ?>">Keluar <i class="fas fa-sign-out-alt"></i></a></li>
     </ul>
   </div>
 </nav>
 <!-- Page Content-->
 <div class="container-fluid p-0">