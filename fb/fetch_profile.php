<?php
session_start();
$host='localhost';
$conn=mysqli_connect($host,'root','','exp2');
$person_name = $_SESSION["user"];
$sql = "SELECT * FROM users WHERE Name = '$person_name'";
$files=glob("images/*.*");
$result = mysqli_query($conn, $sql);
mysqli_query($conn,$sql);
if (mysqli_connect_error()){
    die('connection failed');
}
mysqli_close($conn);
?>
<head>
    <style>
        td{
            text-align:center;
        }
    </style>
</head>
<body>
<table align=center cellspacing=0 cellpadding=10 style="border: 2px solid black; background-color:white;color: darkblue; font-size:30px;border-radius: 30px;"> 
<?php
while ($row = mysqli_fetch_assoc($result)) 
{
    echo '<br><br>';
    echo '<tr><td colspan=2 ><div style="border:5px solid grey; width: 250px;margin-left:15%; margin-top:10%;"><img src="' . $row['image'] . '"align=center alt="User Image" width="250" height=150></div><br></tr></td>';
    echo "<tr><td> Name: " . $row["Name"] . "</td></tr>";
    echo "<tr><td> User name: " . $row["User name"] . "</td></tr>";
    echo "<tr><td> Date of Birth: " . $row["DOB"] . "</td></tr>";
    echo "<tr><td> Gender: " . $row["Gender"] . "</td></tr>";
    echo "<tr><td> Email id: ". $row["Email"] . "<br></td></tr>";
      
}
?>
</table>
</body>