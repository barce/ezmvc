<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <meta name="description" content="links">
  <link rel="Shortcut Icon" type="image/ico" href="/favicon.ico">
  <link rel="stylesheet" type="text/css" href="http://www.codebelay.com/labs/ezmvc/css/screen.css?<?= time() ?>" media="screen">
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://www.codebelay.com/labs/ezmvc/css/ie.css?<?= time() ?>" media="screen">
  <![endif]-->

<!-- <script src="/js/jquery-1.4.2.min.js" type="text/javascript"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script> 

<script type="text/javascript"> 
// <![CDATA[

$(document).ready(function(){

  $("#urls").load('/links/get_all');
  $("#newurl").load('/links/get_last_insert');

  $("#myForm").submit(function() {
  // we want to store the values from the form input box, then send via ajax below
  var url     = $('#url').attr('value');

  $.ajax({
      type: "POST",
      url: "/links/add",
      data: "url="+ url, 
      success: function(){
        $('#pressed').fadeOut();
        $('#pressed').fadeIn();
        

        $("#newurl").fadeOut();
        $("#newurl").load('/links/get_last_insert');
        $("#newurl").fadeIn();
        $("#urls").load('/links/get_all');
        // $("#urls").slideDown();


        // $('#first').css({backgroundColor: '#fff'}); 
        // $('#first').slideDown('slow');
        // $('#first').animate({backgroundColor: '#000' }, 5000); 


      }
  });
  return false;
  });


  // $("#urls").load
});
    // ]]> 
</script> 
<style type="text/css">
#all {
  border: 5px solid #f00;
}
#first {
  background-color: #fff;
  border: 1px solid #000;
  margin: 2px 2px 2px 2px;
  height: 25px;
}
.row {
  background-color: #fff;
  border: 1px solid #000;
  margin: 2px 2px 2px 2px;
  height: 25px;
}
.url {
  float: left;
  margin-right: 10px;

}
</style>
</head>

<body> 

<form id="myForm" method="POST" action="/links/add">
Add a url to shorten
<input type='text' name='url' id='url'> 
<input type='submit' class="button" id='pressed' name='pressed' value='Shorten'>
</form>

<div id='newurl'>
please turn on javascript
</div>
<hr>
<div id='urls'>
</div>


</body>
</html>
