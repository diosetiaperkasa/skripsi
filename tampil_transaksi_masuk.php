<?php
include ('koneksi.php')

?>
<?php
include('header.php');
?>

<a href="input_transaksi_masuk.php" class="btn btn-danger">Tambah Data</a>
<form method="POST"/>
<table border="5" class="table table-bordered">

	<tr>
		<td>Id_Transaksi</td>
		<td>Nama suplier</td>
		<td>Jumlah</td>
		<td colspan="1">Action</td>
	</tr>
	<?php
	
	$list_transaksi=mysql_query("SELECT
  `transaksi`.*,
  `suplier`.`nama`
FROM
  `transaksi`
  INNER JOIN `suplier` ON `transaksi`.`id_suplier` = `suplier`.`id_suplier`");
	while($proses=mysql_fetch_array($list_transaksi)){
		
	?>
<tr>
	<td><?php echo $proses['Id_Transaksi'];?></td>
	<td><?php echo $proses['nama'];?></td>
	<td><?php echo number_format($proses['Jumlah']);?></td>
	<td><a class="btn btn-info" href="detail_transaksi_masuk.php?Id_Transaksi=<?php echo $proses['Id_Transaksi'];?>"/>
	Detail</a></td>
	<!--<td><a class="btn btn-warning" href="edit_transaksi.php?Id_Transaksi=<?php echo $proses['Id_Transaksi'];?>"/>
	Edit</a></td>
	
	<td><a class="btn btn-danger" href="delete_transaksi.php?Id_Transaksi=<?php echo $proses['Id_Transaksi'];?>"/>
	Delete</a></td>-->
</tr>
	<?php } ?>
</table>
<?php
include('footer.php');