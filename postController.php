<?php
session_start();
$errorArray = [];
//--------------- Connect DB --------------------------
$connect = mysqli_connect("localhost", "root", "", "facebook");

if (isset($_POST['addPost'])) {
    if ($connect) {
        if (!isset($_POST['content']) || empty($_POST['content'])) {
            $errorArray[] = "content";
        }

        // if (!isset($_POST['postImage']) || empty($_POST['postImage'])) {
        //     $errorArray[] = "postImage";
        // }

        if (count($errorArray) > 0) {
            header("Location:../View/postList.php?error=" . implode(",", $errorArray));
        } else {
            $tmp_file_name = $_FILES["postImage"]["tmp_name"];
            $pic_name = $_FILES["postImage"]["name"];
            move_uploaded_file($tmp_file_name, "../View/publics/" . basename($pic_name));

            $content = mysqli_escape_string($connect, $_POST['content']);
            $userId = $_SESSION["userId"];
            $result = mysqli_query(
                $connect,
                "INSERT INTO posts SET
                content = '$content',
                userId = '$userId',
                imgname = '{$pic_name}'"
            );
            if ($result) {
                header("Location:../View/postList.php");
            } else {
                echo "Error in adding post !!!";
            }
        }
    }
} else if (isset($_POST['updatePost'])) {
    $content = mysqli_escape_string($connect, $_POST['content']);
    $tmp_file_name = $_FILES["postImage"]["tmp_name"];
    $pic_name = $_FILES["postImage"]["name"];
    move_uploaded_file($tmp_file_name, "../View/publics/" . basename($pic_name));

    $result = mysqli_query($connect, "
    update posts set
    content ='$content',
    imgname = '$pic_name'
    where id='{$_POST['id']}'
    ");
    if ($result) {
        header("Location:../View/postList.php");
    } else {
        echo "Error";
    }
}
