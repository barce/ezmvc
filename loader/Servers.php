<?php


require_once(BASEPATH.'lib/spyc.php');

class Servers {

  public static $a_connections = array();

  function __construct() {
    // empty constructor
  }

  static function getConnections() {
    
    self::$a_connections = Spyc::YAMLLoad(BASEPATH. 'connect.yaml');
     return self::$a_connections;

  }

}

function dbConnect() {

  $a_db = Servers::getConnections();
  $dbh  = mysql_connect($a_db['a_dbConnect']['host'], $a_db['a_dbConnect']['user'], $a_db['a_dbConnect']['pass']);

  if ( !$dbh || !mysql_select_db($a_db['a_dbConnect']['db'])) {
    header("location: /failwhale.php");
    die('dbConnect failed :: ' .$_SERVER['PHP_SELF'].' :: mysql_error()= ' .mysql_error());
    return false;  //we catch this problem when func called
  } else  {
    return $dbh;
  }

}

?>
