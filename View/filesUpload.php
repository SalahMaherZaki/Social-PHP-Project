
<?php

if (isset($POST['addPost'])) {
    $dir_to_upload = "publics/posts";
    $tmp_file_name = $_FILES["postImage"]["tmp_name"];
    $pic_name = $_FILES["postImage"]["name"];
    if (move_uploaded_file($tmp_file_name, $dir_to_upload . "/" . basename($pic_name))) {
        header("Location:postList.php");
    } else {
        echo "<pre>";
        var_dump($_FILES["postImage"]);
        echo "</pre>";
        // echo $_FILES["emp_pic"]["error"];
        echo "Error in upload emp pic ....";
        exit;
    }
}
?>