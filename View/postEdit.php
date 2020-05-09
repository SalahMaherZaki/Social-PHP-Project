<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "facebook");
if (isset($_GET['id'])) {
    if ($connect) {
        $res =  mysqli_query($connect, "SELECT * from posts where id= {$_GET['id']}");
        if ($res) {
            $postData = mysqli_fetch_assoc($res);
        }
    }
}


$errordata = [];
if (isset($_GET["error"]))
    $errordata = explode(',', $_GET["error"]);
?>
<html>

<head>
    <title>Edit Post</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <style>
        span {
            color: red
        }
    </style>
</head>

<body>
    <!------------------- NavBar ---------------------->
    <nav class="navbar navbar-light bg-info">
        <label class="navbar-brand" href="#">
            <img src="images/download.png" width="30" height="30" class="rounded d-inline-block align-top" alt="">
            <label for="" class="h4 ml-2">Welcome <?php
                                                    if ($_SESSION['isLogged']) {
                                                        echo $_SESSION['userName'];
                                                    } else {
                                                        header("Location:login.php");
                                                    }
                                                    ?></label>
        </label>
        <a href="../Controller/userController.php" class="btn btn-warning my-2 my-sm-0">Logout</a>
    </nav>
    <!------------------ PostEdit Form  --------------->
    <div class="container mt-5 col-8">
        <p class="h3 alert alert-primary text-center">Edit Post</p>
        <form action="../Controller/postController.php" method="POST" enctype="multipart/form-data">
            <textarea name="content" value="<?php echo $postData['content'] ?>" class="rounded col-6" cols="30" rows="4"></textarea>
            <!-- <span> <?php if (in_array("content", $errordata)) echo "  **Content is empty"; ?></span> -->

            <label for="file" class="m-2">Upload photo</label>
            <input type="file" name="postImage" value="<?php echo $postData['postImage'] ?>">

            <input type="hidden" name="id" value="<?php echo $postData['id'] ?>">
            <input type="submit" name="updatePost" value="Edit Post" class="mt-2 form-control  btn btn-success btn-lg">
        </form>
    </div>
</body>


</html>