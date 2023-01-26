<?php

if($public_id_jabatan == 2 || $public_id_jabatan == 3 || $public_id_jabatan == 4 || $public_id_jabatan == 5 || $public_id_jabatan == 6)

{

?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="box" style="border-top:#1E58C1 4px solid; padding: 20px;">
        <div class="card-header">
          <h3 class="card-title"><b> DATA DRIVER </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
						<td >No</td>
						<td >Driver id</td>
						<td >First name</td>
						<td >Last name</td>
						<td >Gender</td>
						<td >Phone</td>
						<td >Action</td>
					</tr>
            </thead>
            <tbody>
			<?php $no2=0;
					$query = "SELECT * from tb_driver
					inner join tb_jabatan on tb_driver.id_jabatan = tb_jabatan.id_jabatan
					where id_driver order by id_driver ASC";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($result)) 
			{

				$no2++;
				?><tr><?php
					?><td align="center"><?=$no2?></td><?php
					?><td><?=$row['driver_id'] ?></td><?php
					?><td><?=$row['first_name'] ?></td><?php
					?><td><?=$row['last_name'] ?></td><?php
					?><td><?=$row['gender'] ?></td><?php
					?><td><?=$row['phone'] ?></td><?php
					
					?><td align="center"> 

							<button class="btn btn-warning" title="Edit Data" onclick="Editdata('<?=$row['id_driver']?>', '<?=$row['driver_id']?>','<?=$row['first_name']?>', '<?=$row['last_name']?>', '<?=$row['gender']?>', '<?=$row['phone']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>

							<button class="btn btn-success" title="Lihat Data" onclick="Lihatdata('<?=$row['id_driver']?>', '<?=$row['driver_id']?>', '<?=$row['first_name']?>', '<?=$row['last_name']?>', '<?=$row['gender']?>', '<?=$row['phone']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
					
							<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_driver']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_driver" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Driver id</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="driver_id" id="driver_id" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">First name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="first_name" id="first_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Last name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="last_name" id="last_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Gender</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="gender" id="gender" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Phone</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="phone" id="phone" class="form-control"/></div>
		  

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
	var id_driver = $('#id_driver').val(); 
	var driver_id = $('#driver_id').val(); 
	var first_name = $('#first_name').val(); 
	var last_name = $('#last_name').val();
	var gender = $('#gender').val();
	var phone = $('#phone').val();

	if(id_driver == '')
	{
		if(driver_id == "" || first_name == "" || last_name == "" || gender == "" || phone == "" )
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_driver:'', driver_id:driver_id, first_name:first_name, last_name:last_name, gender:gender, phone:phone, kode:'driver'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data driver berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_driver:id_driver, driver_id:driver_id, first_name:first_name, last_name:last_name, gender:gender, phone:phone,  kode:'driver'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data driver berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_driver){
	swal({
  title: "",
  text: "Yakin ingin menghapus data driver ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_driver:id_driver, kode:'del_driver'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data driver berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editdata(id_driver, driver_id, first_name, last_name, gender, phone){
	$('#id_driver').val(id_driver);
		$('#driver_id').val(driver_id);
	$('#first_name').val(first_name);
	$('#last_name').val(last_name);
	$('#gender').val(gender);
	$('#phone').val(phone);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatdata(id_driver, driver_id, first_name, last_name, gender, phone){
	$('#id_driver').val(id_driver);
	$('#driver_id').val(driver_id);
	$('#first_name').val(first_name);
	$('#last_name').val(last_name);
	$('#gender').val(gender);
	$('#phone').val(phone);
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
