<?php 
include "cs.php";

if(isset($_GET['h']))
{
	$page = $_GET['h'];
	
	if($page == 'home_programmer'){include 'page/home_programmer.php';}
	else if($page == 'home_hotel'){include 'page/home_hotel.php';}
	else if($page == 'home_linen'){include 'page/home_linen.php';}
	
	else if($page == 'clean'){include 'page/clean linen/clean.php';}
	else if($page == 'discard_linen'){include 'page/discard linen/discard.php';}
	else if($page == 'linen_aging'){include 'page/linen aging/linen_aging.php';}
	else if($page == 'linen'){include 'page/linen to receive/linen.php';}
	else if($page == 'hotel_transaction'){include 'page/hotel transaction/hotel_transaction.php';}
	else{include '404.php';}
}
else
{
	if($public_id_jabatan == 1){include 'page/home_programmer.php';}
	else if($public_id_jabatan == 2){include 'page/home_hotel.php';}
	else if($public_id_jabatan == 2){include 'page/home_linen.php';}

}

?>

