<?php
include_once('koneksi.php');
$query=mysql_query("delete from target_salesman where Id_Target='".$_GET[
'Id_Target']."'")or die (mysql_error());
if($query)header("location:tampil_target.php"); else die (mysql_error());
?>