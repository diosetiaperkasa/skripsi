<?php
include_once('koneksi.php');
$query=mysql_query("delete from transaksi where Id_Transaksi='".$_GET[
'Id_Transaksi']."'")or die (mysql_error());
if($query)header("location:tampil_transaksi.php"); else die (mysql_error());
?>