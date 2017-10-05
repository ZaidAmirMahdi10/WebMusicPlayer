<!-- Search Box Starts -->
<div class="container">  
 <br/> 
  <form action="search.php" method="POST">
   <div class="form-group">  
    <div class="input-group">  
     <span type="submit" name="submit-search" class="input-group-addon">Search</span>   
      <input type="text" name="Item" id="Item" class="form-control" placeholder="The Biggest Sound Library In The World"/>  
     </div> 
    <div id="ItemList" class="search-results"></div> 
   </div> 
  </form> 
</div>  
<!-- Search Box Ends -->
<script>  
 $(document).ready(function(){  
      $('#Item').keyup(function(){  
           var searchItem = $(this).val();  
           if(searchItem != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{searchItem:searchItem},  
                     success:function(data)  
                     {  
                          $('#ItemList').fadeIn();  
                          $('#ItemList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#Item').val($(this).text());  
           $('#ItemList').fadeOut();  
      });  
 });  
 </script>  



















































<!-- For Search Box    
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
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>



<!-- Search Box Starts 
          <div class="container">  
              <br/> <form>
               <div class="form-group">  
                      <div class="input-group">  
                          <span class="input-group-addon">Search</span>  
                        <input type="text" name="inputValue" id="inputValue" class="form-control" placeholder="The Biggest Sound Library In The World" onkeyup="showResult(this.value)"> 
                     </div>  
               
<!-- Search results container Starts 
      <div id="livesearch" class="search-results">
      </div> 
<!-- Search results container Ends 
            </div> </form> 
          </div>  


<!-- Search Box Ends -->