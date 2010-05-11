<?php


error_reporting(E_ALL); // this is great for testing and debugging
// error_reporting(E_ALL & ~E_NOTICE); // in prod use this

$system_folder = "system";
define('BASEPATH', $system_folder.'/');


/*
 *
 * load the controller
 *
 *
 */
define('EXT', '.php');
require_once BASEPATH.'loader/Controller'.EXT;

?>
