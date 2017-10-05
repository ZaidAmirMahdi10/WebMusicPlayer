<?php include 'connect.php';?>
<!doctype html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1,user-scalable=no" />

 <link rel="stylesheet" type="text/css" href="css/MainTheme/style2.css">
 <link href="css/Gallery/bootstrap.min.css" rel="stylesheet">
   
 <script src="js/MainTheme/jquery-2.1.3.min.js.js"></script>
 <script src="js/MainTheme/MainThemeFunctions.js"></script>
 <!-- For Search Box -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>

<body>
<div class="wrap">
<!-- Header -->
 <nav class="nav-bar navbar-inverse navbar-fixed-top" role="navigation">
  <div id ="top-menu" class="container-fluid active">
   <a class="navbar-brand" href="index.html" style="margin-top: 11px;">MyMusiC</a>
    <!-- Search Box -->
    <?php include 'SearchBox.php';?>
  </div>      
 </nav>
 

