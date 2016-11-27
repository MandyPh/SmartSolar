<?php
//error_reporting(E_ALL);
//var_dump($_SERVER);
$post_data = $_POST['val'];
    $filename = '/home2/manman/raspberry/direction.txt';
    $handle = fopen($filename, "w");
    fwrite($handle, $post_data);
    //file_put_contents($handle, $post_data);
    fclose($handle);
    echo $file;
?>