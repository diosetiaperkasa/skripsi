<?php
include_once('koneksi.php');
$query=mysql_query("delete from Salesman where Id_Salesman='".$_GET[
'Id_Salesman']."'")or die (mysql_error());
if($query)header("location:tampil_salesman.php"); else die (mysql_error());
?>