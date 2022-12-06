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
	else if($page == 'hotel_transaction2'){include 'page/hotel transaction/hotel_transaction2.php';}
	
	else if($page == 'billing_hotel'){include 'page/billing to hotel/billing_hotel.php';}
	else if($page == 'billing_lp'){include 'page/billing to lp/billing_lp.php';}
	else if($page == 'check_linen'){include 'page/check linen status/check_linen.php';}
	else if($page == 'internal_reject'){include 'page/internal reject/internal_reject.php';}
	else if($page == 'internal_transaction'){include 'page/internal transaction/internal_transaction.php';}
	else if($page == 'laundry'){include 'page/laundry plant/laundry.php';}
	else if($page == 'linen_aging15'){include 'page/linen aging 15 days/linen_aging15.php';}
	else if($page == 'linen_center'){include 'page/linen center/linen_center.php';}
	else if($page == 'linen_packed'){include 'page/linen to packed/linen_packed.php';}
	else if($page == 'linen_to_receive'){include 'page/linen to receive/linen.php';}
	else if($page == 'total_driver'){include 'page/total driver/total_driver.php';}
	else if($page == 'total_hotel'){include 'page/total hotel/total_hotel.php';}
	else if($page == 'total_linen'){include 'page/total linen/total_linen.php';}
	else if($page == 'total_template'){include 'page/total linen template/total_template.php';}
	else if($page == 'total_register'){include 'page/total register linen/total_register.php';}

	else{include '404.php';}
}
else
{
	if($public_id_jabatan == 1){include 'page/home_programmer.php';}
	else if($public_id_jabatan == 2){include 'page/home_hotel.php';}
	else if($public_id_jabatan == 3){include 'page/home_linen.php';}

}

?>

