<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <?php 
          include '../koneksi.php';
          $sql = $con->query("SELECT * FROM v_user WHERE id=".$_SESSION['idpengirim']);
          $sin = mysqli_fetch_array($sql);
           ?>
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $sin['foto_user'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $sin['nama_user'] ?></p>
          <!-- Status -->
          <i><?php echo $sin['jabatan'] ?></i>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="user.php"><i class="fa fa-user"></i> <span>Data User</span></a></li>
        <li><a href="surat.php"><i class="fa fa-envelope"></i> <span>Data Surat</span></a></li>
        <li><a href="bagian.php"><i class="fa fa-users"></i> <span>Data Bagian</span></a></li>
        <!-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
        <li><a href="kalender.php"><i class="fa fa-calendar"></i> <span>Agenda</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>