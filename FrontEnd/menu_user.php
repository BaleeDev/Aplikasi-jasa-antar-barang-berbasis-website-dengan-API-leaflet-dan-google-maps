<?php
// cek sesion user
// session_start();
include '../database/db.php';


?>
<nav id="navbar" class="navbar">
        <ul>
              <li class="dropdown"><a href="#"><span>Pesanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="pesanan_anda.php">Pesanan Yang Selsai</a></li>
              <li><a href="transaksi.php">Pesanan Yang Belum</a></li>
            </ul>
             </li>
          
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="cek_ongkir.php">Cek Ongkir</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="visi.php">Visi & Misi</a></li>
              <li><a href="hubungi.php">Hubungi Kami</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="keluar.php?id=<?=$_SESSION['user']?>">Keluar</a></li>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
</nav>