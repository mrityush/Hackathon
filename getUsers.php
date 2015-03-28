<?php
include 'connection.php';
include 'constants.php';
$latitude = $_POST ["latitude"];
$longitude = $_POST ["longitude"];
$radius = $_POST ["radius"];
// circular radius check
$usersInfoStmt = "select * from user_info where (((latitude-" . $latitude . ")*(latitude-" . $latitude . "))+((longitude-" . $longitude . ")*(longitude-" . $longitude . ")) ) < " . ($radius * $radius);
$usersInfoRes = mysqli_query ( $con, $usersInfoStmt );
$resultData = array ();
while ( $row = mysqli_fetch_array ( $usersInfoRes ) ) {
	array_push ( $resultData, array (
			"id" => $row ['id'],
			"email" => $row ['email'] 
	) );
}
$result = json_encode ( $resultData );
echo $result;
