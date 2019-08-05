<?php 
include('koneksi.php');
$id=$_GET['Id_Customer'];
$query=mysql_query("SELECT
  `customer`.*,
  `wilayah`.`Nama`
FROM
  `wilayah`
  INNER JOIN `customer` ON `customer`.`Id_Wilayah` = `wilayah`.`Id_Wilayah` where `customer`.Id_Customer='$id'");
$fe=mysql_fetch_array($query);
$nama=$fe['Nama'];
$id_wilayah=$fe['Id_Wilayah'];

echo $nama.",".$id_wilayah;

?>