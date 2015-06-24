<!DOCTYPE html>
<html>
  <head>
    <title>Local Pages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>
      
      #custom-btn{
        width: 100px;
        height: 20px;
      }

      #ajax2{
        border: 1px solid rgba(215, 213, 212, 0.48);
        text-align:center;
        background-color: #D2322C;
        color: #fff;
        border-radius: 50px;
      }

    </style>
  </head>
  <body>
    <div data-role="page">
      <div data-role="header" style="background-color:#fff;">
        <center>
        	<img src="images/logo.png">
        </center>
      </div>
      <div data-role="main" class="ui-content" style="background-color:rgba(215, 213, 212, 0.48);color:black;">
        <form>
         <div class="ui-grid-solo">
            <div class="ui-block-a" >
              <div id="ajax"></div>
            <label for="name">Listing Name</label>
            <input type="text" name="listingname" id="listingname" placeholder="Your Listing Name .."><br>
            <label for="info">Address</label>
            <textarea name="address" id="address" placeholder="Your Address .."></textarea><br> 
            <label for="name">Phone Number</label>
            <input type="text" name="phone" id="phone" placeholder="Your Phone Number .."><br>
            <label for="name">Area</label>
            <input type="text" name="area" id="area" placeholder="Your Area .."><br>
            <label for="name">Category</label>
            <input type="text" name="category" id="category" placeholder="Your Category .."><br>
            <label for="name">Keywords</label>
            <input type="text" name="keywords" id="keywords" placeholder="Your Keywords .."><br>
            <label for="name">camera</label>
            <div>
              <input type="submit" data-inline="true" value="capture"><br><br>
            </div>
            <center>
              <img src="images/logo.png" style="height:150px;width:150px;">
            </center>
            <center>
              <input type="hidden" id="useremail" value="">
              <input type="hidden" id="Lat" value="">
              <input type="hidden" id="Lon" value="">
                <a data-role="button" id="custom-btn" style="background: rgb(4, 114, 76);color: rgb(255, 218, 3);text-shadow: none;">Submit</a>
            </center>
            <br><br><br><br>
          </div>
          </div>
        </form>
      </div> 
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#useremail").val(localStorage.getItem('username'));

      //geocordinates code//

      if (navigator.geolocation) var gl = navigator.geolocation;
      if (gl) {
         gl.getCurrentPosition(function(position) {
            //alert(position.coords.latitude);
            //document.getElementById("Lat").innerHTML = position.coords.latitude;
            var latt = position.coords.latitude;
           
            document.getElementById("Lat").value = latt;
            //alert(position.coords.longitude);
            //document.getElementById("Lon").innerHTML = position.coords.longitude;
            var lont = position.coords.longitude;
            document.getElementById("Lon").value = lont;


          

         }, function(positionError) {
            alert(positionError.message);
         });
      }

        $("#custom-btn").click(function(){
           
            var lname = $("#listingname").val();
            var address = $("#address").val();
            var phone = $("#phone").val();
            var area = $("#area").val();
            var category = $("#category").val();
            var keywords = $("#keywords").val();
            var useremail =  $("#useremail").val();

            //alert(lname);
            //alert(address);
            //alert(phone);
            //alert(area);
            //alert(category);
            //alert(keywords);

            $.post("formprocessing.php",
            {
              email : useremail,
              listingname : lname,
              address: address,
              phone : phone,
              area : area,
              category : category,
              keywords : keywords
            },
            function(data,status){
                
                  $('#ajax').html(data);
                
            });
        });
    });
    </script>  
  </body>
</html>
