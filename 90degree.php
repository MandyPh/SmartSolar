<?php

set_include_path(get_include_path() . PATH_SEPARATOR . '/Users/natalieli/Downloads/phpseclib1/');
include('Net/SSH2.php');

$ssh = new Net_SSH2('192.168.43.90');
if (!$ssh->login('pi', 'raspberry')) {
    exit('Login Failed');
}

echo $ssh->exec('sudo python anglefinal.py 90');

?>
