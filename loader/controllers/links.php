<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');


class Links {

  function __construct() {
    // echo 'Links called<br/>';
  }

  function index() {
    $links = new Links_Model();

    $a_links = $links->get_all();

    include(BASEPATH.'views/links.php');
  }

  function get_last_insert() {

    $links = new Links_Model();
    $a_links = $links->get_last_insert();
    foreach ($a_links as $row) {

        print $row['url'];
        print "&nbsp;";
  
         print "<a href='/s/t/" . $row['short_link'] . "'>http://". $_SERVER['SERVER_NAME'] . "/s/t/" . $row['short_link'] . "</a>&nbsp;"; 
            
	      print "(clicks: " . $row['clicks'] . ")";
        print "<br/>\n";
    }
  }

  function get_all() {

    $links = new Links_Model();
    $a_links = $links->get_all();

    $i = 1;
    // echo "<div id='all'>\n";
	 echo "<ul>\n";
    foreach ($a_links as $row) {
    
      if ($i == 1) {
        // do nothing
      } else {
        // print "<div class='row'>\n";
		  print "<li>\n"; 
	      print $row['url'];
        print "&nbsp;";
	
	
	      print "<a href='/s/t/" . $row['short_link'] . "'>http://". $_SERVER['SERVER_NAME'] . "/s/t/" . $row['short_link'] . "</a>";
        print "&nbsp;";
	      
	      print "(clicks: " . $row['clicks'] . ")";
		  print "</li>\n"; 
 
      }
      $i++;
    
    }
	 echo "</ul>\n";
    // echo "</div>\n";


  }

  function add() {

    
    $links = new Links_Model();
    $links->url = clean($_POST['url']);
    // $links->short_link = md5(clean($_POST['url']));
    $links->short_link = base_convert(crc32(clean($_POST['url'])), 10, 16);
    // look for a duplicate first
    $dbh = dbConnect();
    $sql = "select * from links where short_link = '{$links->short_link}'";
    $res = mysql_query($sql, $dbh);
    if (mysql_num_rows($res) >= 1) {
      // do nothing
    } else { 
      $links->add();
    }

    echo "added {$links->url} with a shortlink of: <a href='/s/t/{$links->short_link}'>/s/t/{$links->short_link}</a>";
    echo "<br/>\n";
    echo "<a href='/links/'>add another link</a>";


  }

  function s() {


  }

}

?>
