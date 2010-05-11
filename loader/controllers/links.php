<?php



class Links {

  function __construct() {
    echo 'Links called<br/>';
  }

  function index() {
    $links = new Links_Model();

    $links->get_all();
    echo 'index called';

  }

}

?>
