<?php
$con=mysqli_connect("localhost","root","","exp2");
$n=$_POST["nm"];
$un=$_POST["un"];
$e=$_POST["em"];
$p=$_POST["pwd"];
$db=$_POST["dt"];
$ge=$_POST["gn"];
$imtemp=$_FILES['image']['tmp_name'];
$imname=$_FILES['image']['name'];
$imtype=$_FILES['image']['type'];
$file_sep=explode('.',$imname);
$file_ext=strtolower($file_sep[1]);
$ext=array('jpeg','jpg','png','gif');
if(in_array($file_ext,$ext)){
    $uploadimg='images/'.$imname;
    move_uploaded_file($imtemp,$uploadimg);


$query="INSERT INTO users VALUES ('$n','$un','$e','$p','$db','$ge','$uploadimg')";
$res=mysqli_query($con,$query);
if($res){
        echo "<script>alert('registered Successfully...')</script>";
        header('Location:login.html');
}
else{
        echo "<script>alert('registration Falied...')</script>";
        header('Location:register.html');
}}
else{
    echo"Error adding record: ".mysqli_error($con);
}
mysqli_close($con);
?>