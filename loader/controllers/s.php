<?php


class S {

  function __construct()
  {


  }

  function index() {
  }

  function t() {

    $s_tag = $_SERVER['REQUEST_URI'];
    $s_tag = str_replace('/s/t/', '', $s_tag);
    $dbh = dbConnect();
    $sql = "select url from links where short_link = '$s_tag'";
    $res = mysql_query($sql, $dbh);
    $row = mysql_fetch_assoc($res);
    $url = $row['url'];

    $sql    = "select clicks from links where short_link = '$s_tag'";
    $res    = mysql_query($sql, $dbh);
    $row    = mysql_fetch_assoc($res);
    $clicks = (int) $row['clicks'];
    $clicks++;

    $sql = "update links set clicks = $clicks where short_link = '$s_tag'";
    $res    = mysql_query($sql, $dbh);

    mysql_close($dbh);


    echo $url;
  }


}



?>
