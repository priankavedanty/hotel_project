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
          <h3 class="card-title"><b> DATA LINEN TO RECEIVE </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ?<?php if($public_id_jabatan != 2){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Packing code</td>
									<td >Packing date</td>
									<td >Packed by</td>
									<td >Hotel code</td>
									<td >Hotel name</td>
									<td >Total</td>
									<td >Status</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no2=0;
									$query = "SELECT * from tb_linen_receive
									inner join tb_jabatan on tb_linen_receive.id_jabatan = tb_jabatan.id_jabatan
									where id_linen_receive order by id_linen_receive ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no2++;
								?><tr><?php
									?><td align="center"><?=$no2?></td><?php
									?><td><?=$row['packing_code'] ?></td><?php
									?><td><?=$row['packing_date'] ?></td><?php
									?><td><?=$row['packed_by'] ?></td><?php
									?><td><?=$row['hotel_code'] ?></td><?php
									?><td><?=$row['hotel_name'] ?></td><?php
									?><td><?=$row['total']?></td><?php
									?><td><?=$row['status'] ?></td><?php
									
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Editlinen('<?=$row['id_linen_receive']?>','<?=$row['packing_code']?>', '<?=$row['packing_date']?>', '<?=$row['packed_by']?>', '<?=$row['hotel_code']?>', '<?=$row['hotel_name']?>', '<?=$row['total']?>', '<?=$row['status']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatlinen('<?=$row['id_linen_receive']?>','<?=$row['packing_code']?>', '<?=$row['packing_date']?>', '<?=$row['packed_by']?>', '<?=$row['hotel_code']?>', '<?=$row['hotel_name']?>', '<?=$row['total']?>', '<?=$row['status']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
									
											<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_linen_receive']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_linen_receive" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Packing code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="packing_code" id="packing_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Packing date</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="date" name="packing_date" id="packing_date" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Packed by</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="packed_by" id="packed_by" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hotel code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="hotel_code" id="hotel_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hotel name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="hotel_name" id="hotel_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Total</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="total" id="total" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Status</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="status" id="status" class="form-control"/></div>

		  

		 </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary" id="btn_save"><i class="fa fa-save"></i> Simpan</button>
	  </div>
	</div>

</div>
</div>

<div id="Modal3" class="modal fade" aria-hidden="true">
<div class="modal-dialog modal-md" >
	
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title" id="judul3"></h4>
	  </div>
	  <div class="modal-body row">
	  
		  <input type="hidden" id="id_linen_receive" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Packing code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="packing_code" id="packing_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Packing date</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="date" name="packing_date" id="packing_date" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Packed by</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="packed_by" id="packed_by" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hotel code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="hotel_code" id="hotel_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hotel name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="hotel_name" id="hotel_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Total</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="total" id="total" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Status</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="status" id="status" class="form-control"/></div>

		  

		 </div>
	</div>

</div>
</div>

<script type="text/javascript" class="init">
var token = document.querySelector("meta[property='rtoken']").getAttribute("content");

$('#btn_save').on('click', function (e) {
	var id_linen_receive = $('#id_linen_receive').val(); 
	var packing_code = $('#packing_code').val(); 
	var packing_date = $('#packing_date').val();
	var packed_by = $('#packed_by').val();
	var hotel_code = $('#hotel_code').val();
	var hotel_name = $('#hotel_name').val();
	var total = $('#total').val();
	var status = $('#status').val();

	if(id_linen_receive == '')
	{
		if(packing_code == "" || packing_date == "" || packed_by == "" || hotel_code == "" || hotel_name == "" || total == "" || status == "" )
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_linen_receive:'', packing_code:packing_code, packing_date:packing_date, packed_by:packed_by, hotel_code:hotel_code, hotel_name:hotel_name, total:total, status:status,kode:'linen_receive'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data linen receive berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_linen_receive:id_linen_receive, packing_code:packing_code, packing_date:packing_date, packed_by:packed_by, hotel_code:hotel_code, hotel_name:hotel_name, total:total, status:status, kode:'linen_receive'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data linen receive berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_linen_receive){
	swal({
  title: "",
  text: "Yakin ingin menghapus data linen receive ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_linen_receive:id_linen_receive, kode:'del_linen'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data linen receive berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editlinen(id_linen_receive, packing_code, packing_date, packed_by, hotel_code, hotel_name, total, status){
	$('#id_linen_receive').val(id_linen_receive);
	$('#packing_code').val(packing_code);
	$('#packing_date').val(packing_date);
	$('#packed_by').val(packed_by);
	$('#hotel_code').val(hotel_code);
	$('#hotel_name').val(hotel_name);
	$('#total').val(total);
	$('#status').val(status);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatlinen(id_linen_receive, packing_code, packing_date, packed_by, hotel_code, hotel_name, total, status){
	$('#id_linen_receive').val(id_linen_receive);
	$('#packing_code').val(packing_code);
	$('#packing_date').val(packing_date);
	$('#packed_by').val(packed_by);
	$('#hotel_code').val(hotel_code);
	$('#hotel_name').val(hotel_name);
	$('#total').val(total);
	$('#status').val(status);
	$("#judul3").html("Lihat Menu ");
	$("#Modal3").modal('show');
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

