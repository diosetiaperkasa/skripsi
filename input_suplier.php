<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
$query= "insert into suplier(nama)
value ('" .$_POST['Nama']."')";
	   
   
$proses=mysql_query ($query);
if($proses){
	header('location:tampil_suplier.php');
}else{
	echo mysql_error();
}
}include('header.php');
?>
<form method="POST"/>
<table class="table table-bordered">

	<tr>
	<td><Strong>Nama</strong></td>
	<td><input type="text" class='form-control' name="Nama" / ></ td>
	</tr>

	
	<tr>
	<td><input type="submit" value="Simpan" class='btn btn-danger' name="Simpan" /></ td>
	</tr>
	</table>
	</form>
	<?php
	include('footer.php');