<?php
include '../class/ende.php';
include '../cs.php';



$token = mysqli_real_escape_string($conn,trim($_POST["token"]));
if($token == $_SESSION['rtoken'])
{
	$kode = mysqli_real_escape_string($conn,trim($_POST["kode"]));
	if($kode == 'hotel_transaction')
	{
		$id_hotel_transaction = mysqli_real_escape_string($conn,trim($_POST["id_hotel_transaction"]));
		$train_code = mysqli_real_escape_string($conn,trim($_POST["train_code"]));
		$train_date = mysqli_real_escape_string($conn,trim($_POST["train_date"]));
		$hotel_code = mysqli_real_escape_string($conn,trim($_POST["hotel_code"]));
		$hotel_name = mysqli_real_escape_string($conn,trim($_POST["hotel_name"]));
		$clean = mysqli_real_escape_string($conn,trim($_POST["clean"]));
		$soil = mysqli_real_escape_string($conn,trim($_POST["soil"]));
		$stain = mysqli_real_escape_string($conn,trim($_POST["stain"]));
		$torn = mysqli_real_escape_string($conn,trim($_POST["torn"]));
		$tran_status = mysqli_real_escape_string($conn,trim($_POST["tran_status"]));
		$delivery_status = mysqli_real_escape_string($conn,trim($_POST["delivery_status"]));


		if($id_hotel_transaction == "")
		{
			$sql = ("INSERT INTO tb_hotel_transaction(train_code, train_date, hotel_code, hotel_name, clean, soil, stain, torn, tran_status, delivery_status) VALUES ('".$train_code."', '".$train_date."', '".$hotel_code."', '".$hotel_name."', '".$clean."', '".$soil."', '".$stain."', '".$torn."', '".$tran_status."', '".$delivery_status."')");
		}
		else
		{
			$sql = ("UPDATE tb_hotel_transaction SET train_code = '$train_code', train_date = '$train_date', hotel_code = '$hotel_code', hotel_name = '$hotel_name', clean = '$clean', soil = '$soil', stain = '$stain', torn = '$torn', tran_status = '$tran_status', delivery_status = '$delivery_status' WHERE id_hotel_transaction = '$id_hotel_transaction'");
		}
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}
	else if($kode == 'del_hotel')
	{
		$id_hotel_transaction = mysqli_real_escape_string($conn,trim($_POST["id_hotel_transaction"]));

		$sql = ("DELETE FROM tb_hotel_transaction WHERE id_hotel_transaction = '$id_hotel_transaction' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'linen_receive') {
		$id_linen_receive = mysqli_real_escape_string($conn,trim($_POST["id_linen_receive"]));
		$packing_code = mysqli_real_escape_string($conn,trim($_POST["packing_code"]));
		$packing_date = mysqli_real_escape_string($conn,trim($_POST["packing_date"]));
		$packed_by = mysqli_real_escape_string($conn,trim($_POST["packed_by"]));
		$hotel_code = mysqli_real_escape_string($conn,trim($_POST["hotel_code"]));
		$hotel_name = mysqli_real_escape_string($conn,trim($_POST["hotel_name"]));
		$total = mysqli_real_escape_string($conn,trim($_POST["total"]));
		$status = mysqli_real_escape_string($conn,trim($_POST["status"]));

		if($id_linen_receive == "")
		{
			$sql = ("INSERT INTO tb_linen_receive(packing_code, packing_date, packed_by, hotel_code, hotel_name, total, status) VALUES ('".$packing_code."', '".$packing_date."', '".$packed_by."', '".$hotel_code."', '".$hotel_name."', '".$total."', '".$status."')");
		}
		else
		{
			$sql = ("UPDATE tb_linen_receive SET packing_code = '$packing_code', packing_date = '$packing_date', packed_by = '$packed_by', hotel_code = '$hotel_code', hotel_name = '$hotel_name', total = '$total', status = '$status' WHERE id_linen_receive = '$id_linen_receive'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_linen')
	{
		$id_linen_receive = mysqli_real_escape_string($conn,trim($_POST["id_linen_receive"]));

		$sql = ("DELETE FROM tb_linen_receive WHERE id_linen_receive = '$id_linen_receive' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'internal_transaction') {
		$id_internal_transaction = mysqli_real_escape_string($conn,trim($_POST["id_internal_transaction"]));
		$train_code = mysqli_real_escape_string($conn,trim($_POST["train_code"]));
		$train_date = mysqli_real_escape_string($conn,trim($_POST["train_date"]));
		$type = mysqli_real_escape_string($conn,trim($_POST["type"]));
		$laundry = mysqli_real_escape_string($conn,trim($_POST["laundry"]));
		$total = mysqli_real_escape_string($conn,trim($_POST["total"]));
		$status = mysqli_real_escape_string($conn,trim($_POST["status"]));

		if($id_internal_transaction == "")
		{
			$sql = ("INSERT INTO tb_internal_transaction(train_code, train_date, type, laundry, total, status) VALUES ('".$train_code."', '".$train_date."', '".$type."', '".$laundry."','".$total."', '".$status."')");
		}
		else
		{
			$sql = ("UPDATE tb_internal_transaction SET train_code = '$train_code', train_date = '$train_date', type = '$type', laundry = '$laundry', total = '$total', status = '$status' WHERE id_internal_transaction = '$id_internal_transaction'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_internal')
	{
		$id_internal_transaction = mysqli_real_escape_string($conn,trim($_POST["id_internal_transaction"]));

		$sql = ("DELETE FROM tb_internal_transaction WHERE id_internal_transaction = '$id_internal_transaction' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'laundry_plant') {
		$id_laundry_plant = mysqli_real_escape_string($conn,trim($_POST["id_laundry_plant"]));
		$name = mysqli_real_escape_string($conn,trim($_POST["name"]));
		$code = mysqli_real_escape_string($conn,trim($_POST["code"]));
		$phone = mysqli_real_escape_string($conn,trim($_POST["phone"]));
		$email = mysqli_real_escape_string($conn,trim($_POST["email"]));
		$linen_center = mysqli_real_escape_string($conn,trim($_POST["linen_center"]));

		if($id_laundry_plant == "")
		{
			$sql = ("INSERT INTO tb_laundry_plant(name, code, phone, email, linen_center, id_jabatan) VALUES ('".$name."', '".$code."', '".$phone."', '".$email."','".$linen_center."' )");
		}
		else
		{
			$sql = ("UPDATE tb_laundry_plant SET name = '$name', code = '$code', phone = '$phone', email = '$email', linen_center = '$linen_center' WHERE id_laundry_plant = '$id_laundry_plant'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_laundry')
	{
		$id_laundry_plant = mysqli_real_escape_string($conn,trim($_POST["id_laundry_plant"]));

		$sql = ("DELETE FROM tb_laundry_plant WHERE id_laundry_plant = '$id_laundry_plant' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'register_history') {
		$id_register_history = mysqli_real_escape_string($conn,trim($_POST["id_register_history"]));
		$register_date = mysqli_real_escape_string($conn,trim($_POST["register_date"]));
		$template_code = mysqli_real_escape_string($conn,trim($_POST["template_code"]));
		$template_name = mysqli_real_escape_string($conn,trim($_POST["template_name"]));
		$linen_type = mysqli_real_escape_string($conn,trim($_POST["linen_type"]));
		$total = mysqli_real_escape_string($conn,trim($_POST["total"]));


		if($id_register_history == "")
		{
			$sql = ("INSERT INTO tb_register_history(register_date, template_code, template_name, linen_type, total) VALUES ('".$register_date."', '".$template_code."', '".$template_name."', '".$linen_type."','".$total."' )");
		}
		else
		{
			$sql = ("UPDATE tb_register_history SET register_date = '$register_date', template_code = '$template_code', template_name = '$template_name', linen_type = '$linen_type', total = '$total' WHERE id_register_history = '$id_register_history'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_register_history')
	{
		$id_register_history = mysqli_real_escape_string($conn,trim($_POST["id_register_history"]));

		$sql = ("DELETE FROM tb_register_history WHERE id_register_history = '$id_register_history' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}
}
?>




