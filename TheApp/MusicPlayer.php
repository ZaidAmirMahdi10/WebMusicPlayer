<?php
     include 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1,user-scalable=no" />
  <title>MyMusiCSite</title>
 
  <link rel="stylesheet" type="text/css" href="css/MainTheme/style.css">
  <link href="css/Gallery/bootstrap.min.css" rel="stylesheet">
  <link href="css/thumbnail-gallery.css" rel="stylesheet"> 
  <script src="js/MainTheme/jquery-2.1.3.min.js.js"></script>
  <script src="js/MainTheme/MainThemeFunctions.js"></script>

  <!-- For Search Box    -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>


<body>
<div class="wrap">

<!-- Search Upper MenuBar Starts -->
  <nav class="nav-bar navbar-inverse navbar-fixed-top" role="navigation">
      <div id ="top-menu" class="container-fluid active">
      <a class="navbar-brand" href="index.php"    style="margin-top: 11px;">MyMusiC</a>

<!-- SearchBox  -->
    <?php
     include 'SearchBox.php';
    ?>
          
      </div>      
  </nav>
<!-- Search Upper MenuBar Ends -->


<!-- Side Navigation -->
  <?php
    include 'SideNavigation.php';
  ?>

<!--Body content-->
  <div class="content">
    

<!-- The Top Bar That Responses To Screen Re-Sizing Starts-->
    </br></br></br></br></br>
    <div class="top-bar">       
      <a href="#menu" class="side-menu-link burger"  style=" z-index: 0;"> 
        <span class='burger_inside' id='bgrOne' style="margin-left: 10px;"></span>
        <span class='burger_inside' id='bgrTwo' style="margin-left: 10px;"></span>
        <span class='burger_inside' id='bgrThree' style="margin-left: 10px;"></span>
      </a>      
    </div>
<!-- The Top Bar That Responses To Screen Re-Sizing Ends-->

       

<!-- /Inner Container Starts-->
<section class="content-inner">
      
 
  

<link rel="stylesheet" href="css/MPlayer/style.css" media="screen">
 
<div class="row" style="background-color: white;">
<div id="container">
  <div id="audio-image">
    <img class="cover" />
  </div>
  <div id="audio-player">
    <div id="audio-info">
      <span class="artist"></span> - <span class="title"></span>
    </div>
    </br> 
     <input id="volume" type="range" min="0" max="10" value="5" />
     <br>
     <div id="buttons">
     <span>
      <button id="prev"></button>
      <button id="play"></button>
      <button id="pause"></button>
      <button id="stop"></button>
      <button id="next"></button>
      </span>
     </div>
     <div class="clearfix"></div>
     <div id="tracker">
      <div id="progressBar">
        <span id="progress"></span>
      </div>
      <span id="duration"></span>
     </div>

     <div class="clearfix"></div>
     <ul id="playlist" class="">

<!-- DataBase Starts -->
<?php
  $id = mysqli_real_escape_string($con, $_GET['id']);
  $sql = "SELECT * FROM song WHERE album_id = '$id'";
  $result = mysqli_query($con, $sql);
  $queryResults = mysqli_num_rows($result);

  if ($queryResults > 0) {
    while ($row = mysqli_fetch_assoc($result)){
      echo "<li song='".$row['song_name'].'.mp3'."' cover='".$row['album_id'].'.png'."' artist='Andrea Bocelli'>".$row["song_name"]."</li>
           ";
    }
  }

 ?> 
<!-- DataBase Ends -->

 </ul>
    </div>

</div>
<?php
  $id = mysqli_real_escape_string($con, $_GET['id']);
  $sql = "SELECT * FROM artist WHERE artist_id = '$id'";
  $result = mysqli_query($con, $sql);
  $queryResults = mysqli_num_rows($result);

  if ($queryResults > 0) {
    while ($row = mysqli_fetch_assoc($result)){
     echo "<div class='absolute' style='height: 1002px;'>
       <p>".$row['artis_description']."</p>";
    }
  }
?> 



</div>

<!-- Footer Starts -->
      <footer>
          <div class="row">
              <div class="col-lg-12">
                  <p>Copyright &copy; Your Website 2014</p>
              </div>
          </div>
      </footer>
<!-- Footer Ends -->


