<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=komisi_perbarang.xls");
include ('koneksi.php');
if(isset($_POST['cari'])){
$list_transaksi=mysql_query("SELECT
  `wilayah`.`Nama`,
  `transaksi_detail`.*,
  `barang`.`Nama_Barang`,
  `customer`.`Nama_Customer`
FROM
  `wilayah`
  INNER JOIN `transaksi_detail` ON `transaksi_detail`.`Wilayah` =
    `wilayah`.`Id_Wilayah`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`
  INNER JOIN `customer` ON `transaksi_detail`.`Customer` =
    `customer`.`Id_Customer` where `transaksi_detail`.Customer ='".$_POST['nama']."' and Tgl between '".$_POST['Tgl1']."' and '".$_POST['Tgl2']."'");
  //echo $list_transaksi;
 
}else{
	$list_transaksi=mysql_query("SELECT
  `wilayah`.`Nama`,
  `transaksi_detail`.*,
  `barang`.`Nama_Barang`,
  `customer`.`Nama_Customer`
FROM
  `wilayah`
  INNER JOIN `transaksi_detail` ON `transaksi_detail`.`Wilayah` =
    `wilayah`.`Id_Wilayah`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`
  INNER JOIN `customer` ON `transaksi_detail`.`Customer` =
    `customer`.`Id_Customer`");
}
//include('header.php');
?>

<h4>Laporan Persediaan PT.Pratama inti distribusindo</h4>
<table border="5" class="table table-bordered">

	<tr>
		
		<td>Nama_Barang</td>
		<td>Stok Awal</td>
		<td>Stok keluar</td>
		<td>Stok Akhir</td>
	
	</tr>
	<?php
	
	$list_barang=mysql_query("SELECT
  `barang`.`Nama_Barang`,
  `transaksi_detail`.`Qty`,
  `transaksi_detail`.`Harga`,
  `barang`.`stok_awal`,
  `barang`.`Stok`
FROM
  `transaksi_detail`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`");
	while($proses=mysql_fetch_array($list_barang)){
		
		?>
<tr>

	<td><?php echo $proses['Nama_Barang'];?></td>
	<td><?php echo $proses['stok_awal'];?></td>
	<td><?php echo $proses['Qty'];?></td>
	<td><?php echo $proses['stok_awal'] - $proses['Qty'];?></td>
	

</tr>
	<?php } ?>
</table>
</div>
</form>
</div>

<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script>
function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
<style>

.print-area {border:1px solid red;padding:1em;margin:0 0 1em}
</style>
