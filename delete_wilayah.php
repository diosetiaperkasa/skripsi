<?php
include_once('koneksi.php');
$query=mysql_query("delete from wilayah where Id_Wilayah='".$_GET[
'Id_Wilayah']."'")or die (mysql_error());
if($query)header("location:tampil_wilayah.php"); else die (mysql_error());
?>