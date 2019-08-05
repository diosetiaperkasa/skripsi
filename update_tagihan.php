<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysql_query("UPDATE tagihan set
No_Tagihan='".$_POST['No_Tagihan']."',
Tgl='".$_POST['Tgl']."',
Jumlah='".$_POST['Jumlah']."'
where
Id_Tagihan='".$_POST['Id_Tagihan']."'");
if($query_update) {
	$update=mysql_query("update transaksi set Sudah_Dibayar='".$_POST['Jumlah']."' where Id_Transaksi='".$_POST['Id_Transaksi']."'");
	header("location:tampil_tagihan.php");
}else{
	  echo mysql_error();
	  }
	  }
$tampilan_data=mysql_query("select * from tagihan where 
Id_Tagihan ='".$_GET['Id_Tagihan']."'");
$hasil_data=mysql_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">

	<tr>
		<td>No Tagihan</td>
		<td><input Name="No_Tagihan" type="text" value="<?php echo $hasil_data['No_Tagihan'];?>"/></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td><input Name="Tgl" type="text" value="<?php echo $hasil_data['Tgl'];?>"/></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td><input Name="Jumlah" type="text" value="<?php echo $hasil_data['Jumlah'];?>"/></td>
	</tr>
	
	
		<input type="text" name="Id_Transaksi" value="<?php echo $hasil_data['Id_Transaksi'];?>"/>
		<input type="hidden" name="Id_Tagihan" value="<?php echo $hasil_data['Id_Tagihan'];?>"/>
	
	<tr>
		<td><input type="submit" class="btn btn-danger" name="save"/></td>
	</tr>
</table>
<?php
include('footer.php');
	