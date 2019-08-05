<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysql_query("UPDATE suplier set
nama='".$_POST['Nama']."'
where
id_suplier='".$_POST['id_suplier']."'");
if($query_update) {
	header("location:tampil_suplier.php");
}else{
	  echo mysql_error();
	  }
	  }
$tampilan_data=mysql_query("select * from suplier where 
id_suplier ='".$_GET['id_suplier']."'");
$hasil_data=mysql_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">
	
	<tr>
		<td>Nama</td>
		<td><input Name="Nama" type="text" value="<?php echo $hasil_data['nama'];?>"/></td>
	</tr>
	
	<input type="hidden" name="id_suplier" value="<?php echo $hasil_data['id_suplier'];?>"/>
	
	<tr>
		<td><input type="submit" name="save"/></td>
	</tr>
</table>
<?php
include('footer.php');