<?php

 	$host= "localhost";
 	$user='root';
 	$pass='';
 	$dbname = "my_music";
 	$url = "http://localhost/MyMusicDynamic/TheApp/";
 	



 	$img_path = "img/";
 	$albums_folder = "album/";
 	

 	$con = mysqli_connect($host,$user, $pass, $dbname);

 	if(mysqli_connect_errno()){
 		die("Database connection failed " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
 	}     

 	