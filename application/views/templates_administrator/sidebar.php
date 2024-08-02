<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
            <?php if ($this->session->userdata('hak_akses') == "admin") { ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('administrator/dashboard') ?>">
            <?php } elseif ($this->session->userdata('hak_akses') == "guru") { ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('guru/dashboard') ?>">
            <?php } elseif ($this->session->userdata('hak_akses') == "siswa") { ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <?php } ?>
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url('img/smp.png') ?>" alt="Logo SMP" class="logo" width="50" height="50">
                </div>
                <div class="sidebar-brand-text mx-1">E-Raport<sup></sup></div>
            </a>




               <!-- User Information -->
            <li class="nav-item">
                <?php if($this->session->userdata('hak_akses') == "admin") { ?>
                    <a class="nav-link" href="<?php echo base_url('administrator/dashboard') ?>">
                <?php } elseif($this->session->userdata('hak_akses') == "guru") { ?>
                    <a class="nav-link" href="<?php echo base_url('guru/dashboard') ?>">
                <?php } elseif($this->session->userdata('hak_akses') == "siswa") { ?>
                    <a class="nav-link" href="<?php echo base_url('siswa/dashboard') ?>">
                <?php } ?>
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                        <div>
                            <div class="text-white font-weight-bold"><?php echo $this->session->userdata('username'); ?></div>
                            <hr class="sidebar-divider my-1">
                            <div class="text-white font-weight-bold small"><?php echo $this->session->userdata('hak_akses'); ?></div>
                        </div>
                    </div>
                </a>
            </li>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <?php if ($this->session->userdata('hak_akses') == 'admin') { ?>
        <a class="nav-link" href="<?php echo base_url('administrator/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    <?php } elseif ($this->session->userdata('hak_akses') == 'guru') { ?>
        <a class="nav-link" href="<?php echo base_url('guru/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    <?php } elseif ($this->session->userdata('hak_akses') == 'siswa') { ?>
        <a class="nav-link" href="<?php echo base_url('siswa/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    <?php } ?>
</li>

  <!-- Data Master -->
  <?php if($this->session->userdata('hak_akses') == "admin"){ ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster"
            aria-expanded="true" aria-controls="collapseDataMaster">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseDataMaster" class="collapse" aria-labelledby="headingDataMaster"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Data:</h6>
                <a class="collapse-item" href="<?php echo base_url('administrator/kelas')?>">Kelas</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/mapel')?>">Mata pelajaran</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/tahun_ajaran')?>">Tahun Ajaran</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/ekstra')?>">Ekstrakurikuler</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/siswa')?>">Siswa</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/guru')?>">Guru</a>
            </div>
        </div>
    </li>
    <?php } elseif ($this->session->userdata('hak_akses') == "siswa") { ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster"
            aria-expanded="true" aria-controls="collapseDataMaster">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseDataMaster" class="collapse" aria-labelledby="headingDataMaster"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Data:</h6>
                <a class="collapse-item" href="<?php echo base_url('siswa/siswa_kelas')?>">Kelas</a>
                <a class="collapse-item" href="<?php echo base_url('siswa/siswa_ekstra')?>">Ekstrakurikuler</a>
            </div>
        </div>
    </li>
    <?php } ?>

   <!-- Akademik -->
<?php if($this->session->userdata('hak_akses') == "admin"){ ?>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkademik"
        aria-expanded="true" aria-controls="collapseAkademik">
        <i class="fas fa-fw fa-cog"></i>
        <span>Akademik</span>
    </a>
    <div id="collapseAkademik" class="collapse" aria-labelledby="headingAkademik" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Akademik:</h6>
            <a class="collapse-item" href="<?php echo base_url('administrator/mengajar')?>">Mengajar</a>
            <a class="collapse-item" href="<?php echo base_url('administrator/wali')?>">Wali kelas</a>
            <a class="collapse-item" href="<?php echo base_url('administrator/rombel')?>">Rombongan Kelas</a>
        </div>
    </div>
</li>
<?php } ?>


    <!-- Akademik -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenilaian"
            aria-expanded="true" aria-controls="collapsePenilaian">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Penilaian</span>
        </a>
        <div id="collapsePenilaian" class="collapse" aria-labelledby="headingPenilaian"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Submenu Penilaian:</h6>

                <?php if($this->session->userdata('hak_akses') == "admin"){ ?>
                    <a class="collapse-item" href="<?php echo base_url('administrator/nilai')?>">Penilaian</a>
                    <a class="collapse-item" href="<?php echo base_url('administrator/raport')?>">Cetak Raport</a>
                <?php } elseif($this->session->userdata('hak_akses') == "guru") { ?>
                    <a class="collapse-item" href="<?php echo base_url('guru/nilai')?>">Input Nilai</a>
                    <a class="collapse-item" href="<?php echo base_url('guru/siswa')?>">Siswa</a>
                    <a class="collapse-item" href="<?php echo base_url('guru/raport')?>">Cetak Raport</a>
                <?php } elseif($this->session->userdata('hak_akses') == "siswa") { ?>
                    <a class="collapse-item" href="<?php echo base_url('siswa/siswa_nilai')?>">Nilai Semester</a>
                <?php } ?>
            </div>
        </div>
    </li>

    <!-- Pengguna -->
    <?php if($this->session->userdata('hak_akses') == "admin"){ ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengguna"
            aria-expanded="true" aria-controls="collapsePengguna">
            <i class="fas fa-fw fa-eye"></i>
            <span>Pengguna</span>
        </a>
        <div id="collapsePengguna" class="collapse" aria-labelledby="headingPengguna" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Pengguna:</h6>
                <a class="collapse-item" href="<?php echo base_url('administrator/user')?>">Pengguna</a>
            </div>
        </div>
    </li>
    <?php } ?>

   <!-- Info Sekolah -->
<?php if ($this->session->userdata('hak_akses') === 'admin') : ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Info Sekolah</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Info Sekolah:</h6>
                <a class="collapse-item" href="<?php echo base_url('administrator/identitas')?>">Identitas</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/iklan')?>">Papan Iklan</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/informasi')?>">Informasi Sekolah</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/tentang_sekolah')?>">Tentang Sekolah</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/galeri')?>">Galeri</a>
                <a class="collapse-item" href="<?php echo base_url('administrator/kontak')?>">Kontak</a>
            </div>
        </div>
    </li>
<?php endif; ?>


    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('administrator/auth/logout')?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                     <!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username'); ?></span>
        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" 
        aria-labelledby="userDropdown">
        <a class="dropdown-item" href="<?php echo base_url('profil'); ?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profil
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </div>
</li>


                    </ul>

                </nav>