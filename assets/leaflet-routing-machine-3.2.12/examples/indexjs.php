<!-- css -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="../assets/leaflet-routing-machine-3.2.12/dist/leaflet-routing-machine.css" />
<link href="../assets/css/style.css" rel="stylesheet">
<link href="../assets/css/styleleaflet.css" rel="stylesheet">

<!-- js -->
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="../assets/leaflet-routing-machine-3.2.12/examples/Control.Geocoder.js"></script>
<script src="../assets/leaflet-routing-machine-3.2.12/dist/leaflet-routing-machine.js"></script>


<script>
    var map = L.map('map').setView([-8.3450657,116.1209316], 13);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
   

    <?php

    if(isset($_SESSION['user'])){
        $vlat = "";
          $vlng = "";
        $user_check=$_SESSION['user'];
      $tampil1 = mysqli_query($conn, "select * from tbl_user WHERE id_user='$user_check' ");
      if(mysqli_num_rows($tampil1)){
        while($dats= mysqli_fetch_array($tampil1)){ ?>
            let latLng1 = L.latLng(<?=$dats['lat']?>,<?=$dats['lng']?>);
            let latLng2 = L.latLng(<?=$dats['lat']?>,<?=$dats['lng']?>);
            let wp1 = new L.Routing.Waypoint(latLng1);
            let wp2 = new L.Routing.Waypoint(latLng2);

            var control =  L.Routing.control({
                    waypoints: [latLng1,latLng2],
                    routeWhileDragging: true
                })
                control.addTo(map);

                function keSini(lat,lng){
                var latLng=L.latLng(lat, lng);
                let wp1 = new L.Routing.Waypoint(latLng1);
                let wp2 = new L.Routing.Waypoint(latLng); 
                let routeUs = L.Routing.osrmv1();
                    routeUs.route([wp1,wp2],(err,routes)=>{
                        if(!err){
                            var berat = document.getElementById("berat").value;
                            document.getElementById('tampungBerat').value = berat;
                            var ongkir = 0;
                            var total =0;
                            for(i in routes){
                                var jarak = routes[i].summary.totalDistance;
                                document.getElementById('tampungJarak').value = jarak;
                                // console.log(routes[i].summary.totalDistance.toFixed(2));
                                var hasil = jarak / 1000;
                                // var km = Math.round(hasil,2);
                                var km = hasil.toFixed(1);
                                document.getElementById('jarak').innerHTML = km;
                                if(km <= 1){
                                    ongkir += 2000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }else if(km > 1 && km <= 2){
                                    ongkir += 3000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 2 && km <= 3){
                                    ongkir += 4000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 3 && km <= 4){
                                    ongkir += 5000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 4 && km <= 5){
                                    ongkir += 6000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 5 && km <= 6){
                                    ongkir += 7000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 6 && km <= 7){
                                    ongkir += 8000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 7 && km <= 8){
                                    ongkir += 9000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 8 && km <= 9){
                                    ongkir += 10000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 9 && km <= 10){
                                    ongkir += 11000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 10 && km <= 11){
                                    ongkir += 12000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 11 && km <= 12){
                                    ongkir += 13000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 12 && km <= 13){
                                    ongkir += 14000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else if(km > 13 && km <= 14){
                                    ongkir += 15000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                else{
                                    ongkir += 20000;
                                    if(berat <= 1){
                                        total = ongkir + 1000;
                                    }
                                    else if(berat > 1 && berat <=2){
                                        total = ongkir + 1500;
                                    }
                                    else if(berat > 2 && berat <=3){
                                        total = ongkir + 2000;
                                    }else{
                                        total = ongkir + 2500;
                                    }
                                }
                                document.getElementById('ongkir').innerHTML = total;
                                document.getElementById('tampungOngkir').value = total;
                            }
                        }else if(err){
                            alert("Opppss.. Sistem Sibuk!. refresh halaman ulang!");
                            document.location='cek_ongkir.php';
                        }
                    })
                control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
                }
       <?php }
      }
    ?>
        
  <?php
      
    }

    $tampil = mysqli_query($conn,"select * from tbl_dusun");
    if(mysqli_num_rows($tampil)){
    while($dat= mysqli_fetch_array($tampil)){
		?>
		L.marker([<?=$dat['lat']?>,<?=$dat['lng']?>]).addTo(map)
				.bindPopup("Dusun <?=$dat['nama_dusun']?><br>");
		<?php
	}
	}
	?>


</script>

