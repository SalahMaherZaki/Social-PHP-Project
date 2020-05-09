<html>

<head>
    <title>Register</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
</head>
<body>
    <div class="container col-4 offset-4 mt-5 border-">
        <div>
            <p class="h3 alert alert-danger text-center">Register</p>
        </div>
        <div>
            <form action="../Controller/userController.php" method="POST">
                <img src="images/login1.jpg" class="mx-auto d-block" alt="..." />

                <input type="text" name="userName" class="form-control mt-2" placeholder="Username" required>
                <input type="text" name="email" class="form-control mt-2" placeholder="Email" required>
                <input type="password" name="password" id="" class="form-control mt-2" placeholder="Password" required>
                
                <input type="submit" name="register" value="Register" class="mt-2 form-control  btn btn-info btn-lg">
                <a href="login.php" class="mt-2 form-control  btn btn-success btn-lg">Login</a>
            </form>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>

</html>