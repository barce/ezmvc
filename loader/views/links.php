<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <meta name="description" content="links">
  <link rel="Shortcut Icon" type="image/ico" href="/favicon.ico">
  <link rel="stylesheet" type="text/css" href="/css/screen.css?<?= time() ?>" media="screen">
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="/css/ie.css?<?= time() ?>" media="screen">
  <![endif]-->

<script src="/js/jquery-1.4.2.min.js" type="text/javascript"></script>

<script type="text/javascript"> 
// <![CDATA[

$(document).ready(function(){
  $("#myForm").submit(function() {
  // we want to store the values from the form input box, then send via ajax below
  var url     = $('#url').attr('value');

  $.ajax({
      type: "POST",
      url: "/links/add",
      data: "url="+ url, 
      success: function(){
        $('#pressed').hide(function(){$('div.success').fadeIn();});

      }
  });
  return false;
  });
});
    // ]]> 
</script> 
</head>

<body> 
<div id="success">
success
</div>

<form id="myForm" method="POST" action="/links/add">
Add a url to shorten
<input type='text' name='url' id='url'> 
<input type='submit' class="button" id='pressed' name='pressed' value='Shorten'>
</form>



</body>
</html>
