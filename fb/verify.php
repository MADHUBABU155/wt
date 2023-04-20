<?php
session_start();
$con=mysqli_connect("localhost","root","","exp2");
$e=$_POST["em"];
$p=$_POST["pwd"];
$_SESSION['em']=$e;
$_SESSION['pw']=$p;
$query="SELECT * from users where Email='$e' and Password='$p'";
$res=mysqli_query($con,$query);
if(mysqli_num_rows($res)==1){
    while($r=mysqli_fetch_array($res)){
        $_SESSION['user']=$r[0];
    }
    header('Location:dashboard.php');
}
else{
    echo "alert('Invalid Email/Password')";
    header('Location:login.html');
}
?>