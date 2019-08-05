<?php
include_once('koneksi.php');
$query=mysql_query("delete from tagihan where Id_Tagihan='".$_GET[
'Id_Tagihan']."'")or die (mysql_error());
if($query)header("location:tampil_tagihan.php"); else die (mysql_error());
?>