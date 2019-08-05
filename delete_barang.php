<?php
include_once('koneksi.php');
$query=mysql_query("delete from barang where Id_Barang='".$_GET[
'Id_Barang']."'")or die (mysql_error());
if($query)header("location:tampil_barang.php"); else die (mysql_error());
?>