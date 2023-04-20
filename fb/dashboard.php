<html>
    <head>
        <style>        
            .d1{
                background-color: #CBF6FF;
                width: 1490px;
           height:25px;
                padding: 10px;
           margin-right: 10px;
           text-align: justify;
           border-radius: 30px;
            }
            .d2{
           background-color: #CBF6FF;
           width: 230px;
           height: 660px;
           float: left;
           display: block;
           padding: 10px;
           margin-right: 10px;
           text-align: justify;
           border-radius: 30px;
        }
        .d3{
           background-color: #CBF6FF;
           width: 1210px;
           height: 660px;
           float: right;
           display: block;
           padding: 10px;
           text-align: justify;
           border-radius: 30px;
           overflow: auto; 
        }
        </style>

    </head>
    <body>
        <div class="d1">
            <?php
            session_start();
            if(isset($_SESSION['user'])){
              echo '<div style="font-size:1.25em;color:blueviolet;font-weight:bold;text-align:center;">'."Welcome ". $_SESSION["user"]."!";
            }
            else{
              echo '<div style="font-size:1.25em;color:red;font-weight:bold;text-align:center;">'."Error No User found";
              header('Location:login.html');
            }
            ?>
        </div>
        <br>
        <div class="d2">
            <center><h3>Contents</h3></center>
  <ul>
      <li><a href="#" onclick="f1()">View Your Profile</a></li>
      <li><a href="#" onclick="f2()">Upload Photos</a></li>  
      <li><a href="#" onclick="f3()">Highly Liked Image</a></li>    
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h3><a href="logout.php" style="margin-left: 40px;">Logout</a></h3>
  </ul>
        </div>
        <div class="d3" id="dv3" style="text-align: center;">
            <script>
                var xhr = new XMLHttpRequest();
xhr.open("GET", "fetch_upload.php");
xhr.onreadystatechange = function() {
  if (this.readyState === 4 && this.status === 200) {
    document.getElementById("dv3").innerHTML = this.responseText;
  }
};
xhr.send();

                </script>
        </div>
    </body>
    <script>
        
        function f1(){
            var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("dv3").innerHTML = xhr.responseText;
            }
        }
        xhr.open("GET", "fetch_profile.php", true);
        xhr.send();
    }

        function f2(){
            var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("dv3").innerHTML = xhr.responseText;
    }
  }
  xhr.open("GET", "upload_photos.html", true);
  xhr.send();
        }
        function f3(){
            var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("dv3").innerHTML = xhr.responseText;
    }
  }
  xhr.open("GET", "high_like.php", true);
  xhr.send();
        }
    </script>
</html>