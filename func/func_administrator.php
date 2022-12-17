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
		$clean = mysqli_real_escape_string($conn,trim($_POST["clean"]));
		$soil = mysqli_real_escape_string($conn,trim($_POST["soil"]));
		$stain = mysqli_real_escape_string($conn,trim($_POST["stain"]));
		$torn = mysqli_real_escape_string($conn,trim($_POST["torn"]));
		$tran_status = mysqli_real_escape_string($conn,trim($_POST["tran_status"]));
		$delivery_status = mysqli_real_escape_string($conn,trim($_POST["delivery_status"]));


		if($id_hotel_transaction == "")
		{
			$sql = ("INSERT INTO tb_hotel_transaction(train_code, train_date, clean, soil, stain, torn, tran_status, delivery_status) VALUES ('".$train_code."', '".$train_date."', '".$clean."', '".$soil."', '".$stain."', '".$torn."', '".$tran_status."', '".$delivery_status."')");
		}
		else
		{
			$sql = ("UPDATE tb_hotel_transaction SET train_code = '$train_code', train_date = '$train_date', clean = '$clean', soil = '$soil', stain = '$stain', torn = '$torn', tran_status = '$tran_status', delivery_status = '$delivery_status' WHERE id_hotel_transaction = '$id_hotel_transaction'");
		}
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}
	else if($kode == 'del_hotel_transaction')
	{
		$id_hotel_transaction = mysqli_real_escape_string($conn,trim($_POST["id_hotel_transaction"]));

		$sql = ("DELETE FROM tb_hotel_transaction WHERE id_hotel_transaction = '$id_hotel_transaction ");

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
	else if($kode == 'del_linen_receive')
	{
		$id_linen_receive = mysqli_real_escape_string($conn,trim($_POST["id_linen_receive"]));

		$sql = ("DELETE FROM tb_linen_receive WHERE id_linen_receive = '$id_linen_receive' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'linen_center') {
		$id_linen_center_detail = mysqli_real_escape_string($conn,trim($_POST["id_linen_center_detail"]));
		$code = mysqli_real_escape_string($conn,trim($_POST["code"]));
		$name = mysqli_real_escape_string($conn,trim($_POST["name"]));
		$address = mysqli_real_escape_string($conn,trim($_POST["address"]));
		$phone = mysqli_real_escape_string($conn,trim($_POST["phone"]));
		$email = mysqli_real_escape_string($conn,trim($_POST["email"]));
		$description = mysqli_real_escape_string($conn,trim($_POST["description"]));

		if($id_linen_center_detail == "")
		{
			$sql = ("INSERT INTO tb_linen_center_detail(code, name, address, phone, email, description) VALUES ('".$code."', '".$name."', '".$address."', '".$phone."', '".$email."', '".$description."')");
		}
		else
		{
			$sql = ("UPDATE tb_linen_center_detail SET code = '$code', name = '$name', address = '$address', phone = '$phone', email = '$email', description = '$description' WHERE id_linen_center_detail = '$id_linen_center_detail'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_linen_center')
	{
		$id_linen_center_detail = mysqli_real_escape_string($conn,trim($_POST["id_linen_center_detail"]));

		$sql = ("DELETE FROM tb_linen_center_detail WHERE id_linen_center_detail = '$id_linen_center_detail' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'template') {
		$id_template = mysqli_real_escape_string($conn,trim($_POST["id_template"]));
		$code = mysqli_real_escape_string($conn,trim($_POST["code"]));
		$template_name = mysqli_real_escape_string($conn,trim($_POST["template_name"]));
		$linen_code = mysqli_real_escape_string($conn,trim($_POST["linen_code"]));
		$linen_type = mysqli_real_escape_string($conn,trim($_POST["linen_type"]));
		$size = mysqli_real_escape_string($conn,trim($_POST["size"]));
		$color = mysqli_real_escape_string($conn,trim($_POST["color"]));
		$supplier = mysqli_real_escape_string($conn,trim($_POST["supplier"]));

		if($id_template == "")
		{
			$sql = ("INSERT INTO tb_template(code, template_name, linen_code, linen_type, size, color, supplier) VALUES ('".$code."', '".$template_name."', '".$linen_code."', '".$linen_type."', '".$size."', '".$color."', '".$supplier."')");
		}
		else
		{
			$sql = ("UPDATE tb_template SET code = '$code', template_name = '$template_name', linen_code = '$linen_code', linen_type = '$linen_type', size = '$size', color = '$color', supplier = '$supplier' WHERE id_template = '$id_template'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_template')
	{
		$id_template = mysqli_real_escape_string($conn,trim($_POST["id_template"]));

		$sql = ("DELETE FROM tb_template WHERE id_template = '$id_template' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'driver') {
		$id_driver = mysqli_real_escape_string($conn,trim($_POST["id_driver"]));
		$first_name = mysqli_real_escape_string($conn,trim($_POST["first_name"]));
		$last_name = mysqli_real_escape_string($conn,trim($_POST["last_name"]));
		$gender = mysqli_real_escape_string($conn,trim($_POST["gender"]));
		$phone = mysqli_real_escape_string($conn,trim($_POST["phone"]));

		if($id_driver == "")
		{
			$sql = ("INSERT INTO tb_driver(first_name, last_name, gender, phone) VALUES ('".$first_name."', '".$last_name."', '".$gender."', '".$phone."')");
		}
		else
		{
			$sql = ("UPDATE tb_driver SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', phone = '$phone' WHERE id_driver = '$id_driver'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_driver')
	{
		$id_driver = mysqli_real_escape_string($conn,trim($_POST["id_driver"]));

		$sql = ("DELETE FROM tb_driver WHERE id_driver = '$id_driver' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'hotel') {
		$id_hotel = mysqli_real_escape_string($conn,trim($_POST["id_hotel"]));
		$hotel_code = mysqli_real_escape_string($conn,trim($_POST["hotel_code"]));
		$hotel_name = mysqli_real_escape_string($conn,trim($_POST["hotel_name"]));
		$laundry_plant = mysqli_real_escape_string($conn,trim($_POST["laundry_plant"]));
		$contact_name = mysqli_real_escape_string($conn,trim($_POST["contact_name"]));
		$phone = mysqli_real_escape_string($conn,trim($_POST["phone"]));
		$email = mysqli_real_escape_string($conn,trim($_POST["email"]));

		if($id_hotel == "")
		{
			$sql = ("INSERT INTO tb_hotel(hotel_code, hotel_name, laundry_plant, contact_name, phone, email) VALUES ('".$hotel_code."', '".$hotel_name."', '".$laundry_plant."', '".$contact_name."', '".$phone."', '".$email."')");
		}
		else
		{
			$sql = ("UPDATE tb_hotel SET hotel_code = '$hotel_code', hotel_name = '$hotel_name', laundry_plant = '$laundry_plant', contact_name = '$contact_name', phone = '$phone', email = '$email' WHERE id_hotel = '$id_hotel'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_hotel')
	{
		$id_hotel = mysqli_real_escape_string($conn,trim($_POST["id_hotel"]));

		$sql = ("DELETE FROM tb_hotel WHERE id_hotel = '$id_hotel' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

	else if ($kode == 'linen') {
		$id_linen = mysqli_real_escape_string($conn,trim($_POST["id_linen"]));
		$tag_id = mysqli_real_escape_string($conn,trim($_POST["tag_id"]));
		$name = mysqli_real_escape_string($conn,trim($_POST["name"]));
		$size = mysqli_real_escape_string($conn,trim($_POST["size"]));
		$price = mysqli_real_escape_string($conn,trim($_POST["price"]));
		$hotel = mysqli_real_escape_string($conn,trim($_POST["hotel"]));
		$color = mysqli_real_escape_string($conn,trim($_POST["color"]));
		$linen_code = mysqli_real_escape_string($conn,trim($_POST["linen_code"]));
		$linen_type = mysqli_real_escape_string($conn,trim($_POST["linen_type"]));
		$template = mysqli_real_escape_string($conn,trim($_POST["template"]));
		$supplier = mysqli_real_escape_string($conn,trim($_POST["supplier"]));
		$linen_status = mysqli_real_escape_string($conn,trim($_POST["linen_status"]));

		if($id_linen == "")
		{
			$sql = ("INSERT INTO tb_linen(tag_id, name, size, price, hotel, color, linen_code, linen_type, template, supplier, linen_status) VALUES ('".$tag_id."', '".$name."', '".$size."', '".$price."', '".$hotel."', '".$color."', '".$linen_code."', '".$linen_type."', '".$template."', '".$supplier."', '".$linen_status."')");
		}
		else
		{
			$sql = ("UPDATE tb_linen SET tag_id = '$tag_id', name = '$name', size = '$size', price = '$price', hotel = '$hotel', color = '$color', linen_code = '$linen_code', linen_type = '$linen_type', template = '$template', supplier = '$supplier', linen_status = '$linen_status' WHERE id_linen = '$id_linen'");
		}
		
		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	
	}
	else if($kode == 'del_linen')
	{
		$id_linen = mysqli_real_escape_string($conn,trim($_POST["id_linen"]));

		$sql = ("DELETE FROM tb_linen WHERE id_linen = '$id_linen' ");

		$hasil = mysqli_query($conn, $sql);
		if($hasil){print "1";} else {print "0 $sql";}
	}

}
?>




