<?php
$conn = mysqli_connect('localhost', 'root', '', 'exp2');
if (mysqli_connect_error()) {
    die('connection failed');
}
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);
echo '<table align="center" cellspacing=0 cellpadding="20" style="color: darkblue; font-size:30px">';
echo '<style>';
echo 'td { padding-left: 100px; padding-right: 100px; }';
echo '</style>';
$count = 0;
while ($row = mysqli_fetch_assoc($result)) {
    if ($count % 2 == 0) {
        echo '<tr>';
    }
    echo '<td align="center">';
    echo "<div style='border:5px solid grey; '>";
    echo '<img src="' . $row['image'] . '" align="center" alt="User Image" width="250" height="150">';
    echo "</div>";
    echo '<h6 style="margin-top:0px;"> Uploaded by '.$row['user'].'</h6>';
    
    echo '<form action="likes.php" method="post">';
    echo '<input type="hidden" name="photo" value="' . $row['id'] .'" style="width: 0px;">';
    echo '<input style="margin-top: -40px;color:blue;" type="submit" value="&#x1F44D">';
    echo '</form>';
    echo '<br><h6 style="margin-top:-70px;">Likes: ' . $row['Likes'] .'</h6>';
    echo '</td>';
    $count++;
    if ($count % 2 == 0) {
        echo '</tr>';
    }
}
if ($count % 2 != 0) {
    echo '<td></td>';
    echo '</tr>';
}
echo '</table>';
mysqli_close($conn);
?>