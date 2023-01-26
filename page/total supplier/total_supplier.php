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
          <h3 class="card-title"><b> DATA SUPPLIER </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
						<td >No</td>
						<td >Supplier code</td>
						<td >Supplier name</td>
						<td >Manufacture</td>
						<td >Phone</td>
						<td >Email</td>
						<td >Action</td>
					</tr>
            </thead>
            <tbody>
			<?php $no2=0;
					$query = "SELECT * from tb_supplier
					inner join tb_jabatan on tb_supplier.id_jabatan = tb_jabatan.id_jabatan
					where id_supplier order by id_supplier ASC";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($result)) 
			{

				$no2++;
				?><tr><?php
					?><td align="center"><?=$no2?></td><?php
					?><td><?=$row['code_supplier'] ?></td><?php
					?><td><?=$row['name_supplier'] ?></td><?php
					?><td><?=$row['manufacture'] ?></td><?php
					?><td><?=$row['phone'] ?></td><?php
					?><td><?=$row['email'] ?></td><?php
					
					?><td align="center"> 

							<button class="btn btn-warning" title="Edit Data" onclick="Editdata('<?=$row['id_supplier']?>', '<?=$row['code_supplier']?>','<?=$row['name_supplier']?>', '<?=$row['manufacture']?>', '<?=$row['phone']?>', '<?=$row['email']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>

							<button class="btn btn-success" title="Lihat Data" onclick="Lihatdata('<?=$row['id_supplier']?>', '<?=$row['code_supplier']?>', '<?=$row['name_supplier']?>', '<?=$row['manufacture']?>', '<?=$row['phone']?>', '<?=$row['email']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
					
							<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_supplier']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_supplier" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Supplier code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="code_supplier" id="code_supplier" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Supplier name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="name_supplier" id="name_supplier" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Manufacture</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="manufacture" id="manufacture" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Phone</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="phone" id="phone" class="form-control"/></div>
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
	var id_supplier = $('#id_supplier').val(); 
	var code_supplier = $('#code_supplier').val(); 
	var name_supplier = $('#name_supplier').val(); 
	var manufacture = $('#manufacture').val();
	var phone = $('#phone').val();
	var email = $('#email').val();

	if(id_supplier == '')
	{
		if(code_supplier == "" || name_supplier == "" || manufacture == "" || phone == "" || email == "")
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_supplier:'', code_supplier:code_supplier, name_supplier:name_supplier, manufacture:manufacture, phone:phone, email:email, kode:'supplier'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data supplier berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_supplier:id_supplier, code_supplier:code_supplier, name_supplier:name_supplier, manufacture:manufacture, phone:phone, email:email,   kode:'supplier'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data supplier berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_supplier){
	swal({
  title: "",
  text: "Yakin ingin menghapus data supplier ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_supplier:id_supplier, kode:'del_supplier'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data supplier berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editdata(id_supplier, code_supplier, name_supplier, manufacture, phone, email){
	$('#id_supplier').val(id_supplier);
		$('#code_supplier').val(code_supplier);
	$('#name_supplier').val(name_supplier);
	$('#manufacture').val(manufacture);
	$('#phone').val(phone);
	$('#email').val(email);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatdata(id_supplier, code_supplier, name_supplier, manufacture, phone, email){
	$('#id_supplier').val(id_supplier);
	$('#code_supplier').val(code_supplier);
	$('#name_supplier').val(name_supplier);
	$('#manufacture').val(manufacture);
	$('#phone').val(phone);
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
