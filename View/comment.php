<html>

<head>
    <title>Form</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
</head>

<body>
    <div class="container col-4 offset-4 mt-5">
        <div>
            <p class="h3 alert alert-danger">Adding post</p>
        </div>
        <div>
            <form action="postListFiles.php" method="GET">
                <input type="text" name="id" class="form-control" placeholder="ID" required>
                <textarea name="textArea" id="" cols="30" rows="10" placeholder="Body"></textarea>
                <input type="text" name="userName" class="form-control" placeholder="Username">
                <input type="text" name="comment" class="form-control" placeholder="Comment">
                <input type="submit" name="add" value="Add" class="mt-2 form-control  btn btn-success btn-lg">
            </form>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>

</html>