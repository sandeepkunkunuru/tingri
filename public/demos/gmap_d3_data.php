<?php
$con = mysqli_connect ( "localhost", "root", "Mahalaxmi$7", "tingri" );

// Check connection
if (mysqli_connect_errno ()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}

$result = mysqli_query ( $con, "SELECT * FROM demo_apy where Year LIKE '%1998%' and Season like '%Whole%' and Crop like '%Sugarcane%' order by Production desc limit 20" );

$json_1 = array();

while ( $row = mysqli_fetch_array ( $result ) ) {
    $myURL = 'http://maps.googleapis.com/maps/api/geocode/json?';  
    $myAddress = $row ['District'] . "," . trim($row ['State']) . ",INDIA";
    $options = array("address"=>$myAddress,"sensor"=>"false");
    $myURL .= http_build_query($options,'','&');
   
    $du = file_get_contents($myURL);
    $json1_data = json_decode(utf8_encode($du),true);
    array_push ($json_1, array( $row ['District'] . "---" . $row ['Production'] => $json1_data['results'][0]['geometry']['location']));
}

echo json_encode ( $json_1 );

mysqli_close ( $con );
?>
