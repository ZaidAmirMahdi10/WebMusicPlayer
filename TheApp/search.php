<?php
     include 'connect.php';
?>

<style type="text/css">
  a{
    color: black;  
    text-decoration: none !important;
    text-transform: capitalize;

  }
  a:hover { 
    
}
</style>

<?php 
if (isset($_POST['searchItem'])) {
      $search = mysqli_real_escape_string($con, $_POST['searchItem']);
      $sql = "SELECT * FROM album WHERE album_name LIKE '%$search%'"; 
      $result = mysqli_query($con, $sql);
      $queryResult = mysqli_num_rows($result);
  
      if ($queryResult > 0) {
          while ($row = mysqli_fetch_assoc($result)){

            echo "<div><a href='MusicPlayer.php?id=".$row['album_id']."'>
                            <p>".$row['album_name']."</p></a></div>";
                            }
          } else {
            echo "There are no results matching your search!";
            }
     }


 ?> 

