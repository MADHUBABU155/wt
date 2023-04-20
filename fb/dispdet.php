<?php
 session_start();
 if(isset($_SESSION['user'])){
   echo "<center><h1>Name:". $_SESSION["user"]."</h1></center>";
   echo "<center><h1>Email:". $_SESSION["em"]."</h1></center>";
   echo "<center><h1>Password:". $_SESSION["pw"]."</h1></center>";
 }
 else{
  header('Location:login.html');
 }
  ?>