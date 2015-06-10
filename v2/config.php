<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['db_user'] = 'b3b856772cb6d0';
$_SESSION['db_pass'] = '9098fb21';
$_SESSION['db_server'] = 'ap-cdbr-azure-southeast-a.cloudapp.net';
$_SESSION['db_name'] = 'db_sspl_test_2';
?>