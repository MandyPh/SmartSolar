<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $db = "SmartSolar";
    $myquery = "SELECT SUM(Voltage*Current) as Power, Date FROM systemdata WHERE Date in ('2016-10-31') GROUP BY Date UNION SELECT SUM(Voltage*Current) as Power, Date FROM systemdata_nov WHERE Date in ('2016-11-01', '2016-11-02','2016-11-03','2016-11-04','2016-11-05','2016-11-06') GROUP BY Date";
    
    // Create connection
    $dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");
    mysql_select_db($db);
    //echo "Connected to MySQL\n";
    
    $query = mysql_query($myquery) or die(mysql_error());
    
    $table = array();
    $table['cols'] = array(
                           array('id' => '', 'label' => 'Days', 'pattern' => '', 'type' => 'string'),
                           array('id' => '', 'label' => 'Watts', 'pattern' => '', 'type' => 'number')
                           );
    
    $rows = array();
    while($row = mysql_fetch_array($query)) {
        $temp = array();
        $temp[] = array('v' => (string) $row['Date']);
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
