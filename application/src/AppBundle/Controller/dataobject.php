<?php

// function for database transaction
function querydatabase($sql) {
	$conn = new mysqli ( DB_HOST, DB_USER, DB_PASSWORDWORD, DB_NAME );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	
	
	$result = $conn->query ( $sql );
	
	if ($result->num_rows > 0) {
		// output data of each row
		return $result;
	} else {
		return "0 results";
	}
	$conn->close ();
}

function insertrecord($sql) {
	$conn = new mysqli ( DB_HOST, DB_USER, DB_PASSWORDWORD, DB_NAME );
	// Check connection
	
	$sql = str_replace("^^**^*","&",$sql);
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	if ($conn->query ( $sql ) === TRUE) {
		return "New record created successfully";
	} else {
		return "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close ();
}

function updaterecord($sql) {
	$conn = new mysqli ( DB_HOST, DB_USER, DB_PASSWORDWORD, DB_NAME );
	// Check connection
	$sql = str_replace("^^**^*","&",$sql);
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	if ($conn->query ( $sql ) === TRUE) {
		return "Record updated successfully";
	} else {
		return "Error updating record: " . $conn->error;
	}
	
	$conn->close ();
}

function deleterecord($sql) {
	$conn = new mysqli ( DB_HOST, DB_USER, DB_PASSWORDWORD, DB_NAME );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	if ($conn->query ( $sql ) === TRUE) {
		return "Record deleted successfully";
	} else {
		return "Error deleting record: " . $conn->error;
	}
	
	$conn->close ();
}


// event handlers for requests
if (isset ( $_GET ['querydatabase'] )) {
	if ($_GET ['querydatabase']) :
	$sql = $_GET ['querydatabase'];
	$column = $_GET ['querydatabase'];
	while ( $rs = querydatabase ( $sql ) ) {
		echo $rs [$column];
	}

	endif;
}

if (isset ( $_GET ['deleterecord'] )) {
	if ($_GET ['deleterecord']) :
	$sql = $_GET ['deleterecord'];
	deleterecord ( $sql );

	endif;
}

if (isset ( $_GET ['updaterecord'] )) {
	if ($_GET ['updaterecord']) :
	$sql = $_GET ['updaterecord'];
	updaterecord ( $sql );

	endif;
}

if (isset ( $_GET ['insertrecord'] )) {
	if ($_GET ['insertrecord']) :
	$sql = $_GET ['insertrecord'];
	insertrecord ( $sql );

	endif;
}

function mysql_escape_mimic($inp) {
	if(is_array($inp))
		return array_map(__METHOD__, $inp);

	if(!empty($inp) && is_string($inp)) {
		return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
	}

	return $inp;
}

?>