<?php
include 'dataobject.php';

require_once (__DIR__ . '/../../../app/application.php');

if (isset ( $_GET ['checkPhoneNumber'] )) {
	if ($_GET ['checkPhoneNumber']) :
		$phoneNumber = $_GET ['checkPhoneNumber'];
		$sql = "insert into used_numbers (`phone_number`) VALUES ('$phoneNumber')";
		$result = insertrecord ( $sql );
		echo $result;
	endif;
}

?>