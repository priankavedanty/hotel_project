<?php

if($public_id_jabatan == 3 || $public_id_jabatan == 8)
	
{

?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="box" style="border-top:#1E58C1 4px solid; padding: 20px;">
        <div class="card-header">
          <h3 class="card-title"><b> DATA USER </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ?<?php if($public_id_jabatan != 3 || $public_id_jabatan == 8){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
						<td >No</td>
						<td >First name</td>
						<td >Last name</td>
						<td >Linen center</td>
						<td >Laundry plant</td>
						<td >Email</td>
						<td >Action</td>
					</tr>
            </thead>
            <tbody>
			<?php $no2=0;
					$query = "SELECT * from tb_user
					inner join tb_jabatan on tb_user.id_jabatan = tb_jabatan.id_jabatan
					where id_user order by id_user ASC";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($result)) 
			{

				$no2++;
				?><tr><?php
					?><td align="center"><?=$no2?></td><?php
					?><td><?=$row['first_name'] ?></td><?php
					?><td><?=$row['last_name'] ?></td><?php
					?><td><?=$row['linen_center'] ?></td><?php
					?><td><?=$row['laundry_plant'] ?></td><?php
					?><td><?=$row['email'] ?></td><?php
					
					?><td align="center"> 

							<button class="btn btn-warning" title="Edit Data" onclick="Editdata('<?=$row['id_user']?>','<?=$row['first_name']?>', '<?=$row['last_name']?>', '<?=$row['linen_center']?>', '<?=$row['laundry_plant']?>', '<?=$row['email']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 3 || $public_id_jabatan == 8){ print "disabled";}?>></i></button>

							<button class="btn btn-success" title="Lihat Data" onclick="Lihatdata('<?=$row['id_user']?>', '<?=$row['first_name']?>', '<?=$row['last_name']?>', '<?=$row['linen_center']?>', '<?=$row['laundry_plant']?>', '<?=$row['email']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 3 || $public_id_jabatan == 8){ print "disabled";}?>></i></button>
					
							<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_user']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 3 || $public_id_jabatan == 8){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_user" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">First name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="first_name" id="first_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Last name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="last_name" id="last_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen center</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_center" id="linen_center" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Laundry plant</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="laundry_plant" id="laundry_plant" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Email</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="email" id="email" class="form-control"/></div>
		  

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
	var id_user = $('#id_user').val();  
	var first_name = $('#first_name').val(); 
	var last_name = $('#last_name').val();
	var linen_center = $('#linen_center').val();
	var laundry_plant = $('#laundry_plant').val();
	var email = $('#email').val();

	if(id_user == '')
	{
		if(first_name == "" || last_name == "" || linen_center == "" || laundry_plant == "" || email == "" )
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_user:'', first_name:first_name, last_name:last_name, linen_center:linen_center, laundry_plant:laundry_plant, email:email, kode:'user'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data user berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_user:id_user, first_name:first_name, last_name:last_name, linen_center:linen_center, laundry_plant:laundry_plant, email:email,  kode:'user'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data user berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_user){
	swal({
  title: "",
  text: "Yakin ingin menghapus data user ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_user:id_user, kode:'del_user'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data user berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editdata(id_user, first_name, last_name, linen_center, laundry_plant, email){
	$('#id_user').val(id_user);
	$('#first_name').val(first_name);
	$('#last_name').val(last_name);
	$('#linen_center').val(linen_center);
	$('#laundry_plant').val(laundry_plant);
	$('#email').val(email);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatdata(id_user, first_name, last_name, linen_center, laundry_plant, email){
	$('#id_user').val(id_user);
	$('#first_name').val(first_name);
	$('#last_name').val(last_name);
	$('#linen_center').val(linen_center);
	$('#laundry_plant').val(laundry_plant);
	$('#email').val(email);
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
