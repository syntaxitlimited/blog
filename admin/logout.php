<?php 
include_once('../lib/session.php');

if ($_GET['action'] == 'logout') {
    Session::destroy();

}

?>
