<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">(ITEB) BINA ADINATA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="row w-100">
                <div class="col-md-6 ">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('penasehat_akademik') ?>">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('penasehat_akademik/list_mhs') ?>">KRS Mahasiswa PA</a>
                        </li>
                        
                    </ul>

                </div>
                <div class="col-md-1 ml-auto">

                    <ul class="navbar-nav">
                        <li class=" nav-item active">
                            <a class="nav-link" href="<?= base_url('penasehat_akademik/logout') ?>" onclick="return confirm('Keluar?')">Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
    <!-- end navbar -->