<?php
include('koneksi.php');

	$awal 		= @$_GET['awal'];
	$akhir 		= @$_GET['akhir'];
	$kombinasi 	= @$_GET['kombinasi'];
	$support 	= @$_GET['support'];
	$sxc 		= @$_GET['sxc'];

	$sql	 =mysql_query("select distinct c.Id_Barang , a.Nama_Barang
		from barang a, transaksi b, transaksi_detail c 
		where 	a.Id_Barang= c.Id_Barang and b.Id_Transaksi= c.Id_Transaksi and
				b.Tgl between '".$awal."' and '".$akhir."' order by b.Tgl asc");


	$listKode 		= array();
	$listName 		= array();
	$listSupport 	= array();
	$listConfidence = array();
	$listRsxc		= array();

	while($data 	= mysql_fetch_array($sql)){
		
		$sql2	 = mysql_query("select distinct c.Id_Barang , a.Nama_Barang
		from barang a, transaksi b, transaksi_detail c 
		where 	a.Id_Barang= c.Id_Barang and b.Id_Transaksi= c.Id_Transaksi and
				b.Tgl between '".$awal."' and '".$akhir."' order by b.Tgl asc");
		
		while($data2	= mysql_fetch_array($sql2)){

			$sql3	 = mysql_query("select distinct c.Id_Barang , a.Nama_Barang
		from barang a, transaksi b, transaksi_detail c 
		where 	a.Id_Barang= c.Id_Barang and b.Id_Transaksi= c.Id_Transaksi and
				b.Tgl between '".$awal."' and '".$akhir."' order by b.Tgl asc");

				
			
			while($data3	= mysql_fetch_array($sql3)){

				if(count($listKode)>0){

					$v 	= 0;

					for($k=0;$k<count($listKode);$k++){

						if($listKode[$k] == $data['Id_Barang'] && $listKode[$k] == $data2['Id_Barang'] && $listKode[$k] == $data3['Id_Barang']){

							$v =1;

						}

					}

					if($v == 0){

						if($data['Id_Barang'] != $data2['Id_Barang'] && $data3['Id_Barang'] != $data2['Id_Barang'] && $data['Id_Barang'] != $data3['Id_Barang']){

							$listKode[]	= array($data['Id_Barang'],$data2['Id_Barang'],$data3['Id_Barang']);
							$listName[]	= array($data['Nama_Barang'],$data2['Nama_Barang'],$data3['Nama_Barang']);

						}

					}
				} else {
//	var_dump($data3);die;
					if($data['Id_Barang'] != $data2['Id_Barang'] && $data3['Id_Barang'] != $data2['Id_Barang'] && $data['Id_Barang'] != $data3['Id_Barang']){

						$listKode[]	= array($data['Id_Barang'],$data2['Id_Barang'],$data3['Id_Barang']);
						$listName[]	= array($data['Nama_Barang'],$data2['Nama_Barang'],$data3['Nama_Barang']);
					
					}

				}

			}

		}

	}

	for($o = 0; $o<count($listKode); $o++){		
		$sqlAandB 		= mysql_query("
			select count(distinct a.Id_Transaksi) as count 
			from  transaksi a, transaksi_detail b 
			where 	a.Id_Transaksi=b.Id_Transaksi and (b.Id_Barang = '".$listKode[$o][0]."' or b.Id_Barang = '".$listKode[$o][1]."') and 
					a.Tgl between '".$awal."' and '".$akhir."'");
		
		$sqlA 			= mysql_query("
			select count(distinct a.Id_Transaksi) as count 
			from transaksi a, transaksi_detail b 
			where 	a.Id_Transaksi=b.Id_Transaksi and b.Id_Barang = '".$listKode[$o][2]."' and a.Tgl between '".$awal."' and '".$akhir."'");

		$sqlTotalTrx 	= mysql_query("
			select count(Id_Transaksi) as count 
			from transaksi 
			where Tgl between '".$awal."' and '".$akhir."'");
		
		$AandB 				= mysql_fetch_array($sqlAandB);
		
		$TotalTrx			= mysql_fetch_array($sqlTotalTrx);
		$A 					= mysql_fetch_array($sqlA);
		
		$rSupport 			= $AandB['count']/$TotalTrx['count'];
		$rConfidence 		= $AandB['count']/$A['count'];
		$rSxc 				= $rSupport*$rConfidence;
		$listConfidence[] 	= $rConfidence;

		if($rSupport >= $support){
			$listSupport[] 		= array($rSupport, 1);
		} else {
			$listSupport[] 		= array($rSupport, 0);
		}

		if($rSxc >= $sxc){
			$listRsxc[]			= array($rSxc, 1);
		} else {
			$listRsxc[]			= array($rSxc, 0);
		}
	}
?>
<?php 
include('header.php');?>
<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo "Tanggal ".$awal." - ".$akhir."<input type='submit' class='btn btn-primary' name='cetak' value='Cetak'>";?>
		<?php //echo "Tanggal : 01-12-2017 - 01-12-2017 <input type='submit' class='btn btn-primary' name='cetak' value='Cetak'>";?>
	</div>
	<div class="panel-body">
		<h3>Kombinasi <?php echo $kombinasi;?> Obat</h3>
		<br>
		<table id="" class="table table-striped table-hover">
			<tr>
				<td width="250">
					Support
				</td>
				<td width="50">
					:
				</td>
				<td align="left">
					<?php echo $support;?>
				</td>
			</tr>
			<tr>
				<td>
					Support x Confidence
				</td>
				<td>
					:
				</td>
				<td>
					<?php echo $sxc;?>
				</td>
			</tr>
		</table>

		<form action="" method="post">
			<div class="table-responsive">
				<table id="" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Aturan</th>
							<th>Support</th>
							<th>Confidence</th>
							<th>Support x Confidence</th>
							<th>Memenuhi Thresold Support</th>
							<th>Memenuhi Thresold Support x Confidence</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							
							for($o=0;$o<count($listKode);$o++){

						?>
						<tr>
							<td>
								<?php echo "If ".$listName[$o][0]." and ".$listName[$o][1]." then ".$listName[$o][2];?>
							</td>
							<td>
							  	<?php print $listSupport[$o][0];?>
							</td>
							<td>
							  	<?php print $listConfidence[$o];?>
							</td>
							<td>
								<?php print $listRsxc[$o][0];?>
							</td>
							<td>
								<?php print ($listSupport[$o][1] == 1) ? "Ya" : "Tidak";?>
							</td>
							<td>
								<?php print ($listRsxc[$o][1] == 1) ? "Ya" : "Tidak";?>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>

			<?php //echo "<p align='center';float='center'>
								//<input type='submit' class='btn btn-primary' name='proses' value='Proses'>
								//<button type='reset' class='btn btn-danger' onclick='history.go(-1);'>Kembali</button></p>"
			;
			?>
		</form>
		<br>
		<?php
			/*for($o=0;$o<count($listKode);$o++){
				echo $listKode[$o][0]."=>";
				echo $listKode[$o][1]."<br>";
			}*/
		?>
		<center><h3>Hasil</h3></center>
		<br>
		<form action="" method="post">
			<div class="table-responsive">
				<table id="" class="table table-striped table-bordered table-hover">
					<tbody>
						<tr>
							<td colspan="4">
								<!-- Kemungkinan Terbesar Jika Membeli Maka Akan Membeli sabutamol dengan Nilai 0.5625. Jika Ada Produk sabutamol Dengan Merek Tertentu Kurang Laku, Maka Bisa Diletakkan Bersebelahan Dengan Produk Dengan Merek Tertentu Yang Laku, Maka Kemungkinan Besar Akan Laku Juga. -->
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<?php //echo "<p align='center';float='center'>
								//<input type='submit' class='btn btn-primary' name='proses' value='Proses'>
								//<button type='reset' class='btn btn-danger' onclick='history.go(-1);'>Kembali</button></p>"
			;
			?>
		</form>
	</div>
</div>
<?php 
include('footer.php');
?>