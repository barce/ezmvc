<!DOCTYPE html>
<html lang="en" id="short-com">
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <meta name="description" content="">
  <link rel="Shortcut Icon" type="image/ico" href="/favicon.ico">
  <link rel="stylesheet" type="text/css" href="/css/screen.css?<?= time() ?>" media="screen">
  <script src="/js/jquery-1.4.1.min.js" type="text/javascript"></script>
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="/css/ie.css?<?= time() ?>" media="screen">
  <![endif]-->
</head>

<body class="home">


<form id="myForm" method="POST" action="/links/add">
<label>Add a url to shorten</label>
<input type='text' name='url' id='url'> 
<input type='submit' name='pressed' value='Shorten'>
</form>


</body>
</html>
