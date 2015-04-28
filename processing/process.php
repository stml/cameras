<?php
// This script takes textual descriptions of camera locations from DB and runs them through Google Geocode API, adding the results back to the DB.

mysql_connect("localhost", "root", "root") or die(mysql_error());
echo "Connected to MySQL<br />";
mysql_select_db("cameras") or die(mysql_error());
echo "Connected to Database<br />";

$apikey = 'XXXXXXXXX';
// Google API Code required

$result = mysql_query("SELECT * FROM cameras WHERE latitude IS NULL LIMIT 100") 
or die(mysql_error());  

echo "<table border='1'>";
echo "<tr> <th>ID</th> <th>Location</th> <th>Purpose</th> <th>Latitude</th> <th>Longitude</th> <th>Result</th></tr>";

while($row = mysql_fetch_array( $result )) {

	$address = $row['location'];
	$url = 'https://maps.googleapis.com/maps/api/geocode/xml?address='.urlencode($address.' london uk').'&key='.$apikey;
	
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);	
	$xml = trim(curl_exec($c));
	curl_close($c);

	$response = simplexml_load_string($xml);
	
	if (strcasecmp($response->status, 'OK') != 0) {
		echo 'error at ID '.$row['id'];
		exit();
		}
		
	mysql_query("UPDATE cameras SET latitude='".$response->result->geometry->location->lat."' WHERE id='".$row['id']."'") 
		or die(mysql_error());  
	mysql_query("UPDATE cameras SET longitude='".$response->result->geometry->location->lng."' WHERE id='".$row['id']."'") 
		or die(mysql_error());  
	
	echo "<tr><td>"; 
	echo $row['id'];
	echo "</td><td>"; 
	echo $address;
	echo "</td><td>"; 
	echo $row['purpose'];
	echo "</td><td>"; 
	echo $response->result->geometry->location->lat;
	echo "</td><td>"; 
	echo $response->result->geometry->location->lng;
	echo "</td><td>"; 
	echo $response->status;
	echo "</td></tr>"; 

	} 

echo "</table>";
?>