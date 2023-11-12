	<center>
		<h2>GRAFIK SUMBER INFORMASI PMB UNDARIS -</h2>
	</center>
 

 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 <center>
	<table align="center" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Calon Mahasiswa</th>
				<th>Email</th>
				<th>Nomor</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysql_query("select * from regist");
			while($d=mysql_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['email']; ?></td>
					<td><?php echo $d['nomor']; ?></td>
					<form>
					<td><button type="submit" name="submit">Hapus</button></td>
					</form>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</center> 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Alumni","Expo","Koran","Brosur","Facebook","Relasi","Instagram","Saudara","Sekolah","Seminar","Teman","Spanduk","Website"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_alumni = mysql_query("select * from regist where informasi='Alumni'");
					echo mysql_num_rows($jumlah_alumni);
					?>, 
					<?php 
					$jumlah_expo = mysql_query("select * from regist where informasi='Expo'");
					echo mysql_num_rows($jumlah_expo);
					?>,
					<?php 
					$jumlah_koran = mysql_query("select * from regist where informasi='Koran'");
					echo mysql_num_rows($jumlah_koran);
					?>, 
					<?php 
					$jumlah_poster = mysql_query("select * from regist where informasi='Brosur'");
					echo mysql_num_rows($jumlah_poster);
					?>,
					<?php 
					$jumlah_radio = mysql_query("select * from regist where informasi='Facebook'");
					echo mysql_num_rows($jumlah_radio);
					?>, 
					<?php 
					$jumlah_relasi = mysql_query("select * from regist where informasi='Relasi'");
					echo mysql_num_rows($jumlah_relasi);
					?>,
					<?php 
					$jumlah_sosmed = mysql_query("select * from regist where informasi='Instagram'");
					echo mysql_num_rows($jumlah_sosmed);
					?>, 
					<?php 
					$jumlah_saudara = mysql_query("select * from regist where informasi='Saudara'");
					echo mysql_num_rows($jumlah_saudara);
					?>,
					<?php
					$jumlah_sekolah = mysql_query("select * from regist where informasi='Sekolah'");
					echo mysql_num_rows($jumlah_sekolah);
					?>,
					<?php 
					$jumlah_sosmed = mysql_query("select * from regist where informasi='Seminar'");
					echo mysql_num_rows($jumlah_sosmed);
					?>, 
					<?php 
					$jumlah_teman = mysql_query("select * from regist where informasi='Teman'");
					echo mysql_num_rows($jumlah_teman);
					?>,
					<?php
					$jumlah_bank_jateng = mysql_query("select * from regist where informasi='Spanduk'");
					echo mysql_num_rows($jumlah_bank_jateng);
					?>,
					<?php 
					$jumlah_ekonomi = mysql_query("select * from regist where informasi='Website'");
					echo mysql_num_rows($jumlah_ekonomi);
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
				    'rgba(75, 192, 192, 0.2)',
				    'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
				    'rgba(75, 192, 192, 0.2)',
				    'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
				    'rgba(75, 192, 192, 1)',
				    'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
				    'rgba(75, 192, 192, 1)',
				    'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
				    'rgba(75, 192, 192, 1)',
				    'rgba(255,99,132,1)',
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