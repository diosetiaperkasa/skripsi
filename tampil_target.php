<?php
include ('koneksi.php')

?>
<?php
include('header.php');
?>
<a href="input_target.php" class="btn btn-danger">Tambah Data</a>
<form method="POST"/>
<table border="5" class="table table-bordered">

	<tr>
		<td>Id_Target</td>
		<td>Keterangan</td>
		<td colspan="2">Action</td>
	</tr>
	<?php
	
	$list_target=mysql_query("select * from target_salesman");
	while($proses=mysql_fetch_array($list_target)){
		
	?>
<tr>
	<td><?php echo $proses['Id_Target'];?></td>
	<td><?php echo $proses['Keterangan'];?></td>
	
	<td><a class="btn btn-warning" href="edit_target.php?Id_Target=<?php echo $proses['Id_Target'];?>"/>
	Edit</a></td>
	
	<td><a class="btn btn-danger" href="delete_target.php?Id_Target=<?php echo $proses['Id_Target'];?>"/>
	Delete</a></td>
</tr>
	<?php } ?>
</table>
<?php
include('footer.php');