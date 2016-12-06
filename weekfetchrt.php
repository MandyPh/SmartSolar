<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $db = "SmartSolar";
    //$myquery = "SELECT CONCAT(Date, ' ', Time) as Datetime , Voltage*Current as Power FROM systemdata_nov WHERE Date in ('2016-11-29') ORDER BY id DESC LIMIT 20";
     $myquery = "SELECT CONCAT(Date, ' ', Time) as Datetime , Voltage*Current as Power FROM systemdata_dec ORDER BY id DESC LIMIT 20";
    
    // Create connection
    $dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");
    mysql_select_db($db);
    //echo "Connected to MySQL\n";
    
    $query = mysql_query($myquery) or die(mysql_error());
    
    $table = array();
    $table['cols'] = array(
                           array('id' => '', 'label' => 'Datetime', 'pattern' => '', 'type' => 'datetime'),
                           array('id' => '', 'label' => 'Power', 'pattern' => '', 'type' => 'number')
                           );
    
    $rows = array();
    while($row = mysql_fetch_array($query)) {
        preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $row['Datetime'], $match);
        $year = (int) $match[1];
        $month = (int) $match[2] - 1; // convert to zero-index to match javascript's dates
        $day = (int) $match[3];
        $hours = (int) $match[4];
        $minutes = (int) $match[5];
        $seconds = (int) $match[6];
        $temp = array();
        $temp[] = array('v' => "Date($year, $month, $day, $hours, $minutes, $seconds)");
        $temp[] = array('v' => (float) $row['Power']);
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
