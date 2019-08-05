<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysql_query("UPDATE transaksi set
Id_Salesman='".$_POST['Id_Salesman']."',
Id_Barang='".$_POST['Id_Barang']."'
where
Id_Transaksi='".$_POST['Id_Transaksi']."'");
if($query_update) {
	header("location:tampil_transaksi.php");
}else{
	  echo mysql_error();
	  }
	  }
$tampilan_data=mysql_query("select * from transaksi where 
Id_Transaksi ='".$_GET['Id_Transaksi']."'");
$hasil_data=mysql_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">
	
	<tr>
		<td>Id_Salesman</td>
		<td><input Name="Id_Salesman" type="text" value="<?php echo $hasil_data['Id_Salesman'];?>"/></td>
	</tr>
	<tr>
		<td>Id_Barang</td>
		<td><input Name="Id_Barang" type="text" value="<?php echo $hasil_data['Id_Barang'];?>"/></td>
	</tr>
	
	
	
		<input type="hidden" name="Id_Transaksi" value="<?php echo $hasil_data['Id_Transaksi'];?>"/>
	
	<tr>
		<td><input type="submit" name="save"/></td>
	</tr>
</table>
<?php
include('footer.php');