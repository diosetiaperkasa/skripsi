<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
$a=$_POST['Tgl']
$date = str_replace('/', '-', $a);
$newDate = date("Y-m-d", strtotime($date));
$query= "insert into transaksi(No_transaksi,Tgl,Tgl_Tempo,id_suplier,Status)
value ('" .$_POST['No_transaksi']."',
	   '" .$newDate."',
	   '" .$_POST['Tgl_Tempo']."',
	   '" .$_POST['id_suplier']."',
	   '" .$_POST['Status']."')";
	   
   
$proses=mysql_query ($query);
$id_transaksi = MySql_Insert_Id ();
if($proses){
	$total =0;
	$data_id_barang=$_POST['Id_Barang'];
	$data_customer =$_POST['id_suplier'];
	$data_tgl= $newDate;
	$data_harga= $_POST['Harga'];
	$data_qty=$_POST['Qty'];
	
	for($i=0; $i<count($data_id_barang); $i++)
	{
		
        $Id_Barang  =$data_id_barang[$i];
        $Harga      =$data_harga[$i];
		$Qty        =$data_qty[$i];
		$Tgl        =$data_tgl;
		$suplier   =$data_customer;
		$Wilayah    =$data_wilayah;
		$subtotal = $Qty * $Harga; 
        $detail="insert into transaksi_detail(Id_Transaksi,Id_Barang,Harga,Qty,suplier,Tgl)
		values('$id_transaksi','$Id_Barang','$Harga','$Qty','$suplier','$Tgl')";
		//echo $detail;
		//die;
		$a=mysql_query($detail);
     	$total+=$subtotal;
		$b=mysql_query("update barang SET Stok=Stok+" . $Qty. " WHERE Id_Barang='" . $Id_Barang . "'");
	}
$q=mysql_query("update transaksi set Jumlah='$total' where Id_Transaksi='$id_transaksi'");
	
if($a){
	header('location:tampil_transaksi_masuk.php');
	
}else{
	echo mysql_error();
	die;
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
<input type="hidden" class='form-control' value="BELUM LUNAS" name="Status" / >
<tr>
	<td><Strong>No_Transaksi</strong></td>
	<td><input type="text" class='form-control' name="No_transaksi" / ></ td>
	</tr>
	
	<tr>
	<td><Strong>Tanggal Transaksi</strong></td>
	<td><input type="text" class='form-control datepicker' name="Tgl" / ></td>
	</tr>
	<tr>
	<td><Strong>Tanggal Jatuh Tempo</strong></td>
	<td><input type="text" class='form-control datepicker' name="Tgl_Tempo" /></ td>
	</tr>

	<tr>
	<td><strong>id_suplier</strong></td>
	<td><select class='form-control' name="id_suplier" id="id_suplier"/>
	<option value=""/>------Pilih suplier------</option>
		<?php 
		$data=mysql_query("select * from suplier");
		while($list=mysql_fetch_array($data)){ ?>
			<option value="<?php echo $list['id_suplier'];?>"/><?php echo $list['nama'];?></option>
		
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
                <input type="text" name="Harga[]" id="textfield2" class="form-control" /></td>
            <td>
                <input type="text" name="Qty[]" id="textfield3" class="form-control" /></td>
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
		$("#id_suplier").click(function(){
	   var id_suplier=$("#id_suplier").val();
	$.ajax({
		url:"get_wilayah.php",
		data:"id_suplier="+id_suplier,
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