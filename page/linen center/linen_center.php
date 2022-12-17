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
          <h3 class="card-title"><b> DATA LINEN CENTER </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ?<?php if($public_id_jabatan != 2){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Code</td>
									<td >Name</td>
									<td >Address</td>
									<td >Phone</td>
									<td >Email</td>
									<td >Description</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no2=0;
									$query = "SELECT * from tb_linen_center_detail
									inner join tb_jabatan on tb_linen_center_detail.id_jabatan = tb_jabatan.id_jabatan
									where id_linen_center_detail order by id_linen_center_detail ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no2++;
								?><tr><?php
									?><td align="center"><?=$no2?></td><?php
									?><td><?=$row['code'] ?></td><?php
									?><td><?=$row['name'] ?></td><?php
									?><td><?=$row['address'] ?></td><?php
									?><td><?=$row['phone'] ?></td><?php
									?><td><?=$row['email'] ?></td><?php
									?><td><?=$row['description']?></td><?php
									
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Editdata('<?=$row['id_linen_center_detail']?>','<?=$row['code']?>', '<?=$row['name']?>', '<?=$row['address']?>', '<?=$row['phone']?>', '<?=$row['email']?>', '<?=$row['description']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatdata('<?=$row['id_linen_center_detail']?>','<?=$row['code']?>', '<?=$row['name']?>', '<?=$row['address']?>', '<?=$row['phone']?>', '<?=$row['email']?>', '<?=$row['description']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
									
											<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_linen_center_detail']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
									</td>
								</tr><?php
							} $box2 = $no2;
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

<div id="Modal2" class="modal fade" aria-hidden="true">
<div class="modal-dialog modal-md" >
	
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" id="judul2"></h4>
	  </div>
	  <div class="modal-body row">
	  
		  <input type="hidden" id="id_linen_center_detail" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="code" id="code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="name" id="name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Address</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="address" id="address" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Phone</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="phone" id="phone" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Email</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="email" id="email" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Description</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="description" id="description" class="form-control"/></div>
		  

		 </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary" id="btn_save"><i class="fa fa-save"></i> Simpan</button>
	  </div>
	</div>

</div>
</div>

<script type="text/javascript" class="init">
var token = document.querySelector("meta[property='rtoken']").getAttribute("content");

$('#btn_save').on('click', function (e) {
	var id_linen_center_detail = $('#id_linen_center_detail').val(); 
	var code = $('#code').val(); 
	var name = $('#name').val();
	var address = $('#address').val();
	var phone = $('#phone').val();
	var email = $('#email').val();
	var description = $('#description').val();

	if(id_linen_center_detail == '')
	{
		if(code == "" || name == "" || address == "" || phone == "" || email == "" || description == "")
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_linen_center_detail:'', code:code, name:name, address:address, phone:phone, email:email, description:description, kode:'linen_center'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data linen center berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_linen_center_detail:id_linen_center_detail, code:code, name:name, address:address, phone:phone, email:email, description:description, kode:'linen_center'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data linen center berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_linen_center_detail){
	swal({
  title: "",
  text: "Yakin ingin menghapus data linen center ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_linen_center_detail:id_linen_center_detail, kode:'del_linen_center'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data linen center berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
				}
				else
				{
					swal({icon: 'error',title: 'Oops...',text: data,})
				}	
			});
	  }
	});
}

function ShowAdd2(){
	$("#judul2").html("Tambah Data");
	$("#Modal2").modal('show');
}

function Editdata(id_linen_center_detail, code, name, address, phone, email, description){
	$('#id_linen_center_detail').val(id_linen_center_detail);
	$('#code').val(code);
	$('#name').val(name);
	$('#address').val(address);
	$('#phone').val(phone);
	$('#email').val(email);
	$('#description').val(description);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatdata(id_linen_center_detail, code, name, address, phone, email, description){
	$('#id_linen_center_detail').val(id_linen_center_detail);
	$('#code').val(code);
	$('#name').val(name);
	$('#address').val(address);
	$('#phone').val(phone);
	$('#email').val(email);
	$('#description').val(description);
	$("#judul2").html("Lihat Menu ");
	$("#Modal2").modal('show');
}

$('#box2').text('<?=$box2?>');
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

