<?php

if($public_id_jabatan == 3) 

{


?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="box" style="border-top:#1E58C1 4px solid; padding: 20px;">
        <div class="card-header">
          <h3 class="card-title"><b> DATA INTERNAL TRANSACTION </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd()" ?<?php if($public_id_jabatan != 3){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Train code</td>
									<td >Train date</td>
									<td >Type</td>
									<td >Laundry</td>
									<td >Total</td>
									<td >Status</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no=0;
									$query = "SELECT * from tb_internal_transaction 
									inner join tb_jabatan on tb_internal_transaction.id_jabatan = tb_jabatan.id_jabatan
									where id_internal_transaction order by id_internal_transaction ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no++;
								?><tr><?php
									?><td align="center"><?=$no?></td><?php
									?><td><?=$row['train_code'] ?></td><?php
									?><td><?=$row['train_date'] ?></td><?php
									?><td><?=$row['type'] ?></td><?php
									?><td><?=$row['laundry'] ?></td><?php
									?><td><?=$row['total'] ?></td><?php
									?><td><?=$row['status'] ?></td><?php
									
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Editinternal('<?=$row['id_internal_transaction']?>','<?=$row['train_code']?>', '<?=$row['train_date']?>','<?=$row['type']?>', '<?=$row['laundry']?>', '<?=$row['total']?>', '<?=$row['status']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatinternal('<?=$row['id_internal_transaction']?>','<?=$row['train_code']?>', '<?=$row['train_date']?>','<?=$row['type']?>', '<?=$row['laundry']?>', '<?=$row['total']?>', '<?=$row['status']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
									
											<button class="btn btn-danger" title="Hapus Data" onclick="Hapusmenu('<?=$row['id_internal_transaction']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
									</td>
								</tr><?php
							} $box1 = $no;
						?>
           </tbody>
          </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<div id="Modal" class="modal fade" aria-hidden="true">
<div class="modal-dialog modal-md" >
	
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" id="judul"></h4>
	  </div>
	  <div class="modal-body row">
	  
		  <input type="hidden" id="id_internal_transaction" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Train code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="train_code" id="train_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Train date</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="date" name="train_date" id="train_date" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Type</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="type" id="type" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Laundry</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="laundry" id="laundry" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Total</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="total" id="total" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Status</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="status" id="status" class="form-control"/></div>
		  

		 </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary" id="btn_save"><i class="fa fa-save"></i> Simpan</button>
	  </div>
	</div>

</div>
</div>


</div>
</div>

<script type="text/javascript" class="init">
var token = document.querySelector("meta[property='rtoken']").getAttribute("content");

$('#btn_save').on('click', function (e) {
	var id_internal_transaction = $('#id_internal_transaction').val(); 
	var train_code = $('#train_code').val(); 
	var train_date = $('#train_date').val();
	var type = $('#type').val();
	var laundry = $('#laundry').val();
	var total = $('#total').val();
	var status = $('#status').val();

	if(id_internal_transaction == '')
	{
		if(train_code == "" || train_date == "" || type == "" || laundry == "" || total == "" || status == "")
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_internal_transaction:'', train_code:train_code, train_date:train_date, type:type, laundry:laundry, total:total, status:status, kode:'internal_transaction'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data internal transaction berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({icon: 'error',title: 'Oops...',text: data,})
				}
			});
		}
	}
	else
	{
		$.post("func/func_administrator.php",{token:token, id_internal_transaction:id_internal_transaction, train_code:train_code, train_date:train_date, type:type, total:total, status:status, kode:'internal_transaction'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data internal transaction berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
});

function Hapusmenu(id){
	swal({
	  title: "",
	  text: "Yakin ingin menghapus internal transaction ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Hapus"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id_internal_transaction:id, kode:'del_internal'},
				function(data){
				if(data == 1)
				{				
					swal({text: "Internal transaction berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({type: 'error',title: 'Oops...',text: data,})
				}	
			});
		 }
	});
}

function ShowAdd(){
	$("#judul").html("Tambah Data");
	$("#Modal").modal('show');
}

function Editinternal(id_internal_transaction, train_code, train_date, type, laundry, total, status){
	$('#id_internal_transaction').val(id_internal_transaction);
	$('#train_code').val(train_code);
	$('#train_date').val(train_date);
	$('#type').val(type);
	$('#laundry').val(laundry);
	$('#total').val(total);
	$('#status').val(status);
	$("#judul").html("Edit Menu ");
	$("#Modal").modal('show');
}

function Lihatinternal(id_internal_transaction, train_code, train_date, type, laundry, total, status){
	$('#id_internal_transaction').val(id_internal_transaction);
	$('#train_code').val(train_code);
	$('#train_date').val(train_date);
	$('#type').val(type);
	$('#laundry').val(laundry);
	$('#total').val(total);
	$('#status').val(status);
	$("#judul").html("Lihat Menu ");
	$("#Modal").modal('show');
}

$('#box1').text('<?=$box1?>');
</script>

<?php
}
else
{
?>
	<!-- Main content -->
	<section class="content">
	    <div class="error-content">
	      <h3><i class="fa fa-warning text-yellow"></i> Oops! Access denied.</h3>

	      <p>
	       	 Anda tidak diizinkan untuk mengakses halaman ini. Kembali ke halaman sebelumnya.
	      </p>

	    </div>
	    <!-- /.error-content -->
	</section>
	<!-- /.content -->
<?php
}
?>

