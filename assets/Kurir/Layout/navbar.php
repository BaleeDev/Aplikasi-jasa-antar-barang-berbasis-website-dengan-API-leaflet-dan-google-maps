<?php
if(@$_SESSION['kurir']){
echo '<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <span class="brand-text font-weight-light"><strong><b>Atong<i>Bae</strong></span>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-item">
            <a href="kurir.php" class="nav-link">
             <i class="fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-boxes"></i>
              <p>
                Orderan 
                <i class="right fas fa-angle-left"></i>
              </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="orderan_masuk.php" class="nav-link">
                <i class="fas fa-box-tissue"></i>
                  <p>Orderan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order_belum_selesai.php" class="nav-link">
                <i class="fas fa-box-open"></i>
                  <p>Orderan Belum Selesai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order_selesai.php" class="nav-link">
                <i class="fas fa-people-carry"></i>
                  <p>Orderan Selesai</p>
                </a>
              </li>
              </ul>
         </li>
         <li class="nav-item">
            <a href="keluar.php" class="nav-link">
             <i class="fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>';
}else{
    echo '<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <span class="brand-text font-weight-light"><strong><b>Atong<i>Bae</strong></span>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
         <li class="nav-item">
            <a href="../../kurir.php" class="nav-link ">
              <i class="fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="daftar_kurir.php" class="nav-link">
             <i class="fas fa-user-plus"></i>
              <p>
                Daftar
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="masuk.php" class="nav-link">
             <i class="far fa-user"></i>
              <p>
                Masuk
              </p>
            </a>
          </li> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>';
}
?>