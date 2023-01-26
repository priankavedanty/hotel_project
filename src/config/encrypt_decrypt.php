<?php
function encrypt_decrypt($action, $string){
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'dLosp8aA4wsLsmkS03Psl7sHnsjAMVuwiSjjAkdo24aZkdPldowkSdj';
    $secret_iv = 'D0o9Hsju3ndjSmddkosS9kdodkSMDVpenD2gkS83ikdjnXnffjeKSodkSX';

    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if($action == 'encrypt'){
        
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);

    } else if($action == 'decrypt') {

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}
?>