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
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/rowReorder.dataTables.min.css">
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
        Data Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Index</a></li>
        <li class="active">Data Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped tabl-bordered nowrap" style="width:100%" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Surat</th>
                                    <th>Judul Surat</th>
                                    <th>Nomor Dinas</th>
                                    <th>Isi Disposisi</th>
                                    <th>Tanggal Surat</th>
                                    <th>Lampiran</th>
                                    <th>Detail Surat</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../koneksi.php";
                                $sql = "SELECT * FROM surat where id_penerima=".$_SESSION['idpenerima']." OR id_pengirim=".$_SESSION['idpenerima'];
                                $hasil = $con->query($sql);

                                if ($hasil == FALSE){
                                    trigger_error("Syntax mysql salah: " . $sql . "Error: " . $con->error, E_USER_ERROR);
                                }else{
                                    $no = 1;
                                    while ($h = $hasil->fetch_array()){
                                        ?>
                                        <tr>
                                         <td><?php echo $no ?></td>
                                         <td><?php echo $h['no_pengirim'] ?></td>
                                         <td><?php echo $h['judul'] ?></td>
                                         <td><p><?php echo $h['no_dinas'] ?></p></td>
                                         <td><p><?php echo $h['catatan'] ?></p></td>
                                         <td><p><?php echo $h['tanggal_surat'] ?></p></td>
                                         <td><p><a href="<?php echo $h['lampiran'] ?>">Klik Disini</a></p></td>
                                         <td><a href="detailsurat.php?id=<?php echo $h['id_surat'] ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt">Klik Disini</i></a></td>
                                         <td><?php
                                         if ($h['status']=="Belum Validasi"){
                                            echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#tesModal' data-kepo=".$h['id_surat']."><i>Validasi</i></button>";
                                         } else if ($h['status']=="Ditolak"){
                                            echo "<a href='#' class='btn btn-danger btn-sm'><i class='fas fa-pencil-alt'>Ditolak</i></a>";
                                         } else if ($h['status']=="Belum Diproses"){
                                            echo "<a href='prosessurat.php?id=$h[id_surat]' class='btn btn-danger btn-sm'><i class='fas fa-pencil-alt'>Proses Surat</i></a> <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#tesModal' data-kepo='<?php echo $h[id_surat] ?>'>Tolak</button>";
                                          } else if ($h['status']=="Pemberian Nomor"){
                                            echo "<a href='prosessuratakhir.php?id=$h[id_surat]' class='btn btn-danger btn-sm'><i class='fas fa-pencil-alt'>Beri Nomor</i></a>";
                                          } else if ($h['status']=="Pendataan"){
                                            echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModal' data-whatever=".$h['id_surat']."><i>Beri Nomor</i></button> <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#tesModal' data-kepo=".$h['id_surat']."><i>Tolak</i></button>";
                                         } else if ($h['status']=="Dikembalikan"){
                                            echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#ulangModal' data-ulang=".$h['id_surat']."><i>Kirim Ulang</i></button>";
                                         } else {
                                          echo "<a href='#' class='btn btn-success btn-sm'><i class='fas fa-pencil-alt'>Selesai</i></a>";
                                         }
                                         
                                         ?></td>
                                        </tr> 
                                        <?php
                                        $no++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="tesModal" tabindex="-1" role="dialog" aria-labelledby="tesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tesModalLabel">Kembalikan Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="prosesvalidasi.php" method="post">
          <p>Dengan mengklik tombol ini, berarti anda menganggap bahwa ada kesalahan yang terjadi pada surat ini. Mohon beri keterangan yang jelas agar pengirim dapat memperbaiki kesalahannya, Terima Kasih.</p>
          <input type="hidden" name="id_surat">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Catatan</label>
            <textarea class="form-control" id="message-text" name="catatan"></textarea>
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="proseskirim.php" method="post">
          <input type="hidden" name="id_surat">            
          <div class="form-group">
            <label>Nomor Surat</label>
            <input type="text" name="no_dinas" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label class="col-form-label">Tujuan Surat</label>
            <select class="form-control" name="id_penerima">
              <option></option>
              <?php
                include '../koneksi.php';
                $query = "select * from sub_bidang where id_sub>1";
                $hasil = mysqli_query($con,$query);
                while($data=mysqli_fetch_array($hasil)){
                  echo "<option value=$data[id_sub]>$data[nama_sub]</option>";
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Catatan</label>
            <textarea class="form-control" id="message-text" name="catatan"></textarea>
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ulangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="proseskirim.php" method="post">
          <input type="hidden" name="id_surat">            
          <div class="form-group">
            <label>Nomor Surat</label>
            <input type="text" name="no_dinas" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label class="col-form-label">Tujuan Surat</label>
            <select class="form-control" name="id_penerima">
              <option></option>
              <?php
                include '../koneksi.php';
                $query = "select * from sub_bidang where id_sub>1";
                $hasil = mysqli_query($con,$query);
                while($data=mysqli_fetch_array($hasil)){
                  echo "<option value=$data[id_sub]>$data[nama_sub]</option>";
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Catatan</label>
            <textarea class="form-control" id="message-text" name="catatan"></textarea>
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>
            </div>
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
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.rowReorder.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<script>
  $(document).ready(function() {
    var table = $('#myTable').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(recipient)
  });
  $('#tesModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var proses = button.data('kepo') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(proses)
});
  $('#ulangModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('ulang') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(recipient)
  });
</script>
</body>
</html>