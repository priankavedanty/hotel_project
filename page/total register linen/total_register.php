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
          <h3 class="card-title"><b> DATA REGISTER HISTORY </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd()" ?<?php if($public_id_jabatan != 3){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Register date</td>
									<td >Template code</td>
									<td >Template name </td>
									<td >Linen type</td>
									<td >Total</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no=0;
									$query = "SELECT * from tb_register_history
									inner join tb_jabatan on tb_register_history.id_jabatan = tb_jabatan.id_jabatan
									where id_register_history order by id_register_history ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no++;
								?><tr><?php
									?><td align="center"><?=$no?></td><?php
									?><td><?=$row['register_date'] ?></td><?php
									?><td><?=$row['template_code'] ?></td><?php
									?><td><?=$row['template_name'] ?></td><?php
									?><td><?=$row['linen_type'] ?></td><?php
									?><td><?=$row['total'] ?></td><?php
									
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Editregister('<?=$row['id_register_history']?>','<?=$row['register_date']?>', '<?=$row['template_code']?>', '<?=$row['template_name']?>','<?=$row['linen_type']?>', '<?=$row['total']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatregister('<?=$row['id_register_history']?>','<?=$row['register_date']?>', '<?=$row['template_code']?>', '<?=$row['template_name']?>','<?=$row['linen_type']?>', '<?=$row['total']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
									
											<button class="btn btn-danger" title="Hapus Data" onclick="Hapusmenu('<?=$row['id_register_history']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_register_history" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Register date</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="date" name="register_date" id="register_date" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Template code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="template_code" id="template_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Template name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="template_name" id="template_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen type</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_type" id="linen_type" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Total</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="total" id="total" class="form-control"/></div>

		  

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
	var id_register_history = $('#id_register_history').val(); 
	var register_date = $('#register_date').val(); 
	var template_code = $('#template_code').val(); 
	var template_name = $('#template_name').val();
	var linen_type = $('#linen_type').val();
	var total = $('#total').val();
	var id_jabatan = $('#id_jabatan').val();

	if(id_register_history == '')
	{
		if(register_date == "" || template_code == "" ||  template_name == "" || linen_type == "" || total == "" || id_jabatan == "")
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_register_history:'', register_date:register_date, template_code:template_code, template_name:template_name, linen_type:linen_type, total:total, id_jabatan:'', kode:'register_history'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data register history berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
		$.post("func/func_administrator.php",{token:token, id_register_history:id_register_history, register_date:register_date, template_code:template_code, template_name:template_name, linen_type:linen_type, total:total, kode:'register_history'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data register history berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
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
	  text: "Yakin ingin menghapus register history ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Hapus"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id_register_history:id, kode:'del_register_ history'},
				function(data){
				if(data == 1)
				{				
					swal({text: "Laundry berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editregister(id_register_history, register_date, template_code, template_name, linen_type, total){
	$('#id_register_history').val(id_register_history);
	$('#register_date').val(register_date);
	$('#template_code').val(template_code);
	$('#template_name').val(template_name);
	$('#linen_type').val(linen_type);
	$('#total').val(total);
	$("#judul").html("Edit Menu ");
	$("#Modal").modal('show');
}

function Lihatregister(id_register_history, register_date, template_code, template_name, linen_type, total){
	$('#id_register_history').val(id_register_history);
	$('#register_date').val(register_date);
	$('#template_code').val(template_code);
	$('#template_name').val(template_name);
	$('#linen_type').val(linen_type);
	$('#total').val(total);
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

