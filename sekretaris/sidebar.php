<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <?php 
          include '../koneksi.php';
          $sql = $con->query("SELECT * FROM v_user WHERE id=".$_SESSION['idpengirim']);
          $sin = mysqli_fetch_array($sql);
           ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $sin['foto_user'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $sin['nama_user'] ?></p>
          <!-- Status -->
          <b><?php echo $sin['jabatan'] ?></b>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php echo (basename($_SERVER['REQUEST_URI']) == 'index.php' ? 'active' : ''); ?>"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="<?php echo (basename($_SERVER['REQUEST_URI']) == 'surat.php' ? 'active' : ''); ?>"><a href="surat.php"><i class="fa fa-envelope"></i> <span>Data Surat</span></a></li>
        <li class="<?php echo (basename($_SERVER['REQUEST_URI']) == 'kalender.php' ? 'active' : ''); ?>"><a href="kalender.php"><i class="fa fa-calendar"></i> <span>Agenda</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>