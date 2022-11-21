<?php
// cek sesion user
$user_check=$_SESSION['login_user'];
$sql="select * from tbl_user where email='$user_check'";
$ses=mysqli_query($conn,$sql);
$row =mysqli_fetch_assoc($ses);
$id = $row['id_user'];

if(!isset($_SESSION)){
    echo"$user_check";
    
}
?>
<nav id="navbar" class="navbar">
        <ul>
        <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Pengaturan Profil</a></li>
              <li class="dropdown"><a href="#"><span>Pesanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Pesanan Yang Selsai</a></li>
              <li><a href="FrontEnd/transaksi.php?id=<?=$id?>">Pesanan Yang Belum</a></li>
            </ul>
             </li>
            </ul>
          </li>
          
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="FrontEnd/cek_ongkir.php?id=<?=$id?>">Cek Ongkir</a></li>
              <li><a href="FrontEnd/pelacakan.php?id=<?=$id?>">Pelacakan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="FrontEnd/visi.php?id=<?=$id?>">Visi & Misi</a></li>
              <li><a href="FrontEnd/hubungi.php?id=<?=$id?>">Hubungi Kami</a></li>
              <li><a href="FrontEnd/temukan.php?id=<?=$id?>">Temukan Kami</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="FrontEnd/keluar.php?id=<?=$id?>">Keluar</a></li>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
</nav>