<?php
include 'connection.php';
$oAuthMap = array (
		"admin" => "diwndeifns2n18" 
); // ideally here, oAuth should be generated through some encryption - md5 or other, doing it currently as a direct mapping
$email = $_POST ["email"];
$password = $_POST ["password"];
if (isset ( $oAuthMap [$password] )) {
	if (isAuthorised ( $con, $email, $oAuthMap [$password] )) {
		header ( "Location: adminPanel.php" );
		exit ();
	} else {
		echo "Error in Authentication";
	}
}
function isAuthorised($con, $email, $oAuth) {
	echo "SELECT * FROM user_info where email = " . $email . " and oAuth = " . $oAuth ;
	return mysqli_num_rows ( mysqli_query ( $con, "SELECT * FROM user_info where email = '" . $email . "' and oAuth = '" . $oAuth."'" ) );
}