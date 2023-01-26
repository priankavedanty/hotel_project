<?php
	if(!isset($_SESSION)) { session_start();  } 
	$token = "";
	include_once 'koneksi.php';
	require_once 'class/ende.php';
	
	if(!isset($_SESSION['IDU'])){header('Location: login.php'); }
	
	$idp = mysqli_real_escape_string($conn,$_SESSION['IDU']);
	$idp = encrypt_decrypt('decrypt',$idp);
	
	$query_cs = "select u.first_name, tb_jabatan.*, u.username, u.foto
		from tb_user u
		INNER JOIN tb_jabatan on u.id_jabatan = tb_jabatan.id_jabatan
		where id_user = '$idp' and status_akun = 1";
	
	$result_cs = mysqli_query($conn, $query_cs);
	$row_count = mysqli_num_rows($result_cs); 
	$row_public = mysqli_fetch_assoc($result_cs);
	
	if($row_count == 0)
	{
		unset($_SESSION['IDU']);
		header('Location: login.php'); 
	}
	else
	{
		$public_nama = $row_public['first_name'];
		$public_nama_jabatan = $row_public['nama_jabatan'];
		$public_id_jabatan = $row_public['id_jabatan'];
		$public_foto = $row_public['foto'];
		$public_telp = $row_public['username'];
		$public_date = date("d-m-Y");
		$public_year = date("Y");
	}
?>