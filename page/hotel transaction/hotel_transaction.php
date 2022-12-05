<?php

if($public_id_jabatan == 2)

{


?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="box" style="border-top:#1E58C1 4px solid; padding: 20px;">
        <div class="card-header">
          <h3 class="card-title"><b> DATA HOTEL TRANSACTION </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd()" ?<?php if($public_id_jabatan != 2){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Train code</td>
									<td >Train date</td>
									<td >Clean</td>
									<td >Soil</td>
									<td >Stain</td>
									<td >Torn</td>
									<td >Tran status</td>
									<td >Delivery status</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no=0;
									$query = "SELECT * from tb_hotel_transaction 
									inner join tb_jabatan on tb_hotel_transaction.id_jabatan = tb_jabatan.id_jabatan
									where id_hotel_transaction order by id_hotel_transaction ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no++;
								?><tr><?php
									?><td align="center"><?=$no?></td><?php
									?><td><?=$row['train_code'] ?></td><?php
									?><td><?=$row['train_date'] ?></td><?php
									?><td><?=$row['clean'] ?></td><?php
									?><td><?=$row['soil'] ?></td><?php
									?><td><?=$row['stain'] ?></td><?php
									?><td><?=$row['torn']?></td><?php
									?><td><?=$row['tran_status'] ?></td><?php
									?><td><?=$row['delivery_status'] ?></td><?php
									
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Edithotel('<?=$row['id_hotel_transaction']?>','<?=$row['train_code']?>', '<?=$row['train_date']?>', '<?=$row['clean']?>', '<?=$row['soil']?>', '<?=$row['stain']?>', '<?=$row['torn']?>', '<?=$row['tran_status']?>', '<?=$row['delivery_status']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
									
											<button class="btn btn-danger" title="Hapus Data" onclick="Hapusmenu('<?=$row['id_hotel_transaction']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_hotel_transaction" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Train code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="train_code" id="train_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Train date</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="date" name="train_date" id="train_date" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Clean</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="clean" id="clean" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Soil</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="soil" id="soil" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Stain</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="stain" id="stain" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Torn</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="torn" id="torn" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Tran status</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="tran_status" id="tran_status" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Delivery status</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="delivery_status" id="delivery_status" class="form-control"/></div>
		  

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
	var id_hotel_transaction = $('#id_hotel_transaction').val(); 
	var train_code = $('#train_code').val(); 
	var train_date = $('#train_date').val();
	var clean = $('#clean').val();
	var soil = $('#soil').val();
	var stain = $('#stain').val();
	var torn = $('#torn').val();
	var tran_status = $('#tran_status').val();
	var delivery_status = $('#delivery_status').val();

	if(id_hotel_transaction == '')
	{
		if(train_code == "" || train_date == "" || clean == "" || soil == "" || stain == "" || torn == "" || tran_status == "" || delivery_status == "")
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_hotel_transaction:'', train_code:train_code, train_date:train_date, clean:clean, soil:soil, stain:stain, torn:torn, tran_status:tran_status, delivery_status:delivery_status, kode:'hotel_transaction'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data hotel transaction berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
		$.post("func/func_administrator.php",{token:token, id_hotel_transaction:id_hotel_transaction, train_code:train_code, train_date:train_date, clean:clean, soil:soil, stain:stain, torn:torn, tran_status:tran_status, delivery_status:delivery_status, kode:'hotel_transaction'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data hotel transaction berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
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
	  text: "Yakin ingin menghapus hotel transaction ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Hapus"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id_hotel_transaction:id, kode:'del_hotel'},
				function(data){
				if(data == 1)
				{				
					swal({text: "Hotel transaction berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Edithotel(id_hotel_transaction, train_code, train_date, clean, soil, stain, torn, tran_status, delivery_status){
	$('#id_hotel_transaction').val(id_hotel_transaction);
	$('#train_code').val(train_code);
	$('#train_date').val(train_date);
	$('#clean').val(clean);
	$('#soil').val(soil);
	$('#stain').val(stain);
	$('#torn').val(torn);
	$('#tran_status').val(tran_status);
	$('#delivery_status').val(delivery_status);
	$("#judul").html("Edit Menu ");
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

