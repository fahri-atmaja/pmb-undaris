<?php

$jumlah = mysql_query("select * from pendaftar");
					

?>
	<center>
		<h2>GRAFIK INFORMASI<BR> 
		PEMILIHAN PRODI PMB UNDARIS 2022/2023</h2>
		<h4>Data sebanyak <?php echo mysql_num_rows($jumlah); ?> pendaftar yang sudah melakukan biaya formulir. </h4>
	</center>
 

 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>	
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Ilmu Hukum","Teknik Sipil","Pendidikan Agama Islam","Peternakan","Manajemen","Magister Ilmu Hukum","PGSD","PPKN"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_alumni = mysql_query("select * from pendaftar where konsentrasi_id='18'");
					echo mysql_num_rows($jumlah_alumni);
					?>, 
					<?php 
					$jumlah_expo = mysql_query("select * from pendaftar where konsentrasi_id='19'");
					echo mysql_num_rows($jumlah_expo);
					?>,
					<?php 
					$jumlah_koran = mysql_query("select * from pendaftar where konsentrasi_id='22'");
					echo mysql_num_rows($jumlah_koran);
					?>, 
					<?php 
					$jumlah_poster = mysql_query("select * from pendaftar where konsentrasi_id='23'");
					echo mysql_num_rows($jumlah_poster);
					?>,
					<?php 
					$jumlah_radio = mysql_query("select * from pendaftar where konsentrasi_id='24'");
					echo mysql_num_rows($jumlah_radio);
					?>, 
					<?php 
					$jumlah_relasi = mysql_query("select * from pendaftar where konsentrasi_id='25'");
					echo mysql_num_rows($jumlah_relasi);
					?>,
					<?php 
					$jumlah_sosmed = mysql_query("select * from pendaftar where konsentrasi_id='26'");
					echo mysql_num_rows($jumlah_sosmed);
					?>, 
					<?php 
					$jumlah_saudara = mysql_query("select * from pendaftar where konsentrasi_id='27'");
					echo mysql_num_rows($jumlah_saudara);
					?>,
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
				    'rgba(75, 192, 192, 0.2)',
				    'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
				    'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
				    'rgba(75, 192, 192, 1)',
				    'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
				    'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>