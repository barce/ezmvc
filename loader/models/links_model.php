<?php


class Links_Model {

  var $url;
  var $short_link;
  var $clicks;

  function __construct()
  {


  }

  function add() {

  }

  function update() {


  }

  function destroy() {


  }

  function get_by_id() {


  }

  function get_all() {
    $dbh = dbConnect();
    $sql = "select * from links";
    $res = mysql_query($sql);
    $a_all = array();
    while ($row = mysql_fetch_assoc($result)) {
      $a_all[] = $row;
    }

    mysql_close($dbh);

    return $a_all;

  }

  function shrink() {


  }

}

?>
