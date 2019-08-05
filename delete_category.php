<?php
include_once('koneksi.php');
$query=mysql_query("delete from category where Id_Category='".$_GET[
'Id_Category']."'")or die (mysql_error());
if($query)header("location:tampil_category.php"); else die (mysql_error());
?>