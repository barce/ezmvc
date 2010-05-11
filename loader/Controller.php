<?php


// controller

class Controller {

  var $request;

  function __construct() {
    $stuff = $_SERVER['REQUEST_URI'];
    $this->request = str_replace('/index.php/','' ,$stuff);
    
  }

  function show_request() {
    return $this->request;
  }

  function load() {
    print $this->request . "<br/>\n";
    $a_requests = split('/', $this->request); 
    print_r($a_requests);
    require_once(BASEPATH.'controllers/'. $a_requests[1] . '.php');
    $my_class = ucfirst($a_requests[1]);
    $my_ct    = new $my_class();

    // TODO: parse rest of a_requests
    if ($a_requests[2]) {
      $my_ct->$a_requests[2]();
      return;
    }

    $my_ct->index();
  }
}


$c = new Controller();
$c->load();

?>
