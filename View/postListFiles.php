<!-------------------------- PHP ------------------------------------>
<?php
$file = fopen("file.txt", "w+");
$incre = 1;
if ($file) {
    fwrite($file, "{$_GET['textArea']},{$_GET['userName']},{$_GET['comment']} \n");
} else {
    echo "File is not exist";
}
// file_put_contents("file.txt","{$_GET['textArea']},{$_GET['userName']},{$_GET['comment']} \n",FILE_APPEND);

?>

<!-------------------------- HTML ----------------------------------->
<html>

<head>
    <title>Form</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />

</head>

<body>

    <div class="container col-8 offset-2 mt-5">



        <?php
        echo "<h3 class='alert alert-info'>Welcome " .$_GET['name'] . "</h3>";
        ?>




        <!-- Posts -->
        <div class="row col-12">
            <p class="h2 alert alert-danger">Posts</p>
        </div>
        <div class="text-justify row">
            <div class="col-8">
                <p>
                    <?php
                    fseek($file, 0);
                    echo "<h3>" . fgetcsv($file, ",")[1] . "</h3>";
                    ?>
                </p>
            </div>
            <div class="col-4">
                <input type="submit" value="Edit" href="" class="btn btn-success btn-lg m-3">
                <input type="submit" value="Delete" href="" class="btn btn-danger btn-lg m-3">
            </div>
        </div>
        <!-- User -->
        <div class="row col-12">
            <p class="h2 alert alert-danger">User</p>
        </div>
        <div class="text-justify row">
            <div class="col-8">
                <p>
                    <?php
                    fseek($file, 0);
                    echo "<h4>" . fgetcsv($file)[2] . "</h4>";
                    ?>
                </p>
            </div>
        </div>
        <!-- Comments -->
        <div class="row col-12">
            <p class="h2 alert alert-danger">Comments</p>
        </div>
        <div class="text-justify row">
            <div class="col-8">
                <p>
                    <?php
                    fseek($file, 0);
                    echo "<h5>" . fgetcsv($file)[3] . "</h5>";
                    ?>
                </p>
            </div>
        </div>
        <div>
            <button class="fa fa-thumbs-up fa-lg btn-primary rounded pl-5 pr-5 pt-2 pb-2"></button>
        </div>
        <br>
        <!-- Comments -->
        <!-- <div>
            <p class="h2 alert alert-info fa fa-comment-alt fa-lg">Comment</p>
        </div> -->

        <!-- <div>
            <input type="text" name="comment" class="col-6">
            <input type="button" value="Edit" class="col-2 btn btn-success btn-lg">
            <input type="button" value="Delete" class="col-2 btn btn-success btn-lg">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Comment</span>
            </div>
            <textarea class="form-control" aria-label="With textarea"></textarea>
        </div> -->
        <form action="comment.php" method="get">
            <div class="input-group mb-3">
                <input type="text" name="comment" class="form-control" placeholder="User Comment" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary fa-lg fa fa-comment" type="submit" id="button-addon2">Add Comment</button>
                </div>
            </div>
        </form>



        <!-- <?php
                echo "<textarea class='alert alert-info' disabled>" . $_GET['textArea'] . "</textarea>";
                ?> -->



        <br>
        <br>
        <br>
    </div>
    <script src="js/bootstrap.js"></script>
</body>

</html>