<?php
$conn = mysqli_connect('localhost', 'root', '', 'exp2');
if (mysqli_connect_error()) {
    die('connection failed');
}
$sql = "SELECT * FROM images ORDER BY Likes DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
mysqli_close($conn);
echo "<br><br><br><br><h2>Uploaded by ".$row['user']."</h2><br><div style='border:5px solid grey; width: 500px; margin-left:28%;'><img src='{$row['image']}' alt='User Image' width='500' height='300'></div><br>";
echo "<h2>Likes: ".$row['Likes']."</h2>";
?>