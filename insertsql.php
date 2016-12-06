<?php
$servername = "localhost";
$username = "root";
$password = "password";
$db = "SmartSolar";
$myquery = "SELECT * FROM location";

// Create connection
$dbhandle = mysql_connect($hostname, $username, $password)
	or die("Unable to connect to MySQL");
mysql_select_db($db);
//echo "Connected to MySQL\n";

$query = mysql_query($myquery) or die(mysql_error());

$table = array();
$table['cols'] = array(
	array('id' => '', 'label' => 'Lat', 'pattern' => '', 'type' => 'number'),
	array('id' => '', 'label' => 'Long', 'pattern' => '', 'type' => 'number'),
	array('id' => '', 'label' => 'Name', 'pattern' => '', 'type' => 'string')
	);	

$rows = array();
while($row = mysql_fetch_array($query)) {
	$temp = array();
	$temp[] = array('v' => (float) $row['latitude']);
	$temp[] = array('v' => (float) $row['longitude']);
	$temp[] = array('v' => (string) $row['name']);
	$rows[] = array('c' => $temp);
}

//$query->free();
$table['rows'] = $rows;
$json = json_encode($table, true);

//while($row = mysql_fetch_array($query))
//{
//	$result[] = array(
//		'lat' => $row['lat'],
//		'long' => $row['long']
//	);
//}
//$json = json_encode($rows);
echo $json;
?>
