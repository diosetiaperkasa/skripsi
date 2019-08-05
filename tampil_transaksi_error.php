<?php
include ('koneksi.php')

?>
<?php
include('header.php');
?>

<form method="POST"/>
<table border="5" class="table table-bordered">

	<tr>
		<td>Id_Transaksi</td>
		<td>Nama Sales</td>
		<td>Nama Customer</td>
		<td>Jumlah</td>
		<td>Status</td>
		<td colspan="1">Action</td>
	</tr>
	<?php
	
	$list_transaksi=mysql_query("SELECT
  `transaksi`.*,
  `customer`.`Nama_Customer`,
  `salesman`.`Nama_Salesman`
FROM
  `transaksi`
  INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
  INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman`");
	while($proses=mysql_fetch_array($list_transaksi)){
		
	?>
<tr>
	<td><?php echo $proses['Id_Transaksi'];?></td>
	<td><?php echo $proses['Nama_Salesman'];?></td>
	<td><?php echo $proses['Nama_Customer'];?></td>
	<td><?php echo number_format($proses['Jumlah']);?></td>
	<td><?php if($proses['counter']=='1'){?>
		<a href="" class="btn btn-danger">Ada Komplain</a>
	<?php }elseif($proses['counter']=='2'){ ?>
		<a href="" class="btn btn-info">Komplain Selesai</a>
	<?php }?></td>
	<td><a class="btn btn-info" href="detail_transaksi_error.php?Id_Transaksi=<?php echo $proses['Id_Transaksi'];?>"/>
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