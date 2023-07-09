<body class="hold-transition skin-white sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PAY-</b>bot</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('/assets/dist/img/').$this->session->userdata('photo') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_pegawai') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="<?php echo base_url('/assets/dist/img/').$this->session->userdata('photo') ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama_pegawai') ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url('welcome/logout') ?>" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>/assets/dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="active">
          <a href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/dataPegawai') ?>"><i class="fa fa-circle-o text-red"></i> Data Pegawai</a></li>
            <li><a href="<?php echo base_url('admin/dataJabatan') ?>"><i class="fa fa-circle-o text-yellow"></i> Data Jabatan</a></li>
          </ul>
        </li>
        <li class="treeview">
        <a href="#">
            <i class="fa fa-file"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/dataServis') ?>"><i class="fa fa-circle-o text-yellow"></i> Data Servis</a></li>
            <li><a href="<?php echo base_url('admin/dataGaji') ?>"><i class="fa fa-circle-o text-aqua"></i> Data Gaji</a></li>
          </ul>
        </li>
        <li class="treeview">
        <a href="#">
            <i class="fa fa-folder"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/laporanServis') ?>"><i class="fa fa-circle-o text-yellow"></i> <span>Laporan Servis</span></a></li>
            <li><a href="<?php echo base_url('admin/laporanGaji') ?>"><i class="fa fa-circle-o text-green"></i> <span>Laporan Gaji</span></a></li>
            <li><a href="<?php echo base_url('admin/slipGaji') ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Slip Gaji</span></a></li>
          </ul>
        </li>
        <li class="active">
          <a href="<?php echo base_url('welcome/logout') ?>">
            <i class="fa fa-sign-out"></i> <span>Log out</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>