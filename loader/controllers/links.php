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
    $links->short_link = md5(clean($_POST['url']));
    $links->add();

  }

}

?>
