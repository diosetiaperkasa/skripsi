<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysql_query("UPDATE salesman set
Nama_Salesman='".$_POST['Nama_Salesman']."',
No_Telepon='".$_POST['No_Telepon']."',
Id_Target='".$_POST['Id_Target']."'
where
Id_Salesman='".$_POST['Id_Salesman']."'");
if($query_update) {
	header("location:tampil_salesman.php");
}else{
	  echo mysql_error();
	  }
	  }
$tampilan_data=mysql_query("select * from salesman where 
Id_Salesman ='".$_GET['Id_Salesman']."'");
$hasil_data=mysql_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">

	<tr>
		<td>Nama_Salesman</td>
		<td><input Name="Nama_Salesman" type="text" value="<?php echo $hasil_data['Nama_Salesman'];?>"/></td>
	</tr>
	<tr>
		<td>No_Telepon</td>
		<td><input Name="No Telepon" type="text" value="<?php echo $hasil_data['No_Telepon'];?>"/></td>
	</tr>
	<tr>
		<td>Id_Target</td>
		<td><input Name="Id_Target" type="text" value="<?php echo $hasil_data['Id_Target'];?>"/></td>
	</tr>
	
	
	
		<input type="hidden" name="Id_Salesman" value="<?php echo $hasil_data['Id_Salesman'];?>"/>
	
	<tr>
		<td><input type="submit" name="save"/></td>
	</tr>
</table>
<?php
include('footer.php');
	