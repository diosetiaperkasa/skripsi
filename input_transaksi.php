<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
$a=$_POST['Tgl'];
$date = str_replace('/', '-', $a);
$newDate = date("Y-m-d", strtotime($date));
$query= "insert into transaksi(No_transaksi,Id_Salesman,Tgl,Tgl_Tempo,Id_Customer,Status)
value ('" .$_POST['No_transaksi']."',
	   '" .$_POST['Id_Salesman']."',
	   '$newDate',
	   '" .$_POST['Tgl_Tempo']."',
	   '" .$_POST['Id_Customer']."',
	   '" .$_POST['Status']."')";
	   
   
$proses=mysql_query ($query);
$id_transaksi = MySql_Insert_Id ();
if($proses){
	$total =0;
	$data_id_barang=$_POST['Id_Barang'];
	$data_customer =$_POST['Id_Customer'];
	$data_tgl= $_POST['Tgl'];
	$data_sales= $_POST['Id_Salesman'];
	$data_harga= $_POST['Harga'];
	$data_qty=$_POST['Qty'];
	$data_wilayah=$_POST['wilayah'];
	$data_trx=$_POST['No_transaksi'];
	
	for($i=0; $i<count($data_id_barang); $i++)
	{
		
        $Id_Barang  =$data_id_barang[$i];
        $Harga      =$data_harga[$i];
		$Qty        =$data_qty[$i];
		$Tgl        =$data_tgl;
		$Customer   =$data_customer;
		$Sales      =$data_sales;
		$Wilayah    =$data_wilayah;
		$SO			=$data_trx;
		$subtotal = $Qty * $Harga; 
        $detail="insert into transaksi_detail(Id_Transaksi,Id_Barang,Harga,Qty,Sales,Customer,Tgl,Wilayah,kode_transaksi)
		values('$id_transaksi','$Id_Barang','$Harga','$Qty','$Sales','$Customer','$Tgl','$Wilayah','$SO')";
		//echo $detail;
		$a=mysql_query($detail);
     	$total+=$subtotal;
		$b=mysql_query("update barang SET Stok=Stok-" . $Qty. " WHERE Id_Barang='" . $Id_Barang . "'");
	}
$q=mysql_query("update transaksi set Jumlah='$total' where Id_Transaksi='$id_transaksi'");
	
if($a){
	header('location:tampil_transaksi.php');
	
}else{
	echo mysql_error();
	//die;
}
	
}else{
	echo mysql_error();
}
}
include('header.php');
?>
<script src="jquery.js"></script>
<form method="POST"/>
<table class="table table-bordered">
<?php 
$no=mysql_query("select max(Id_Transaksi)+1 AS NO from transaksi");
$trx=mysql_fetch_array($no);?>
<input type="hidden" class='form-control' value="BELUM LUNAS" name="Status" / >
<tr>
	<td><Strong>No_Transaksi</strong></td>
	<td><input type="text" value="SO-0<?php echo $trx['NO'];?>"class='form-control' name="No_transaksi" readonly></td>
	</tr>
	
	<tr>
	<td><Strong>Tanggal Transaksi</strong></td>
	<td><input type="text" class='form-control datepicker' name="Tgl"></td>
	</tr>
	<tr>
	<td><Strong>Tanggal Jatuh Tempo</strong></td>
	<td><input type="text" class='form-control datepicker' name="Tgl_Tempo"></td>
	</tr>

	<tr>
	<td><strong>Id_Salesman</strong></td>
	<td><select class='form-control' name="Id_Salesman"/>
	<option value=""/>------Pilih Salesman------</option>
		<?php 
		$data=mysql_query("select * from salesman");
		while($list=mysql_fetch_array($data)){ ?>
			<option value="<?php echo $list['Id_Salesman'];?>"/><?php echo $list['Nama_Salesman'];?></option>
		
		<?php } ?>
	</select>
	</td>
	</tr>
<input type="hidden" name="wilayah" id="wilayah"/>
	<tr>
	<td><strong>Id_Customer</strong></td>
	<td><select class='form-control' name="Id_Customer" id="Id_Customer"/>
	<option value=""/>------Pilih Customer------</option>
		<?php 
		$data=mysql_query("select * from customer");
		while($list=mysql_fetch_array($data)){ ?>
			<option value="<?php echo $list['Id_Customer'];?>"/><?php echo $list['Nama_Customer'];?></option>
		
		<?php } ?>
	</select>
	</td>
	</tr>
	</table>
	 <?php $q=mysql_query("select * from barang");
        while ($h=mysql_fetch_array($q)) { 
        	$account[] = array("Id_Barang" => $h['Id_Barang'], "Nama_Barang" => $h['Nama_Barang']);
       }?>
	<table class="table table-striped table table-bordered">
        <tr id="baris">
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Qty</td>
        </tr>
        <tr>
        <td> <select name="Id_Barang[]" id="textfield2" class="form-control" />
			<option value="">--Pilih Barang--</option>
     			<?php 
        $q=mysql_query("select * from barang");
        while ($d=mysql_fetch_array($q)) { ?>
               
     			<option value="<?php echo $d['Id_Barang'];?>"><?php echo $d['Nama_Barang'];?></option>
            	<?php } ?>
                </select> </td>
            
            <td>
                <input type="number" name="Harga[]" id="textfield2" class="form-control" /></td>
            <td>
                <input type="number" name="Qty[]" id="textfield3" class="form-control" /></td>
        </tr>
        <tr id="tambah">
            <td colspan="4"><input type="button" class="btn-large btn-success" id="tambah" name="baris" value="tambah baris"/></td>
        </tr>
        <tr>
            <td colspan="4"><input type="submit" class="btn btn-small btn-danger" name="Simpan" value="simpan"/></td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</form>
<script>
    $(document).ready(function(e) {

        var data = '<tr>'
        		 + '<td>'
                + '<select name="Id_Barang[]" id="acount" class="form-control">'
				+'<option value="">--Pilih Barang--</option>'
                  <?php foreach ($account as $b) { ?>
                  + '<option value="<?php echo $b['Id_Barang']; ?>"><?php echo $b['Nama_Barang']; ?></option>'
                  <?php } ?>
                 + '</select></td>'
                + '<td>'
                + '<input type="text" name="Harga[]" id="textfield2" class="form-control" /></td>'
                + '<td>'
                + '<input type="text" name="Qty[]" id="textfield3"  class="form-control"/></td>'
                + '</tr>';
        $("#tambah").click(function() {
            $("#tambah").before(data);

        });
		$("#Id_Customer").click(function(){
	   var Id_Customer=$("#Id_Customer").val();
	$.ajax({
		url:"get_wilayah.php",
		data:"Id_Customer="+Id_Customer,
		success:function(value){
			var data = value.split(",");
			$("#customer").val(data[0]);
			$("#wilayah").val(data[1]);
		
		
			
			}
		
		
		});
	
	});
		
		$(".datepicker").datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                changeMonth: true,
                changeYear: true
            });
    });


</script>
	</form>
	<?php
	include('footer.php');