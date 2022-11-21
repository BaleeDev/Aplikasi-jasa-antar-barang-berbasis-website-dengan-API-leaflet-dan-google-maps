<!-- css -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="../leaflet-routing-machine-3.2.12/dist/leaflet-routing-machine.css" />
<!--<link href="../css/style.css" rel="stylesheet">-->
<link href="../css/styleleaflet1.css" rel="stylesheet">

<!-- js -->
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="../leaflet-routing-machine-3.2.12/examples/Control.Geocoder.js"></script>
<script src="../leaflet-routing-machine-3.2.12/dist/leaflet-routing-machine.js"></script>


<script>
    var map = L.map('map').setView([-8.3450657,116.1209316], 13);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
   
        
  <?php
  include '../../database/db.php';
    $tampil = mysqli_query($conn,"select * from tbl_user where status='Sudah'");
    if(mysqli_num_rows($tampil)){
    while($dat= mysqli_fetch_array($tampil)){
		?>
		L.marker([<?=$dat['lat']?>,<?=$dat['lng']?>]).addTo(map)
				.bindPopup("Nama Toko : <?=$dat['nama_toko']?><br>");
		<?php
	}
	}
	?>


</script>

