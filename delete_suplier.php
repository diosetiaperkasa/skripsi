<?php
include_once('koneksi.php');
$query=mysql_query("delete from suplier where id_suplier='".$_GET[
'id_suplier']."'")or die (mysql_error());
if($query)header("location:tampil_suplier.php"); else die (mysql_error());
?>