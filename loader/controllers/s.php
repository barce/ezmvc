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
	 if (strlen($url) <= 0) { return; }

    $sql    = "select clicks from links where short_link = '$s_tag'";
    $res    = mysql_query($sql, $dbh);
    $row    = mysql_fetch_assoc($res);
    $clicks = (int) $row['clicks'];
    $clicks++;

    $sql = "update links set clicks = $clicks where short_link = '$s_tag'";
    $res    = mysql_query($sql, $dbh);

    mysql_close($dbh);


    header("location: $url");
    echo "<script>\n";
    echo "window.location='$url';";
    echo "</script>\n";
  }


}



?>
