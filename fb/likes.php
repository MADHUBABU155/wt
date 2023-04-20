<?php
if (isset($_POST['photo'])) {
    $image_id = $_POST['photo'];
    $conn = mysqli_connect('localhost', 'root', '', 'exp2');
    if (mysqli_connect_error()) {
        die('connection failed');
    }
    $sql = "UPDATE images SET Likes = Likes + 1 WHERE id = '$image_id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>