</div>
</section>
<!-- /Inner Container Ends-->


</div>

</div>

<script src="js/MPlayer/jquery.js"></script>

<?php
  $id = mysqli_real_escape_string($con, $_GET['id']);
  $sql = "SELECT * FROM album WHERE album_id = '$id'";
  $result = mysqli_query($con, $sql);
  $queryResults = mysqli_num_rows($result);

  if ($row = mysqli_fetch_assoc($result)) :
 ?> 

<script>

var albumName ="<?php echo $row["album_name"] ?>";
var albumID ="<?php echo $row["album_id"] ?>";
var audio;

//Hide Pause Initially
$('#pause').hide();


//Initializer - Play First Song
initAudio($('#playlist li:first-child'));
  
function initAudio(element){
    var song = element.attr('song');
    var title = element.text();
    var cover = element.attr('cover');
    var artist = element.attr('artist');


  audio = new Audio("songs/albums/"+albumName+"/" + song);

  if(!audio.currentTime){
    $('#duration').html('0.00');
  }

  $('#audio-player .title').text(title);
    $('#audio-player .artist').text(artist);
  
  //Insert Cover Image
  $('img.cover').attr('src','img/album/' + cover);
  
  $('#playlist li').removeClass('active');
    element.addClass('active');
 


//AutoPlay When Page Loaded
    if (audio.currentTime == 0) 
  {
  audio.play();
  $('#play').hide();
  $('#pause').show();
  $('#duration').fadeIn(400);
  showDuration(); 
  }
}

//Play Button
$('#play').click(function(){
  audio.play();
  $('#play').hide();
  $('#pause').show();
  $('#duration').fadeIn(400);
  showDuration();
});

//Pause Button
$('#pause').click(function(){
  audio.pause();
  $('#pause').hide();
  $('#play').show();
});
  
//Stop Button
$('#stop').click(function(){
  audio.pause();    
  audio.currentTime = 0;
  $('#pause').hide();
  $('#play').show();
  $('#duration').fadeOut(400);
});

//Next Button
$('#next').click(function(){
    audio.pause();
    var next = $('#playlist li.active').next();
    if (next.length == 0) {
        next = $('#playlist li:first-child');
    }
    initAudio(next);
  audio.play();
  showDuration();
});

//Prev Button
$('#prev').click(function(){
    audio.pause();
    var prev = $('#playlist li.active').prev();
    if (prev.length == 0) {
        prev = $('#playlist li:last-child');
    }
    initAudio(prev);
  audio.play();
  showDuration();
});

//Playlist Song Click
$('#playlist li').click(function () {
    audio.pause();
    initAudio($(this));
  $('#play').hide();
  $('#pause').show();
  $('#duration').fadeIn(400);
  audio.play();
  showDuration();
});



//Progress Bar Click
$('#progressBar').mouseup(function(e){
    var leftOffset = e.pageX - $(this).offset().left;
    var songPercents = leftOffset / $('#progressBar').width();
    audio.currentTime = songPercents * audio.duration;
    initAudio(next);
  audio.play();
  showDuration();
});


//Volume Control
$('#volume').change(function(){
  audio.volume = parseFloat(this.value / 10);
});


   //Time Duration
function showDuration(){
  $(audio).bind('timeupdate', function(){
    //Get hours and minutes
    var s = parseInt(audio.currentTime % 60);
    var m = parseInt((audio.currentTime / 60) % 60);
    //Add 0 if seconds less than 10
    if (s < 10) {
      s = '0' + s;
    }
    $('#duration').html(m + '.' + s); 
    var value = 0;
    if (audio.currentTime > 0) {
      value = Math.floor((100 / audio.duration) * audio.currentTime);
    }
    $('#progress').css('width',value+'%');
  //Playing next soung
  if (audio.currentTime >= audio.duration) 
  {
   audio.pause();
     var next = $('#playlist li.active').next();
   if (next.length == 0) {
      next = $('#playlist li:first-child');
   }
   initAudio(next);
   audio.play();
   showDuration();  
   }
  });
}
</script>

  <?php endif; ?> 
<!-- DataBase Ends -->
<!-- For Search Box    -->
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch2.php?q="+str,true);
  xmlhttp.send();
}
</script>
</body>
 </html>