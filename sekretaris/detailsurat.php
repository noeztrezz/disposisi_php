<?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['jabatan']==""){
        header("location:../index.php?pesan=gagal");
    }
 
    ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php include 'header.php';
  ?>
    
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Index</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <?php 
          include '../koneksi.php';
          $sql = $con->query("SELECT * FROM surat WHERE id_surat=".$_GET['id']);
          $sin = mysqli_fetch_array($sql);
           ?>
            <div class="box-body box-profile">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Judul / Perihal</b> <a class="pull-right"><?php echo $sin['judul'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Isi Singkat</b><br><br> <p><?php echo $sin['isi_singkat'] ?></p>
                </li>
                <li class="list-group-item">
                  <b>Jenis Surat</b> <a class="pull-right"><?php echo $sin['jenis_surat'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Nama Pengirim</b> <a class="pull-right"><?php echo $sin['pengirim'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>No Surat Pengirim</b> <a class="pull-right"><?php echo $sin['no_pengirim'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Input</b> <a class="pull-right"><?php echo $sin['tanggal_input'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>No Dinas</b> <a class="pull-right"><?php echo $sin['no_dinas'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Lampiran Surat Masuk</b> <a href="<?php echo $sin['lampiran'] ?>" class="pull-right">Klik Disini</a>
                </li>                
                <li class="list-group-item">
                  <b>Tujuan Disposisi (Kadis)</b> <a class="pull-right"><?php 
                  $sqla = $con->query("SELECT * FROM bagian_bidang WHERE id_bagian=".$sin['id_disposisi']);
                  $san = mysqli_fetch_array($sqla);
                  echo $san['nama_bidang'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Isi Disposisi</b><br><br> <p><?php echo $sin['isi_disposisi'] ?></p>
                </li>
                <li class="list-group-item">
                  <b>Lokasi Terakhir Surat</b> <a class="pull-right"><?php 
                  $sqlc = $con->query("SELECT * FROM sub_bidang WHERE id_sub=".$sin['id_penerima']);
                  $sun = mysqli_fetch_array($sqlc);
                  echo $sun['nama_sub'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>User Penginput</b> <a class="pull-right"><?php 
                  $sqlb = $con->query("SELECT * FROM user WHERE id=".$sin['id_input']);
                  $sen = mysqli_fetch_array($sqlb);
                  echo $sen['nama_user'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php echo $sin['status'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Selesai</b> <a class="pull-right"><?php echo $sin['tanggal_selesai'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Lampiran File Jadi</b> <a href="<?php echo $sin['surat_jadi'] ?>" class="pull-right">Klik Disini</a>
                </li>
                <li class="list-group-item">
                  <b>Catatan</b> <a class="pull-right"><?php echo $sin['catatan'] ?></a>
                </li>                
              </ul>
              <a href="surat.php" class="btn btn-danger btn-block"><b>Kembali</b></a>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
</body>
</html>