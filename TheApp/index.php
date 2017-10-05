
<title>MyMusiCSite</title>
<!-- Side Navigation -->
<?php include 'header.php';?>
<!-- Side Navigation -->
<?php include 'SideNavigation.php';?>
<!--Body content-->
<div class="content">
 </br></br></br></br></br>
  <div class="top-bar">       
   <a href="#menu" class="side-menu-link burger"  style=" z-index: 0;"> 
    <span class='burger_inside' id='bgrOne' style="margin-left: 10px;"></span>
    <span class='burger_inside' id='bgrTwo' style="margin-left: 10px;"></span>
    <span class='burger_inside' id='bgrThree' style="margin-left: 10px;"></span>
   </a>      
  </div>  
 <section class="content-inner">
  <div class="container-fluid active">
   <div style="float: left; margin-left: 0px; margin-right: 70px;">
    <div class="row" style="background-color: white;">
     <div class="col-lg-12">
      <h1 class="page-header">Music Gallery</h1>
     </div>
     <div>
      <?php
      $sql = "SELECT * FROM album";
      $result = mysqli_query($con, $sql);
      $queryResults = mysqli_num_rows($result);
       if ($queryResults > 0) {
        while ($row = mysqli_fetch_assoc($result)){
         echo "<div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                <a class='thumbnail' href='MusicPlayer.php?id=".$row['album_id']."'>
                 <img class='img-responsive' src='".$url.$img_path.$albums_folder.$row['album_id'].'.png'."'>
                </a>
               </div>";
           }
       }
      ?> 
     </div>
    </div>   
   </div>  
  </div> 
 </section>
</div>
</body>
</html>