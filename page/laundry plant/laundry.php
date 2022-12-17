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
          <h3 class="card-title"><b> DATA LAUNDRY PLANT </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd()" ?<?php if($public_id_jabatan != 3){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Name</td>
									<td >Code</td>
									<td >Phone</td>
									<td >Email</td>
									<td >Linen center</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no=0;
									$query = "SELECT * from tb_laundry_plant 
									inner join tb_jabatan on tb_laundry_plant.id_jabatan = tb_jabatan.id_jabatan
									where id_laundry_plant order by id_laundry_plant ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no++;
								?><tr><?php
									?><td align="center"><?=$no?></td><?php
									?><td><?=$row['name'] ?></td><?php
									?><td><?=$row['code'] ?></td><?php
									?><td><?=$row['phone'] ?></td><?php
									?><td><?=$row['email'] ?></td><?php
									?><td><?=$row['linen_center'] ?></td><?php
									
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Editlaundry('<?=$row['id_laundry_plant']?>','<?=$row['name']?>', '<?=$row['code']?>', '<?=$row['phone']?>','<?=$row['email']?>', '<?=$row['linen_center']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatlaundry('<?=$row['id_laundry_plant']?>','<?=$row['name']?>', '<?=$row['code']?>', '<?=$row['phone']?>','<?=$row['email']?>', '<?=$row['linen_center']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
									
											<button class="btn btn-danger" title="Hapus Data" onclick="Hapusmenu('<?=$row['id_laundry_plant']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_laundry_plant" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="name" id="name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="code" id="code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Phone</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="phone" id="phone" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Email</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="email" id="email" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen center</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_center" id="linen_center" class="form-control"/></div>

		  

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
	var id_laundry_plant = $('#id_laundry_plant').val(); 
	var name = $('#name').val(); 
	var code = $('#code').val(); 
	var phone = $('#phone').val();
	var email = $('#email').val();
	var linen_center = $('#linen_center').val();
	var id_jabatan = $('#id_jabatan').val();

	if(id_laundry_plant == '')
	{
		if(name == "" || code == "" ||  phone == "" || email == "" || linen_center == "" || id_jabatan == "")
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_laundry_plant:'', name:name, code:code, phone:phone, email:email, linen_center:linen_center, id_jabatan:id_jabatan, kode:'laundry_plant'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data laundry berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
		$.post("func/func_administrator.php",{token:token, id_laundry_plant:id_laundry_plant, name:name, code:code, phone:phone, email:email, linen_center:linen_center, kode:'laundry_plant'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data laundry berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
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
	  text: "Yakin ingin menghapus laundry ini?",
	  icon: "info",
	  dangerMode: true,
	  buttons: ["Batal", "Hapus"],
		})
		.then(willConfirm => {
		  if (willConfirm) {
		   	$.post("func/func_administrator.php",{token:token, id_laundry_plant:id, kode:'del_laundry'},
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

function Editlaundry(id_laundry_plant, name, code, phone, email, linen_center){
	$('#id_laundry_plant').val(id_laundry_plant);
	$('#name').val(name);
	$('#code').val(code);
	$('#phone').val(phone);
	$('#email').val(email);
	$('#linen_center').val(linen_center);
	$("#judul").html("Edit Menu ");
	$("#Modal").modal('show');
}

function Lihatlaundry(id_laundry_plant, name, code, phone, email, linen_center){
	$('#id_laundry_plant').val(id_laundry_plant);
	$('#name').val(name);
	$('#code').val(code);
	$('#phone').val(phone);
	$('#email').val(email);
	$('#linen_center').val(linen_center);
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

