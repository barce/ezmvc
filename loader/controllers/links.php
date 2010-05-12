<?php



class Links {

  function __construct() {
    // echo 'Links called<br/>';
  }

  function index() {
    $links = new Links_Model();

    $a_links = $links->get_all();

    include(BASEPATH.'views/links.php');
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

  }

  function s() {


  }

}

?>
