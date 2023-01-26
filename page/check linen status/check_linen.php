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
          <h3 class="card-title"><b> DATA CHECK LINEN STATUS </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ?<?php if($public_id_jabatan != 3 || $public_id_jabatan != 5){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Tag id</td>
									<td >Hotel name</td>
									<td >Place</td>
									<td >Linen type</td>
									<td >Size</td>
									<td >Current wash cycle</td>
									<td >Linen belong LC</td>
									<td >Linen status</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no2=0;
									$query = "SELECT * from tb_check_linen_status
									inner join tb_jabatan on tb_check_linen_status.id_jabatan = tb_jabatan.id_jabatan
									where id_check_linen order by id_check_linen ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no2++;
								?><tr><?php
									?><td align="center"><?=$no2?></td><?php
									?><td><?=$row['tag_id'] ?></td><?php
									?><td><?=$row['hotel_name'] ?></td><?php
									?><td><?=$row['place'] ?></td><?php
									?><td><?=$row['linen_type'] ?></td><?php
									?><td><?=$row['size'] ?></td><?php
									?><td><?=$row['current_wash_cycle']?></td><?php
									?><td><?=$row['linen_belong_LC'] ?></td><?php
									?><td><?=$row['linen_status'] ?></td><?php
									?><td align="center"> 

										<button class="btn btn-warning" title="Edit Data" onclick="Editlinen('<?=$row['id_check_linen']?>', '<?=$row['tag_id']?>', '<?=$row['hotel_name']?>', '<?=$row['place']?>', '<?=$row['linen_type']?>', '<?=$row['size']?>', '<?=$row['current_wash_cycle']?>', '<?=$row['linen_belong_LC']?>', '<?=$row['linen_status']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 3 || $public_id_jabatan != 5){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatlinen('<?=$row['id_check_linen']?>', '<?=$row['tag_id']?>', '<?=$row['hotel_name']?>', '<?=$row['place']?>', '<?=$row['linen_type']?>', '<?=$row['size']?>', '<?=$row['current_wash_cycle']?>', '<?=$row['linen_belong_LC']?>', '<?=$row['linen_status']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 3 || $public_id_jabatan != 5){ print "disabled";}?>></i></button>
									
									<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_check_linen']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 3){ print "disabled";}?>></i></button>
											
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
	  
		  <input type="hidden" id="id_check_linen" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Tag id</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="tag_id" id="tag_id" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hotel name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="hotel_name" id="hotel_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Place</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="place" id="place" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen type</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_type" id="linen_type" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Size</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="size" id="size" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Current wash cycle</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="current_wash_cycle" id="current_wash_cycle" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen belong LC</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_belong_LC" id="linen_belong_LC" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen status</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_status" id="linen_status" class="form-control"/></div>

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
	var id_check_linen = $('#id_check_linen').val(); 
	var tag_id = $('#tag_id').val();
	var hotel_name = $('#hotel_name').val(); 
	var place = $('#place').val();
	var linen_type = $('#linen_type').val();
	var size = $('#size').val();
	var current_wash_cycle = $('#current_wash_cycle').val();
	var linen_belong_LC = $('#linen_belong_LC').val();
	var linen_status = $('#linen_status').val();

	if(id_check_linen == '')
	{
		if(tag_id == "" || hotel_name == "" || place == "" || linen_type == ""|| size == "" || current_wash_cycle == "" || linen_belong_LC == "" || linen_status == "" )
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_check_linen:'', tag_id:tag_id, hotel_name:hotel_name, place:place, linen_type:linen_type, size:size, current_wash_cycle:current_wash_cycle, linen_belong_LC:linen_belong_LC, linen_status:linen_status, kode:'check_linen'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data check linen berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_check_linen:id_check_linen, tag_id:tag_id, hotel_name:hotel_name, place:place, linen_type:linen_type, size:size, current_wash_cycle:current_wash_cycle, linen_belong_LC:linen_belong_LC, linen_status:linen_status, kode:'check_linen'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data check linen berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_check_linen){
	swal({
  title: "",
  text: "Yakin ingin menghapus data hotel ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_check_linen:id_check_linen, kode:'del_linen_status'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data hotel berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editlinen(id_check_linen, tag_id, hotel_name, place, linen_type, size, current_wash_cycle, linen_belong_LC, linen_status){
	$('#id_check_linen').val(id_check_linen);
	$('#tag_id').val(tag_id);
	$('#hotel_name').val(hotel_name);
	$('#place').val(place);
	$('#linen_type').val(linen_type);
	$('#size').val(size);
	$('#current_wash_cycle').val(current_wash_cycle);
	$('#linen_belong_LC').val(linen_belong_LC);
	$('#linen_status').val(linen_status);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatlinen(id_check_linen, tag_id, hotel_name, place, linen_type, size, current_wash_cycle, linen_belong_LC, linen_status){
	$('#id_check_linen').val(id_check_linen);
	$('#tag_id').val(tag_id);
	$('#hotel_name').val(hotel_name);
	$('#place').val(place);
	$('#linen_type').val(linen_type);
	$('#size').val(size);
	$('#current_wash_cycle').val(current_wash_cycle);
	$('#linen_belong_LC').val(linen_belong_LC);
	$('#linen_status').val(linen_status);
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

