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
          <h3 class="card-title"><b> DATA LINEN </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ?<?php if($public_id_jabatan != 2){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Tag id</td>
									<td >Name</td>
									<td >Size</td>
									<td >Price</td>
									<td >Hotel</td>
									<td >Color</td>
                                    <td >Linen code</td>
									<td >Linen type</td>
									<td >Template</td>
									<td >Supplier</td>
									<td >Linen status</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no2=0;
									$query = "SELECT * from tb_linen
									inner join tb_jabatan on tb_linen.id_jabatan = tb_jabatan.id_jabatan
									where id_linen order by id_linen ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no2++;
								?><tr><?php
									?><td align="center"><?=$no2?></td><?php
									?><td><?=$row['tag_id'] ?></td><?php
									?><td><?=$row['name'] ?></td><?php
									?><td><?=$row['size'] ?></td><?php
									?><td><?=$row['price'] ?></td><?php
									?><td><?=$row['hotel'] ?></td><?php
									?><td><?=$row['color']?></td><?php
                                    ?><td><?=$row['linen_code'] ?></td><?php
									?><td><?=$row['linen_type'] ?></td><?php
									?><td><?=$row['template'] ?></td><?php
									?><td><?=$row['supplier'] ?></td><?php
									?><td><?=$row['linen_status']?></td><?php
									
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Editdata('<?=$row['id_linen']?>','<?=$row['tag_id']?>', '<?=$row['name']?>', '<?=$row['size']?>', '<?=$row['price']?>', '<?=$row['hotel']?>', '<?=$row['color']?>', '<?=$row['linen_code']?>', '<?=$row['linen_type']?>', '<?=$row['template']?>', '<?=$row['supplier']?>', '<?=$row['linen_status']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatdata('<?=$row['id_linen']?>','<?=$row['tag_id']?>', '<?=$row['name']?>', '<?=$row['size']?>', '<?=$row['price']?>', '<?=$row['hotel']?>', '<?=$row['color']?>', '<?=$row['linen_code']?>', '<?=$row['linen_type']?>', '<?=$row['template']?>', '<?=$row['supplier']?>', '<?=$row['linen_status']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
									
											<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_linen']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_linen" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Tag id</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="tag_id" id="tag_id" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="name" id="name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Size</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="size" id="size" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Price</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="price" id="price" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hotel</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="hotel" id="hotel" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Color</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="color" id="color" class="form-control"/></div>
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_code" id="linen_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Linen type</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="linen_type" id="linen_type" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Template</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="template" id="template" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Supplier</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="supplier" id="supplier" class="form-control"/></div>
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
	var id_linen = $('#id_linen').val(); 
	var tag_id = $('#tag_id').val(); 
	var name = $('#name').val();
	var size = $('#size').val();
	var price = $('#price').val();
	var hotel = $('#hotel').val();
	var color = $('#color').val();
    var linen_code = $('#linen_code').val();
	var linen_type = $('#linen_type').val();
	var template = $('#template').val();
	var supplier = $('#supplier').val();
	var linen_status = $('#linen_status').val();

	if(id_linen == '')
	{
		if(tag_id == "" || name == "" || size == "" || price == "" || hotel == "" || color == "" || linen_code == "" || linen_type == "" || template == "" || supplier == "" || linen_status == "" )
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_linen:'', tag_id:tag_id, name:name, size:size, price:price, hotel:hotel, color:color, linen_code:linen_code, linen_type:linen_type, template:template, supplier:supplier, linen_status:linen_status, kode:'linen'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data linen berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_linen:id_linen, tag_id:tag_id, name:name, size:size, price:price, hotel:hotel, color:color, linen_code:linen_code, linen_type:linen_type, template:template, supplier:supplier, linen_status:linen_status, kode:'linen'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data linen berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_linen){
	swal({
  title: "",
  text: "Yakin ingin menghapus data linen ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_linen:id_linen, kode:'del_linen'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data linen berhasil dihapus!",icon: 'success',}).then((result) => {window.location.reload();})
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

function Editdata(id_linen, tag_id, name, size, price, hotel, color, linen_code, linen_type, template, supplier, linen_status){
	$('#id_linen').val(id_linen);
	$('#tag_id').val(tag_id);
	$('#name').val(name);
	$('#size').val(size);
	$('#price').val(price);
	$('#hotel').val(hotel);
	$('#color').val(color);
    $('#linen_code').val(linen_code);
	$('#linen_type').val(linen_type);
	$('#template').val(template);
	$('#supplier').val(supplier);
	$('#linen_status').val(linen_status);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatdata(id_linen, tag_id, name, size, price, hotel, color, linen_code, linen_type, template, supplier, linen_status){
	$('#id_linen').val(id_linen);
	$('#tag_id').val(tag_id);
	$('#name').val(name);
	$('#size').val(size);
	$('#price').val(price);
	$('#hotel').val(hotel);
	$('#color').val(color);
    $('#linen_code').val(linen_code);
	$('#linen_type').val(linen_type);
	$('#template').val(template);
	$('#supplier').val(supplier);
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

