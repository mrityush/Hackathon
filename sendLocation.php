<?php
$latitude = json_decode ( $_POST ["latitude"] );
$longitude = json_decode ( $_POST ["longitude"] );
$email = json_decode ( $_POST ["email"] );
$oAuth = json_decode ( $_POST ["authCode"] );

include 'connection.php';
include 'constants.php';

if (! emailExists ( $con, $email )) {
	$oAuth = $generateOAuth ( $email );
	$userEntryStmt = "insert into user_info (email, latitude, longitude, authToken, type) values (" . $email . ", " . $latitude . ", " . $longitude . ", " . $oAuth . ", " . $MOBILE_USER . ")";
	$userEntryresult = mysqli_query ( $con, $userEntryStmt );
} else {
	if (isAuthorised ( $con, $email, $oAuth )) {
		setStatus ( $con, $email, $ACTIVE_STATUS );
		// DO FURTHER APP WORK
	} else {
		sendNotification ( $UNAUTHORISED_ACCESS );
	}
}
function emailExists($con, $email) {
	return mysqli_num_rows ( mysqli_query ( $con, "SELECT * FROM user_info where email = " . $email ) );
}
function setStatus($con, $email, $userStatus) {
	mysqli_query ( $con, "update user_info set status = " . $userStatus . " where email = " . $email );
}
function isAuthorised($con, $email, $oAuth) {
	return mysqli_num_rows ( mysqli_query ( $con, "SELECT * FROM user_info where email = " . $email . " and authToken = " . $oAuth ) );
}

?>
