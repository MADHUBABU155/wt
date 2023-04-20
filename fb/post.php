<?php 
    session_start();
    $uname=$_SESSION["user"];
    $lk=0;
    $con=mysqli_connect("localhost","root","","exp2");
    $imtemp=$_FILES['photo']['tmp_name'];
    $imname=$_FILES['photo']['name'];
    $imtype=$_FILES['photo']['type'];
    $file_sep=explode('.',$imname);
    $file_ext=strtolower($file_sep[1]);
    $ext=array('jpeg','jpg','png','gif');

    if(in_array($file_ext,$ext)){
        $uploadimg='images/'.$imname;

        $sql="INSERT INTO images VALUES(NULL,'$uploadimg','$lk','$uname')";
        $res=mysqli_query($con,$sql);
        header("Location:dashboard.php");
    } else {
        echo "Invalid file type.";
    }
?>