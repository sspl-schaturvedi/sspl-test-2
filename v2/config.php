<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['db_user'] = 'stepouts_hul';
$_SESSION['db_pass'] = '[vQ#D}g{V%bQ';
$_SESSION['db_server'] = 'localhost';
$_SESSION['db_name'] = 'stepouts_hulSocialTrends';
?>