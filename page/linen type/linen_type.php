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
          <h3 class="card-title"><b> DATA LINEN TYPE </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ?<?php if($public_id_jabatan != 3){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Linen code</td>
									<td >Linen type</td>
									<td >Linen category</td>
									<td >Size</td>
									<td >Color</td>
									<td >Max cycle</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no2=0;
									$query = "SELECT * from tb_linen_type
									inner join tb_jabatan on tb_linen_type.id_jabatan = tb_jabatan.id_jabatan
									where id_type order by id_type ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no2++;
								?><tr><?php
									?><td align="center"><?=$no2?></td><?php
									?><td><?=$row['linen_code'] ?></td><?php
									?><td><?=$row['linen_type'] ?></td><?php
									?><td><?=$row['linen_category'] ?></td><?php
									?><td><?=$row['size'] ?></td><?php
									?><td><?=$row['color'] ?></td><?php
									?><td><?=$row['max_cycle'] ?></td><?php
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Editdata('<?=$row['id_type']?>', '<?=$row['linen_code']?>', '<?=$row['linen_type']?>', '<?=$row['linen_category']?>', '<?=$row['size']?>', '<?=$row['color']?>', '<?=$row['max_cycle']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatdata('<?=$row['id_type']?>', '<?=$row['linen_code']?>', '<?=$row['linen_type']?>', '<?=$row['linen_category']?>', '<?=$row['size']?>', '<?=$row['color']?>', '<?=$row['max_cycle']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 3 ){ print "disabled";}?>></i></button>
									
									<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_type']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
											
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
	  
		  <input type="hidden" id="id_type" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_code" id="linen_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen type</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_type" id="linen_type" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen category</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_category" id="linen_category" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Size</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="size" id="size" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Color</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="color" id="color" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Max cycle</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="max_cycle" id="max_cycle" class="form-control"/></div>
		  

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
	var id_type = $('#id_type').val(); 
	var linen_code = $('#linen_code').val();
	var linen_type = $('#linen_type').val(); 
	var linen_category = $('#linen_category').val();
	var size = $('#size').val(); 
	var color = $('#color').val(); 
	var max_cycle = $('#max_cycle').val(); 

	if(id_type == '')
	{
		if(linen_code == "" || linen_type == "" || linen_category == "" || size == "" || color == "" || max_cycle == "" )
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_type:'', linen_code:linen_code, linen_type:linen_type, linen_category:linen_category, size:size, color:color, max_cycle:max_cycle, kode:'type'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data linen type berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_type:id_type, linen_code:linen_code, linen_type:linen_type, linen_category:linen_category, size:size, color:color, max_cycle:max_cycle, kode:'type'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data linen type berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_type){
	swal({
  title: "",
  text: "Yakin ingin menghapus data linen type ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_type:id_type, kode:'del_type'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data linen type berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editdata(id_type, linen_code, linen_type, linen_category, size, color, max_cycle){
	$('#id_type').val(id_type);
	$('#linen_code').val(linen_code);
	$('#linen_type').val(linen_type);
	$('#linen_category').val(linen_category);
	$('#size').val(size);
	$('#color').val(color);
	$('#max_cycle').val(max_cycle);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatdata(id_type, linen_code, linen_type, linen_category, size, color, max_cycle){
	$('#id_type').val(id_type);
	$('#linen_code').val(linen_code);
	$('#linen_type').val(linen_type);
	$('#linen_category').val(linen_category);
	$('#size').val(size);
	$('#color').val(color);
	$('#max_cycle').val(max_cycle);
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

