<?php
include ('koneksi.php')

?>
<?php
include('header.php');
?>
<a href="input_suplier.php" class="btn btn-danger">Tambah Data</a>
<form method="POST"/>
<table border="5" class="table table-bordered">

	<tr>
	
		<td>Nama</td>
		<td colspan="2">Action</td>
	</tr>
	<?php
	
	$list_category=mysql_query("select * from suplier");
	while($proses=mysql_fetch_array($list_category)){

	
		?>
<tr>
	<td><?php echo $proses['nama'];?></td>
	
	<td><a class="btn btn-warning" href="edit_suplier.php?id_suplier=<?php echo $proses['id_suplier'];?>"/>
	Edit</a></td>
	
	<td><a class="btn btn-danger" href="delete_suplier.php?id_suplier=<?php echo $proses['id_suplier'];?>"/>
	Delete</a></td>
</tr>
	<?php } ?>
</table>
<?php
include('footer.php');