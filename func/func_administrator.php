<?php
include '../class/ende.php';
include '../cs.php';

$token = mysqli_real_escape_string($conn, trim($_POST["token"]));
if ($token == $_SESSION['rtoken']) {
    $kode = mysqli_real_escape_string($conn, trim($_POST["kode"]));

    if ($kode == 'hotel_transaction') {
        $id_hotel_transaction = mysqli_real_escape_string($conn, trim($_POST["id_hotel_transaction"]));
        $train_code = mysqli_real_escape_string($conn, trim($_POST["train_code"]));
        $train_date = mysqli_real_escape_string($conn, trim($_POST["train_date"]));
        $clean = mysqli_real_escape_string($conn, trim($_POST["clean"]));
        $soil = mysqli_real_escape_string($conn, trim($_POST["soil"]));
        $stain = mysqli_real_escape_string($conn, trim($_POST["stain"]));
        $torn = mysqli_real_escape_string($conn, trim($_POST["torn"]));
        $tran_status = mysqli_real_escape_string($conn, trim($_POST["tran_status"]));
        $delivery_status = mysqli_real_escape_string($conn, trim($_POST["delivery_status"]));


        if ($id_hotel_transaction == "") {
            $sql = ("INSERT INTO tb_hotel_transaction(id_jabatan, train_code, train_date, clean, soil, stain, torn, tran_status, delivery_status) VALUES ('" . $public_id_jabatan . "', '" . $train_code . "', '" . $train_date . "', '" . $clean . "', '" . $soil . "', '" . $stain . "', '" . $torn . "', '" . $tran_status . "', '" . $delivery_status . "')");
        } else {
            $sql = ("UPDATE tb_hotel_transaction SET train_code = '$train_code', train_date = '$train_date', clean = '$clean', soil = '$soil', stain = '$stain', torn = '$torn', tran_status = '$tran_status', delivery_status = '$delivery_status' WHERE id_hotel_transaction = '$id_hotel_transaction'");
        }
        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_hotel_transaction') {
        $id_hotel_transaction = mysqli_real_escape_string($conn, trim($_POST["id_hotel_transaction"]));

        $sql = ("DELETE FROM tb_hotel_transaction WHERE id_hotel_transaction = '$id_hotel_transaction' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } if ($kode == 'hotel_transaction2') {
        $id_hotel_transaction = mysqli_real_escape_string($conn, trim($_POST["id_hotel_transaction"]));
        $train_code = mysqli_real_escape_string($conn, trim($_POST["train_code"]));
        $train_date = mysqli_real_escape_string($conn, trim($_POST["train_date"]));
        $hotel_code = mysqli_real_escape_string($conn, trim($_POST["hotel_code"]));
        $hotel_name = mysqli_real_escape_string($conn, trim($_POST["hotel_name"]));
        $clean = mysqli_real_escape_string($conn, trim($_POST["clean"]));
        $soil = mysqli_real_escape_string($conn, trim($_POST["soil"]));
        $stain = mysqli_real_escape_string($conn, trim($_POST["stain"]));
        $torn = mysqli_real_escape_string($conn, trim($_POST["torn"]));
        $tran_status = mysqli_real_escape_string($conn, trim($_POST["tran_status"]));
        $delivery_status = mysqli_real_escape_string($conn, trim($_POST["delivery_status"]));


        if ($id_hotel_transaction == "") {
            $sql = ("INSERT INTO tb_hotel_transaction(id_jabatan, train_code, train_date, hotel_code, hotel_name, clean, soil, stain, torn, tran_status, delivery_status) VALUES ('" . $public_id_jabatan . "', '" . $train_code . "', '" . $train_date . "', '" . $hotel_code . "', '" . $hotel_name . "', '" . $clean . "', '" . $soil . "', '" . $stain . "', '" . $torn . "', '" . $tran_status . "', '" . $delivery_status . "')");
        } else {
            $sql = ("UPDATE tb_hotel_transaction SET train_code = '$train_code', train_date = '$train_date', hotel_code = '$hotel_code', hotel_name = '$hotel_name', clean = '$clean', soil = '$soil', stain = '$stain', torn = '$torn', tran_status = '$tran_status', delivery_status = '$delivery_status' WHERE id_hotel_transaction = '$id_hotel_transaction'");
        }
        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_hotel_transaction2') {
        $id_hotel_transaction = mysqli_real_escape_string($conn, trim($_POST["id_hotel_transaction"]));

        $sql = ("DELETE FROM tb_hotel_transaction WHERE id_hotel_transaction = '$id_hotel_transaction' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
        
    } else if ($kode == 'linen_receive') {
        $id_linen_receive = mysqli_real_escape_string($conn, trim($_POST["id_linen_receive"]));
        $packing_code = mysqli_real_escape_string($conn, trim($_POST["packing_code"]));
        $packing_date = mysqli_real_escape_string($conn, trim($_POST["packing_date"]));
        $packed_by = mysqli_real_escape_string($conn, trim($_POST["packed_by"]));
        $hotel_code = mysqli_real_escape_string($conn, trim($_POST["hotel_code"]));
        $hotel_name = mysqli_real_escape_string($conn, trim($_POST["hotel_name"]));
        $total = mysqli_real_escape_string($conn, trim($_POST["total"]));
        $status = mysqli_real_escape_string($conn, trim($_POST["status"]));

        if ($id_linen_receive == "") {
            $sql = ("INSERT INTO tb_linen_receive(id_jabatan, packing_code, packing_date, packed_by, hotel_code, hotel_name, total, status) VALUES ('" . $public_id_jabatan . "', '" . $packing_code . "', '" . $packing_date . "', '" . $packed_by . "', '" . $hotel_code . "', '" . $hotel_name . "', '" . $total . "', '" . $status . "')");
        } else {
            $sql = ("UPDATE tb_linen_receive SET packing_code = '$packing_code', packing_date = '$packing_date', packed_by = '$packed_by', hotel_code = '$hotel_code', hotel_name = '$hotel_name', total = '$total', status = '$status' WHERE id_linen_receive = '$id_linen_receive'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_linen_receive') {
        $id_linen_receive = mysqli_real_escape_string($conn, trim($_POST["id_linen_receive"]));

        $sql = ("DELETE FROM tb_linen_receive WHERE id_linen_receive = '$id_linen_receive' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'linen_center') {
        $id_linen_center_detail = mysqli_real_escape_string($conn, trim($_POST["id_linen_center_detail"]));
        $code = mysqli_real_escape_string($conn, trim($_POST["code"]));
        $name = mysqli_real_escape_string($conn, trim($_POST["name"]));
        $address = mysqli_real_escape_string($conn, trim($_POST["address"]));
        $phone = mysqli_real_escape_string($conn, trim($_POST["phone"]));
        $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
        $description = mysqli_real_escape_string($conn, trim($_POST["description"]));

        if ($id_linen_center_detail == "") {
            $sql = ("INSERT INTO tb_linen_center_detail(id_jabatan, code, name, address, phone, email, description) VALUES ('" . $public_id_jabatan . "', '" . $code . "', '" . $name . "', '" . $address . "', '" . $phone . "', '" . $email . "', '" . $description . "')");
        } else {
            $sql = ("UPDATE tb_linen_center_detail SET code = '$code', name = '$name', address = '$address', phone = '$phone', email = '$email', description = '$description' WHERE id_linen_center_detail = '$id_linen_center_detail'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_linen_center') {
        $id_linen_center_detail = mysqli_real_escape_string($conn, trim($_POST["id_linen_center_detail"]));

        $sql = ("DELETE FROM tb_linen_center_detail WHERE id_linen_center_detail = '$id_linen_center_detail' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } else if ($kode == 'internal_transaction') {
        $id_internal_transaction = mysqli_real_escape_string($conn, trim($_POST["id_internal_transaction"]));
        $train_code = mysqli_real_escape_string($conn, trim($_POST["train_code"]));
        $train_date = mysqli_real_escape_string($conn, trim($_POST["train_date"]));
        $delivery_type = mysqli_real_escape_string($conn, trim($_POST["delivery_type"]));
        $laundry = mysqli_real_escape_string($conn, trim($_POST["laundry"]));
        $total = mysqli_real_escape_string($conn, trim($_POST["total"]));
        $delivery_status = mysqli_real_escape_string($conn, trim($_POST["delivery_status"]));

        if ($id_internal_transaction == "") {
            $sql = ("INSERT INTO tb_internal_transaction(id_jabatan, train_code, train_date, delivery_type, laundry, total, delivery_status) VALUES (
                '" . $public_id_jabatan . "', 
                '" . $train_code . "', 
                '" . $train_date . "', 
                '" . $delivery_type . "', 
                '" . $laundry . "',
                '" . $total . "', 
                '" . $delivery_status . "')");
        } else {
            $sql = ("UPDATE tb_internal_transaction SET train_code = '$train_code', train_date = '$train_date', delivery_type = '$delivery_type', laundry = '$laundry', total = '$total', delivery_status = '$delivery_status' WHERE id_internal_transaction = '$id_internal_transaction'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_internal') {

        $id_internal_transaction = mysqli_real_escape_string($conn, trim($_POST["id_internal_transaction"]));

        $sql = ("DELETE FROM tb_internal_transaction WHERE id_internal_transaction = '$id_internal_transaction' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } else if ($kode == 'template') {
        $id_template = mysqli_real_escape_string($conn, trim($_POST["id_template"]));
        $code = mysqli_real_escape_string($conn, trim($_POST["code"]));
        $template_name = mysqli_real_escape_string($conn, trim($_POST["template_name"]));
        $linen_code = mysqli_real_escape_string($conn, trim($_POST["linen_code"]));
        $linen_type = mysqli_real_escape_string($conn, trim($_POST["linen_type"]));
        $size = mysqli_real_escape_string($conn, trim($_POST["size"]));
        $color = mysqli_real_escape_string($conn, trim($_POST["color"]));
        $supplier = mysqli_real_escape_string($conn, trim($_POST["supplier"]));

        if ($id_template == "") {
            $sql = ("INSERT INTO tb_template(code, template_name, linen_code, linen_type, size, color, supplier) VALUES ('" . $public_id_jabatan . "', '" . $code . "', '" . $template_name . "', '" . $linen_code . "', '" . $linen_type . "', '" . $size . "', '" . $color . "', '" . $supplier . "')");
        } else {
            $sql = ("UPDATE tb_template SET code = '$code', template_name = '$template_name', linen_code = '$linen_code', linen_type = '$linen_type', size = '$size', color = '$color', supplier = '$supplier' WHERE id_template = '$id_template'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_template') {
        $id_template = mysqli_real_escape_string($conn, trim($_POST["id_template"]));

        $sql = ("DELETE FROM tb_template WHERE id_template = '$id_template' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'driver') {
        $id_driver = mysqli_real_escape_string($conn, trim($_POST["id_driver"]));
        $driver_id = mysqli_real_escape_string($conn, trim($_POST["driver_id"]));
        $first_name = mysqli_real_escape_string($conn, trim($_POST["first_name"]));
        $last_name = mysqli_real_escape_string($conn, trim($_POST["last_name"]));
        $gender = mysqli_real_escape_string($conn, trim($_POST["gender"]));
        $phone = mysqli_real_escape_string($conn, trim($_POST["phone"]));

        if ($id_driver == "") {
            $sql = ("INSERT INTO tb_driver(id_jabatan, driver_id, first_name, last_name, gender, phone) VALUES ('" . $public_id_jabatan . "', '" . $driver_id . "', '" . $first_name . "', '" . $last_name . "', '" . $gender . "', '" . $phone . "')");
        }else {
            $sql = ("UPDATE tb_driver SET  driver_id = '$driver_id', first_name = '$first_name', last_name = '$last_name', gender = '$gender', phone = '$phone' WHERE id_driver = '$id_driver'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    }  else if ($kode == 'del_driver') {
        $id_driver = mysqli_real_escape_string($conn, trim($_POST["id_driver"]));

        $sql = ("DELETE FROM tb_driver WHERE id_driver = '$id_driver' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'hotel') {
        $id_hotel = mysqli_real_escape_string($conn, trim($_POST["id_hotel"]));
        $hotel_code = mysqli_real_escape_string($conn, trim($_POST["hotel_code"]));
        $hotel_name = mysqli_real_escape_string($conn, trim($_POST["hotel_name"]));
        $laundry_plant = mysqli_real_escape_string($conn, trim($_POST["laundry_plant"]));
        $contact_name = mysqli_real_escape_string($conn, trim($_POST["contact_name"]));
        $phone = mysqli_real_escape_string($conn, trim($_POST["phone"]));
        $email = mysqli_real_escape_string($conn, trim($_POST["email"]));

        if ($id_hotel == "") {
            $sql = ("INSERT INTO tb_hotel(id_jabatan, hotel_code, hotel_name, laundry_plant, contact_name, phone, email) VALUES ('" . $public_id_jabatan . "', '" . $hotel_code . "', '" . $hotel_name . "', '" . $laundry_plant . "', '" . $contact_name . "', '" . $phone . "', '" . $email . "')");
        } else {
            $sql = ("UPDATE tb_hotel SET hotel_code = '$hotel_code', hotel_name = '$hotel_name', laundry_plant = '$laundry_plant', contact_name = '$contact_name', phone = '$phone', email = '$email' WHERE id_hotel = '$id_hotel'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } else if ($kode == 'del_hotel') {

        $id_hotel = mysqli_real_escape_string($conn, trim($_POST["id_hotel"]));

        $sql = ("DELETE FROM tb_hotel WHERE id_hotel = '$id_hotel' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'laundry_plant') {
        $id_laundry_plant = mysqli_real_escape_string($conn, trim($_POST["id_laundry_plant"]));
        $name = mysqli_real_escape_string($conn, trim($_POST["name"]));
        $code = mysqli_real_escape_string($conn, trim($_POST["code"]));
        $phone = mysqli_real_escape_string($conn, trim($_POST["phone"]));
        $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
        $linen_center = mysqli_real_escape_string($conn, trim($_POST["linen_center"]));

        if ($id_laundry_plant == "") {
            $sql = ("INSERT INTO tb_laundry_plant(id_jabatan, name, code, phone, email, linen_center, id_jabatan) VALUES ('" . $public_id_jabatan . "', '" . $name . "', '" . $code . "', '" . $phone . "', '" . $email . "','" . $linen_center . "' )");
        } else {
            $sql = ("UPDATE tb_laundry_plant SET name = '$name', code = '$code', phone = '$phone', email = '$email', linen_center = '$linen_center' WHERE id_laundry_plant = '$id_laundry_plant'");
        }
        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_laundry') {
        $id_laundry_plant = mysqli_real_escape_string($conn, trim($_POST["id_laundry_plant"]));

        $sql = ("DELETE FROM tb_laundry_plant WHERE id_laundry_plant = '$id_laundry_plant' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'linen') {
        $id_linen = mysqli_real_escape_string($conn, trim($_POST["id_linen"]));
        $tag_id = mysqli_real_escape_string($conn, trim($_POST["tag_id"]));
        $linen_name = mysqli_real_escape_string($conn, trim($_POST["linen_name"]));
        $size = mysqli_real_escape_string($conn, trim($_POST["size"]));
        $hotel_name = mysqli_real_escape_string($conn, trim($_POST["hotel_name"]));
        $color = mysqli_real_escape_string($conn, trim($_POST["color"]));
        $linen_code = mysqli_real_escape_string($conn, trim($_POST["linen_code"]));
        $linen_type = mysqli_real_escape_string($conn, trim($_POST["linen_type"]));
        $template = mysqli_real_escape_string($conn, trim($_POST["template"]));
        $supplier = mysqli_real_escape_string($conn, trim($_POST["supplier"]));
        $linen_status = mysqli_real_escape_string($conn, trim($_POST["linen_status"]));

        if ($id_linen == "") {
            $sql = ("INSERT INTO tb_linen(id_jabatan, tag_id, linen_name, size, hotel_name, color, linen_code, linen_type, template, supplier, linen_status) VALUES ('" . $public_id_jabatan . "','" . $tag_id . "', '" . $linen_name . "', '" . $size . "',  '" . $hotel_name . "', '" . $color . "', '" . $linen_code . "', '" . $linen_type . "', '" . $template . "', '" . $supplier . "', '" . $linen_status . "')");
        } else {
            $sql = ("UPDATE tb_linen SET tag_id = '$tag_id', linen_name = '$linen_name', size = '$size', hotel_name = '$hotel_name', color = '$color', linen_code = '$linen_code', linen_type = '$linen_type', template = '$template', supplier = '$supplier', linen_status = '$linen_status' WHERE id_linen = '$id_linen'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_linen') {
        $id_linen = mysqli_real_escape_string($conn, trim($_POST["id_linen"]));

        $sql = ("DELETE FROM tb_linen WHERE id_linen = '$id_linen' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } else if ($kode == 'register_history') {
        $id_register_history = mysqli_real_escape_string($conn, trim($_POST["id_register_history"]));
        $register_date = mysqli_real_escape_string($conn, trim($_POST["register_date"]));
        $template_code = mysqli_real_escape_string($conn, trim($_POST["template_code"]));
        $template_name = mysqli_real_escape_string($conn, trim($_POST["template_name"]));
        $linen_type = mysqli_real_escape_string($conn, trim($_POST["linen_type"]));
        $total = mysqli_real_escape_string($conn, trim($_POST["total"]));


        if ($id_register_history == "") {
            $sql = ("INSERT INTO tb_register_history(id_jabatan, register_date, template_code, template_name, linen_type, total) VALUES ('" . $public_id_jabatan . "', '" . $register_date . "', '" . $template_code . "', '" . $template_name . "', '" . $linen_type . "','" . $total . "' )");
        } else {
            $sql = ("UPDATE tb_register_history SET register_date = '$register_date', template_code = '$template_code', template_name = '$template_name', linen_type = '$linen_type', total = '$total' WHERE id_register_history = '$id_register_history'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'del_history') {
        $id_register_history = mysqli_real_escape_string($conn, trim($_POST["id_register_history"]));

        $sql = ("DELETE FROM tb_register_history WHERE id_register_history = '$id_register_history' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    }else if ($kode == 'check_linen') {
        $id_check_linen = mysqli_real_escape_string($conn, trim($_POST["id_check_linen"]));
        $tag_id = mysqli_real_escape_string($conn, trim($_POST["tag_id"]));
        $hotel_name = mysqli_real_escape_string($conn, trim($_POST["hotel_name"]));
        $place = mysqli_real_escape_string($conn, trim($_POST["place"]));
        $linen_type = mysqli_real_escape_string($conn, trim($_POST["linen_type"]));
        $size = mysqli_real_escape_string($conn, trim($_POST["size"]));
        $current_wash_cycle = mysqli_real_escape_string($conn, trim($_POST["current_wash_cycle"]));
        $linen_belong_LC = mysqli_real_escape_string($conn, trim($_POST["linen_belong_LC"]));
        $linen_status = mysqli_real_escape_string($conn, trim($_POST["linen_status"]));

        if ($id_check_linen == "") {
            $sql = ("INSERT INTO tb_check_linen_status(tag_id, id_jabatan, hotel_name, place, linen_type, size, current_wash_cycle, linen_belong_LC, linen_status) 
                VALUES ('" . $tag_id . "',
                    '" . $public_id_jabatan . "',
                    '" . $hotel_name . "', 
                    '" . $place . "', 
                    '" . $linen_type . "', 
                    '" . $size . "',
                    '" . $current_wash_cycle . "', 
                    '" . $linen_belong_LC . "', 
                    '" . $linen_status . "')");
        } else {
            $sql = ("UPDATE tb_check_linen_status SET 
                tag_id = '$tag_id', 
                hotel_name = '$hotel_name', 
                place = '$place', 
                linen_type = '$linen_type', 
                size = '$size', 
                current_wash_cycle = '$current_wash_cycle', 
                linen_belong_LC = '$linen_belong_LC', 
                linen_status = '$linen_status' WHERE id_check_linen = '$id_check_linen'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        } 
    }else if ($kode == 'del_linen_status') {
        $id_check_linen = mysqli_real_escape_string($conn, trim($_POST["id_check_linen"]));

        $sql = ("DELETE FROM tb_check_linen_status WHERE id_check_linen = '$id_check_linen' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    }  else if ($kode == 'clean_linen') {
        $id_clean_linen = mysqli_real_escape_string($conn, trim($_POST["id_clean_linen"]));
        $tag_id = mysqli_real_escape_string($conn, trim($_POST["tag_id"]));
        $hotel_name = mysqli_real_escape_string($conn, trim($_POST["hotel_name"]));
        $place = mysqli_real_escape_string($conn, trim($_POST["place"]));
        $linen_code = mysqli_real_escape_string($conn, trim($_POST["linen_code"]));
        $linen_name = mysqli_real_escape_string($conn, trim($_POST["linen_name"]));
        $size = mysqli_real_escape_string($conn, trim($_POST["size"]));
        $total = mysqli_real_escape_string($conn, trim($_POST["total"]));
        $total_clean = mysqli_real_escape_string($conn, trim($_POST["total_clean"]));
        $total_dirty = mysqli_real_escape_string($conn, trim($_POST["total_dirty"]));
        $linen_status = mysqli_real_escape_string($conn, trim($_POST["linen_status"]));

        if ($id_clean_linen == "") {
            $sql = ("INSERT INTO tb_clean_linen(id_jabatan, hotel_name, place, linen_code, linen_name, size, total, total_clean, total_dirty, linen_status) VALUES (
                '" . $public_id_jabatan . "',
                '" . $hotel_name . "', 
                '" . $place . "', 
                '" . $linen_code . "', 
                '" . $linen_name . "', 
                '" . $size . "', 
                '" . $total . "',  
                '" . $total_clean . "', 
                '" . $total_dirty . "', 
                '" . $linen_status . "')");
        } else {
            $sql = ("UPDATE tb_clean_linen_status SET 
                hotel_name = '$hotel_name', 
                place = '$place',  
                linen_code = '$linen_code', 
                linen_name = '$linen_name', 
                size = '$size', 
                total = '$total', 
                total_clean = '$total_clean', 
                total_dirty = '$total_dirty', 
                linen_status = '$linen_status' WHERE id_clean_linen = '$id_clean_linen'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    }  else if ($kode == 'del_clean') {
        $id_check_linen = mysqli_real_escape_string($conn, trim($_POST["id_clean_linen"]));

        $sql = ("DELETE FROM tb_clean_linen WHERE id_clean_linen = '$id_clean_linen' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } else if ($kode == 'packed') {
        $id_packed = mysqli_real_escape_string($conn, trim($_POST["id_packed"]));
        $packing_code = mysqli_real_escape_string($conn, trim($_POST["packing_code"]));
        $packing_date = mysqli_real_escape_string($conn, trim($_POST["packing_date"]));
        $packed_by = mysqli_real_escape_string($conn, trim($_POST["packed_by"]));
        $hotel_code = mysqli_real_escape_string($conn, trim($_POST["hotel_code"]));
        $hotel_name = mysqli_real_escape_string($conn, trim($_POST["hotel_name"]));
        $total = mysqli_real_escape_string($conn, trim($_POST["total"]));
        $status = mysqli_real_escape_string($conn, trim($_POST["status"]));

        if ($id_packed == "") {
            $sql = ("INSERT INTO tb_packed(id_jabatan, packing_code, packing_date, packed_by, hotel_code, hotel_name, total, status) VALUES (
                '" . $public_id_jabatan . "',
                '" . $packing_code . "', 
                '" . $packing_date . "', 
                '" . $packed_by . "', 
                '" . $hotel_code . "', 
                '" . $hotel_name . "', 
                '" . $total . "', 
                '" . $status . "')");
        } else {
            $sql = ("UPDATE tb_packed SET 
                packing_code = '$packing_code', 
                packing_date = '$packing_date', 
                packed_by = '$packed_by', 
                hotel_code = '$hotel_code', 
                hotel_name = '$hotel_name', 
                total = '$total', 
                status = '$status' WHERE id_packed = '$id_packed'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    }  else if ($kode == 'del_packed') {
        $id_check_linen = mysqli_real_escape_string($conn, trim($_POST["id_packed"]));

        $sql = ("DELETE FROM tb_packed WHERE id_packed = '$id_packed' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } else if ($kode == 'linen_category') {
        $id_category = mysqli_real_escape_string($conn, trim($_POST["id_category"]));
        $linen_code = mysqli_real_escape_string($conn, trim($_POST["linen_code"]));
        $linen_name = mysqli_real_escape_string($conn, trim($_POST["linen_name"]));
        $description = mysqli_real_escape_string($conn, trim($_POST["description"]));


        if ($id_category == "") {
            $sql = ("INSERT INTO tb_linen_category(id_jabatan, linen_code, linen_name, description) VALUES (
                '" . $public_id_jabatan . "',
                '" . $linen_code . "', 
                '" . $linen_name . "', 
                '" . $description . "')");
        } else {
            $sql = ("UPDATE tb_linen_category SET 
                linen_code = '$linen_code', 
                linen_name = '$linen_name', 
                description = '$description' WHERE id_category = '$id_category'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    }  else if ($kode == 'del_category') {
        $id_category = mysqli_real_escape_string($conn, trim($_POST["id_category"]));

        $sql = ("DELETE FROM tb_linen_category WHERE id_category = '$id_category' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } else if ($kode == 'type') {
        $id_type = mysqli_real_escape_string($conn, trim($_POST["id_type"]));
        $linen_code = mysqli_real_escape_string($conn, trim($_POST["linen_code"]));
        $linen_type = mysqli_real_escape_string($conn, trim($_POST["linen_type"]));
        $linen_category = mysqli_real_escape_string($conn, trim($_POST["linen_category"]));
        $size = mysqli_real_escape_string($conn, trim($_POST["size"]));
        $color = mysqli_real_escape_string($conn, trim($_POST["color"]));
        $max_cycle = mysqli_real_escape_string($conn, trim($_POST["max_cycle"]));

        if ($id_type == "") {
            $sql = ("INSERT INTO tb_linen_type(id_jabatan, linen_code, linen_type, linen_category, size, color, max_cycle) VALUES (
                '" . $public_id_jabatan . "',
                '" . $linen_code . "', 
                '" . $linen_type . "', 
                '" . $linen_category . "', 
                '" . $size . "', 
                '" . $color . "', 
                '" . $max_cycle . "')");
        } else {
            $sql = ("UPDATE tb_linen_type SET 
                linen_code = '$linen_code', 
                linen_type = '$linen_type', 
                linen_category = '$linen_category',
                size = '$size',
                color = '$color',
                max_cycle = '$max_cycle' WHERE id_type = '$id_type'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    }  else if ($kode == 'del_type') {
        $id_type = mysqli_real_escape_string($conn, trim($_POST["id_type"]));

        $sql = ("DELETE FROM tb_linen_type WHERE id_type = '$id_type' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    } else if ($kode == 'supplier') {
        $id_supplier = mysqli_real_escape_string($conn, trim($_POST["id_supplier"]));
        $code_supplier = mysqli_real_escape_string($conn, trim($_POST["code_supplier"]));
        $name_supplier = mysqli_real_escape_string($conn, trim($_POST["name_supplier"]));
        $manufacture = mysqli_real_escape_string($conn, trim($_POST["manufacture"]));
        $phone = mysqli_real_escape_string($conn, trim($_POST["phone"]));
        $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
        
        if ($id_supplier == "") {
            $sql = ("INSERT INTO tb_supplier(id_jabatan, code_supplier, name_supplier, manufacture, phone, email) VALUES (
                '" . $public_id_jabatan . "',
                '" . $code_supplier . "', 
                '" . $name_supplier . "', 
                '" . $manufacture . "', 
                '" . $phone . "', 
                '" . $email . "')");
        } else {
            $sql = ("UPDATE tb_supplier SET 
                code_supplier = '$code_supplier', 
                name_supplier = '$name_supplier', 
                manufacture = '$manufacture',
                phone = '$phone',
                email = '$email' WHERE id_supplier = '$id_supplier'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    }  else if ($kode == 'del_supplier') {
        $id_supplier = mysqli_real_escape_string($conn, trim($_POST["id_supplier"]));

        $sql = ("DELETE FROM tb_supplier WHERE id_supplier = '$id_supplier' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    } else if ($kode == 'user') {
        $id_user = mysqli_real_escape_string($conn, trim($_POST["id_user"]));
        $first_name = mysqli_real_escape_string($conn, trim($_POST["first_name"]));
        $last_name = mysqli_real_escape_string($conn, trim($_POST["last_name"]));
        $linen_center = mysqli_real_escape_string($conn, trim($_POST["linen_center"]));
        $laundry_plant = mysqli_real_escape_string($conn, trim($_POST["laundry_plant"]));
        $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
        
        if ($id_user == "") {
            $sql = ("INSERT INTO tb_user(id_jabatan, first_name, last_name, linen_center, laundry_plant, email) VALUES (
                '" . $public_id_jabatan . "',
                '" . $first_name . "', 
                '" . $last_name . "', 
                '" . $linen_center . "', 
                '" . $laundry_plant . "', 
                '" . $email . "')");
        } else {
            $sql = ("UPDATE tb_user SET 
                first_name = '$first_name', 
                last_name = '$last_name', 
                linen_center = '$linen_center',
                laundry_plant = '$laundry_plant',
                email = '$email' WHERE id_user = '$id_user'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    }  else if ($kode == 'del_user') {
        $id_role_user = mysqli_real_escape_string($conn, trim($_POST["id_role_user"]));

        $sql = ("DELETE FROM tb_role_user WHERE id_role_user = '$id_role_user' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
        
    } else if ($kode == 'role_user') {
        $id_role_user = mysqli_real_escape_string($conn, trim($_POST["id_role_user"]));
        $role = mysqli_real_escape_string($conn, trim($_POST["role"]));
        $description = mysqli_real_escape_string($conn, trim($_POST["description"]));
        
        if ($id_role_user == "") {
            $sql = ("INSERT INTO tb_role_user(id_jabatan, role, description) VALUES (
                '" . $public_id_jabatan . "',
                '" . $role . "', 
                '" . $description . "')");
        } else {
            $sql = ("UPDATE tb_role_user SET 
                role = '$role', 
                description = '$description' WHERE id_role_user = '$id_role_user'");
        }

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }

    }  else if ($kode == 'del_role_user') {
        $id_user = mysqli_real_escape_string($conn, trim($_POST["id_user"]));

        $sql = ("DELETE FROM tb_role_user WHERE id_user = '$id_user' ");

        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            print "1";
        } else {
            print "0 $sql";
        }
    }
}

