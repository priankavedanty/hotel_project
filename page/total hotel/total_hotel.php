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
          <h3 class="card-title"><b> DATA HOTEL </b></h3>

          <button class="btn btn-sm btn-primary" style="margin-top: 0px;" onclick="ShowAdd2()" ?<?php if($public_id_jabatan != 2){ print "disabled";}?>><i class="fa fa-plus-circle"></i> Tambah data </button>

        </div><br>
        <!-- /.box-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
		            <tr>
									<td >No</td>
									<td >Hotel code</td>
									<td >Hotel name</td>
									<td >Laundry plant</td>
									<td >Contact name</td>
									<td >Phone</td>
									<td >Email</td>
									<td >Action</td>
								</tr>
            </thead>
            <tbody>
            	<?php $no2=0;
									$query = "SELECT * from tb_hotel
									inner join tb_jabatan on tb_hotel.id_jabatan = tb_jabatan.id_jabatan
									where id_hotel order by id_hotel ASC";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)) 
							{

								$no2++;
								?><tr><?php
									?><td align="center"><?=$no2?></td><?php
									?><td><?=$row['hotel_code'] ?></td><?php
									?><td><?=$row['hotel_name'] ?></td><?php
									?><td><?=$row['laundry_plant'] ?></td><?php
									?><td><?=$row['contact_name'] ?></td><?php
									?><td><?=$row['phone']?></td><?php
									?><td><?=$row['email'] ?></td><?php
									
									?><td align="center"> 

											<button class="btn btn-warning" title="Edit Data" onclick="Editdata('<?=$row['id_hotel']?>', '<?=$row['hotel_code']?>', '<?=$row['hotel_name']?>', '<?=$row['laundry_plant']?>', '<?=$row['contact_name']?>', '<?=$row['phone']?>', '<?=$row['email']?>')" ><i class="fa fa-pencil" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>

											<button class="btn btn-success" title="Lihat Data" onclick="Lihatdata('<?=$row['id_hotel']?>', '<?=$row['hotel_code']?>', '<?=$row['hotel_name']?>', '<?=$row['laundry_plant']?>', '<?=$row['contact_name']?>', '<?=$row['phone']?>', '<?=$row['email']?>')" ><i class="fa fa-eye" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
									
											<button class="btn btn-danger" title="Hapus Data" onclick="Hapus('<?=$row['id_hotel']?>')"><i class="fa fa-trash" <?php if($public_id_jabatan != 2){ print "disabled";}?>></i></button>
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
	  
		  <input type="hidden" id="id_hotel" value="">
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hotel code</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="hotel_code" id="hotel_code" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Hotel name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="hotel_name" id="hotel_name" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Laundry plant</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="laundry_plant" id="laundry_plant" class="form-control"/></div>
		  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4" style="padding-top:8px;" align="right">Contact name</div>
		  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8" style="padding-top:3px;"><input type="text" name="contact_name" id="contact_name" class="form-control"/></div>
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
	var id_hotel = $('#id_hotel').val(); 
	var hotel_code = $('#hotel_code').val();
	var hotel_name = $('#hotel_name').val();
	var laundry_plant = $('#laundry_plant').val();
	var contact_name = $('#contact_name').val();
	var phone = $('#phone').val();
	var email = $('#email').val();

	if(id_hotel == '')
	{
		if(hotel_code == "" || hotel_name == "" || laundry_plant == "" || contact_name == "" || phone == "" || email == "" )
		{
			swal({icon: 'error',title: 'Oops...',text: "Mohon isi semua data!",})
		}
		else
		{	
			$.post("func/func_administrator.php",{token:token, id_hotel:'', hotel_code:hotel_code, hotel_name:hotel_name, laundry_plant:laundry_plant, contact_name:contact_name, phone:phone, email:email,kode:'hotel'},
			function(data)
			{
				if(data == 1)
				{				
					swal({text: "Data hotel berhasil disimpan!", icon: 'success',}).then((result) => {window.location.reload();})
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
			$.post("func/func_administrator.php",{token:token, id_hotel:id_hotel, hotel_code:hotel_code, hotel_name:hotel_name, laundry_plant:laundry_plant, contact_name:contact_name, phone:phone, email:email, kode:'hotel'},
		function(data){
			if(data == 1)
			{				
				swal({text: "Data hotel berhasil diperbaharui!",icon: 'success',}).then((result) => {window.location.reload();})
			}
			else
			{
				swal({type: 'error',title: 'Oops...',text: data,})
			}	
		});
	}
	
});

function Hapus(id_hotel){
	swal({
  title: "",
  text: "Yakin ingin menghapus data hotel ini?",
  icon: "info",
  dangerMode: true,
  buttons: ["Batal", "Hapus"],
	})
	.then(willConfirm => {
	  if (willConfirm) {
	    $.post("func/func_administrator.php",{token:token, id_hotel:id_hotel, kode:'del_hotel'},
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

function Editdata(id_hotel, hotel_code, hotel_name, laundry_plant, contact_name, phone, email){
	$('#id_hotel').val(id_hotel);
	$('#hotel_code').val(hotel_code);
	$('#hotel_name').val(hotel_name);
	$('#laundry_plant').val(laundry_plant);
	$('#contact_name').val(contact_name);
	$('#phone').val(phone);
	$('#email').val(email);
	$("#judul2").html("Edit Menu ");
	$("#Modal2").modal('show');
}

function Lihatdata(id_hotel, hotel_code, hotel_name, laundry_plant, contact_name, phone, email){
	$('#id_hotel').val(id_hotel);
	$('#hotel_code').val(hotel_code);
	$('#hotel_name').val(hotel_name);
	$('#laundry_plant').val(laundry_plant);
	$('#contact_name').val(contact_name);
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

