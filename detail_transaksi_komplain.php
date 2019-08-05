<?php
include ("koneksi.php");
$c=mysql_query("select * from transaksi_detail where kode_transaksi='".$_POST['so']."'");  
$x=mysql_fetch_array($c);
$s=$x['kode_transaksi'];
$so=$_POST['so'];
if($so==$x['kode_transaksi']){
 if(isset($_POST['save'])){


	 $data_id=$_POST['id'];
	 $data_komplain=$_POST['komplain'];
		$header=$_POST['id_header'];
	 	for($i=0; $i<count($data_id); $i++)
	{
		
        $Id         =$data_id[$i];
        $Komplain   =$data_komplain[$i];
		$b="update transaksi_detail SET komplain='$Komplain' WHERE Id_Transaksi_Detail='$Id'";
		$gg=mysql_query($b);
	}
if($gg){
	    $bc="update transaksi SET counter='1' WHERE Id_Transaksi='$header'";
		$ggc=mysql_query($bc);
	header("location:thx.php");
}else{
	echo mysql_error();
}	
 }
  
$query_header = mysql_query("SELECT
  `transaksi`.*,
  `customer`.`Nama_Customer`,
  `customer`.`No_Telepon`,
  `salesman`.`Nama_Salesman`
FROM
  `transaksi`
  INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
  INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman` where `transaksi`.`No_transaksi` ='".$_POST['so']."'");
  $data=mysql_fetch_array($query_header);
$query_detail = mysql_query("SELECT
  `transaksi_detail`.*,
  `barang`.`Nama_Barang`
FROM
  `transaksi_detail`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang` where `transaksi_detail`.`kode_transaksi` ='".$_POST['so']."'");
  $data_detail=mysql_fetch_array($query_detail);
include('header_1.php');
?>
<br>
<br>
<h1><center>Detail Pejualan</center></h1>
<div id="print-area" class="print-area">
<div style="text-align:right;"><a class="no-print" href="javascript:printDiv('print-area');">Print</a></div>
<table class="table table-bordered" border="1">
<tr>
<th>No Transaksi</th>
<th>Salesman</th>
<th>Nama Customer</th>
<th>Telpon</th>
<th>Tanggal</th>
</tr>
<tr>
<td><?php echo $data['No_transaksi'];?></td>
<td><?php echo $data['Nama_Salesman'];?></td>
<td><?php echo $data['Nama_Customer'];?></td>
<td><?php echo $data['No_Telepon'];?></td>
<td><?php echo $data['Tgl'];?></td>
</tr>
</table>
<form method="post">
<table class="table table-bordered" border="1">
<tr>
<th>No </th>
<th>Nama Barang</th>
<th>Qty</th>
<th>Harga</th>
<th>Total</th>
<th>Isi Komplain</th>
</tr>
<?php 
$no=1;
$query_detail = mysql_query("SELECT
  `transaksi_detail`.*,
  `barang`.`Nama_Barang`
FROM
  `transaksi_detail`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang` where `transaksi_detail`.`kode_transaksi` ='".$_POST['so']."'");
  while($data_detail=mysql_fetch_array($query_detail)){
?>
<tr>
<td><?php echo $no++;?></td>
<td><?php echo $data_detail['Nama_Barang'];?></td>
<td><?php echo $data_detail['Qty'];?></td>
<td>Rp.<?php echo number_format($data_detail['Harga']);?></td>
<td>Rp.<?php echo number_format($data_detail['Harga'] * $data_detail['Qty']);?></td>
<td><input type="text" name="komplain[]" class="form-control"></td>
<input type="hidden" name="id[]" value="<?php echo $data_detail['Id_Transaksi_Detail'];?>">
<input type="hidden" name="id_header" value="<?php echo $data_detail['Id_Transaksi'];?>">
</tr>
  <?php } ?>
  <tr>
  <td colspan="4">Grand Total</td>
  
  <td>Rp.<?php echo number_format($data['Jumlah']);?></td>
  </tr>
  <tr>
	<td><input type="submit" name="save" class="btn btn-danger"></td>
  </tr>
</table>
</form>
</div>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
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

<?php
}else{
	echo ("<script type='text/javascript'> alert ('Data yang ada cari tidak di temukan'); document.location='javascript:history.back(1)';
			</script>");
}
include('footer.php');
