<!-------------------------- PHP ------------------------------------>
<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "facebook");
if ($connect) {
    $result = mysqli_query($connect, "SELECT p.id as postId , p.content as postContent , p.imgname as postImgname , u.id as userID , username FROM posts AS p INNER JOIN users AS u ON p.userId = u.id");
}

?>

<!-------------------------- HTML ----------------------------------->
<html>

<head>
    <title>Form</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <style>
        * {
            user-select: none;
        }

        #card-header a {
            float: right;
            margin-left: 10px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-------------------- NavBar -------------------->
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

    <div class="container col-10 offset-1 mt-2">
        <div class="container col-12">
            <!-------------------------- Add post ------------------------->
            <div class="container">
                <p class="h3 alert alert-dark text-center">Add Post</p>
                <form action="../Controller/postController.php" method="POST" enctype="multipart/form-data">
                    <textarea name="content" placeholder="Write your post here..." class="rounded col-7" cols="30" rows="4"></textarea>
                    <label for="file" class="m-2">Upload photo</label>
                    <input type="file" name="postImage">
                    <input type="submit" name="addPost" value="Add Post" class="mt-2 form-control  btn btn-success btn-lg">
                </form>
            </div>
            <!-------------------------- Post Lists ----------------------->
            <div class="container">
                <p class="h3 alert alert-dark text-center">Posts</p>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div id="postList">
                        <div class="card border-info mb-3">
                            <!-- Card Header -->
                            <div class="card-header h2 bg-info" id="card-header">
                                <?php
                                echo $row['username'];
                                if ($row['userID'] == $_SESSION['userId']) {
                                    echo "
                                    <a href='postDelete.php?id= {$row['postId']}' class='btn btn-danger col-2'>Delete</a>
                                    <a href='postEdit.php?id= {$row['postId']}' class='btn btn-success col-2'>Edit</a>
                                    ";
                                }

                                ?>
                            </div>
                            <!-- Card Content -->
                            <div class="card-body ">
                                <div class="card-text">
                                    <?php

                                    echo "<pre>";
                                    echo $row['postContent'];
                                    echo "<br>";
                                    echo $row['postImgname'];
                                    echo "</pre>";

                                    ?>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">Comment</div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>


            <form action="comment.php" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="comment" class="form-control" placeholder="User Comment" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary fa-lg fa fa-comment" type="submit" id="button-addon2">Add Comment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>

</html>