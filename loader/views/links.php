<!DOCTYPE html>
<html lang="en" id="l33tcave-com">
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
<h3>Add a URL to shorten</h3>
<form id="myForm" method="POST" action="/links/add">
<textarea name='url' id='url' rows='7' cols='50'>
</textarea>
<input type='submit' class="button" id='pressed' name='pressed' value='Shorten'>
</form>
<div id='source'>
<p>
<a href="http://github.com/barce/ezmvc">the source on github</a>
</p>
</div>
<div id='newurl'>
please turn on javascript
</div>
<hr>
<div id='urls'>
</div>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16470309-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
