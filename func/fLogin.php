<?php
if(!isset($_SESSION)) {session_start();}

include '../class/ende.php';
include '../koneksi.php';

$token = mysqli_real_escape_string($conn,trim($_POST["token"]));

if($token == $_SESSION['rtoken'])
{
	$e = mysqli_real_escape_string($conn,trim($_POST["user"]));
	$pass = mysqli_real_escape_string($conn,trim($_POST["pass"]));
	$pass = encrypt_decrypt('encrypt',"$pass");// print $pass;
	
	$query2="select * from tb_user 
	inner join tb_jabatan on tb_user.id_jabatan = tb_jabatan.id_jabatan
	where username = '$e' and password = '$pass'"; //print $query2;
	$eks2 = mysqli_query($conn, $query2);
	$jml = mysqli_num_rows($eks2);
	
	if($jml > 0) // Cek akun
	{ 
		while($data=mysqli_fetch_assoc($eks2))
		{
			if($data['status_sistem'] == 1) //Cek Status Sistem: 0 = Nonaktif, 1 = Aktif
			{
				if($data['status_akun'] == 1) //Cek Status Akun: 0 = Nonaktif, 1 = Aktif
				{
					$id_user = $data['id_user'];
					$_SESSION['IDU'] = encrypt_decrypt('encrypt',$id_user);
					$_SESSION['jabatan'] = $data['id_jabatan'];
					print "1";
				}else{print "nonaktif";}
			}else{print "disable";}
		}
	}else{print "0";}
}
?>