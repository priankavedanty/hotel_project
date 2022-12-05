<?php

function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'dLosp8aA4wsLsmkS03Psl7sHnsjAMVuwiSjjAkdo24aZkdPldowkSdj';
    $secret_iv = 'D0o9Hsju3ndjSmddkosS9kdodkSMDVpenD2gkS83ikdjnXnffjeKSodkSX';

    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function generateRandomString($length = 158) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/*
function generateRandomPass($length = 8) {
    $characters = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateKodeSMS($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function KirimSMS($isi,$telp_tmp)
{
	$status_kirim = 0;
	$tail = substr($telp_tmp,1); $nope = "62".$tail;
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'http://api.nusasms.com/api/v3/sendsms/plain',
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => array(
			'user' => 'pnusa_api',
			'password' => 'daftar',
			'SMSText' => $isi,
			'GSM' => $nope
		)
	));
	$resp = curl_exec($curl);
	if (!$resp)  {
		$status_kirim = 0;
	}else
	{
		$tmp = new DOMDocument;
		$tmp->loadXML($resp);
		
		$status = $tmp->getElementsByTagName('status')->item(0)->nodeValue;
		$des = $tmp->getElementsByTagName('destination')->item(0)->nodeValue;
		if($status == 0){$status_kirim = 1;}
		else {$status_kirim = 0;}
	}
	curl_close($curl);
	return $status_kirim;
}

function terbilang($x) {
  $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
  if ($x < 12)
    return " " . $angka[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . " belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return "seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return "seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
}
*/

//$aa = generateRandomString(); print $aa;
?>