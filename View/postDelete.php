<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "facebook");
if (isset($_GET['id'])) {
    if ($connect) {
        $res =  mysqli_query($connect, "DELETE FROM posts WHERE id = {$_GET['id']}");
        // var_dump($_GET['id']);
        // echo "<br>";
        // var_dump($res);
        if ($res) {
            header("Location:postList.php");
        }
    } else {
        echo "Error in delete";
    }
}
