<?php

if($public_id_jabatan == 3 || $public_id_jabatan == 5)

{

?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="box" style="border-top:#1E58C1 4px solid; padding: 20px;">
        <div class="card-header">
          <h3 class="card-title"><b> DATA ROLE USER </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ?<?php if($public_id_jabatan != 3){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
						<td >No</td>
						<td >Role name</td>
						<td >Description</td>
						<td >Action</td>
					</tr>
            </thead>
            <tbody>
			<?php $no2=0;
					$query = "SELECT * from tb_role_user
					inner join tb_jabatan on tb_role_user.id_jabatan = tb_jabatan.id_jabatan
					where id_role_user order by id_role_user ASC";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($result)) 
			{

				$no2++;
				?><tr><?php
					?><td align="center"><?=$no2?></td><?php
					?><td><?=$row['role'] ?></td><?php
					?><td><?=$row['description'] ?></td><?php
					
					?><td align="center"> 

							<button class="btn btn-warning" title="Edit Data" onclick="Editdata('<?=$row['id_role_user']?>','<?=$row['role']?>', '<?=$row['description']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>

							<button class="btn btn-success" title="Lihat Data" onclick="Lihatdata('<?=$row['id_role_user']?>', '<?=$row['role']?>', '<?=$row['description']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
					
							<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_role_user']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_role_user" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">First name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="role" id="role" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Last name</div>
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
	var id_role_user = $('#id_role_user').val();  
	var role = $('#role').val(); 
	var description = $('#description').val();

	if(id_role_user == '')
	{
		if(role == "" || description == "" )
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_role_user:'', role:role, description:description, kode:'role_user'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data role user berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_role_user:id_role_user, role:role, description:description, kode:'role_user'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data role user berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_role_user){
	swal({
  title: "",
  text: "Yakin ingin menghapus data role user ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_role_user:id_role_user, kode:'del_role_user'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data role user berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editdata(id_role_user, role, description){
	$('#id_role_user').val(id_role_user);
	$('#role').val(role);
	$('#description').val(description);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatdata(id_role_user, role, description){
	$('#id_role_user').val(id_role_user);
	$('#role').val(role);
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
