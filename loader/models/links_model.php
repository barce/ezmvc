<?php


class Links_Model {

  var $url;
  var $short_link;
  var $clicks;

  function __construct()
  {


  }

  function add() {
    $dbh = dbConnect();
    $sql = 'insert into links (url, short_link, created_at) values ("' . $this->url .
      '", "' . $this->short_link . '", now())';
    $res = mysql_query($sql);
    mysql_close($dbh);
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
    $res = mysql_query($sql, $dbh);
    $a_all = array();
    while ($row = mysql_fetch_assoc($res)) {
      $a_all[] = $row;
    }

    mysql_close($dbh);

    return $a_all;

  }

  function shrink() {


  }

}

?>
