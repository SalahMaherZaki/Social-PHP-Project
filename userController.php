<?php
session_start();
$errorArray = [];
// ----------------- Connect DB ----------------
$connect = mysqli_connect("localhost", "root", "", "facebook");
// ---------------- Registeration -------------
if (isset($_POST['register'])) {
    if ($connect) {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $errorArray[] = "email";
        }

        if (!isset($_POST['userName']) || empty($_POST['userName'])) {
            $errorArray[] = "userName";
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $errorArray[] = "password";
        }


        if (count($errorArray) > 0) {
            header("Location:../View/register.php?error=" . implode(",", $errorArray));
        } else {
            $userName = mysqli_escape_string($connect, $_POST['userName']);
            $email = mysqli_escape_string($connect, $_POST['email']);
            $password = mysqli_escape_string($connect, $_POST['password']);

            $result = mysqli_query(
                $connect,
                "INSERT INTO users SET
                username = '$userName',
                email = '$email',
                pass = md5('$password')"
            );
            $userId = $connect->insert_id;
            if ($result) {
                $_SESSION['userName'] = $userName;
                $_SESSION['userId'] = $userId;
                $_SESSION['isLogged'] = true;
                header("Location:../View/postList.php");
            } else {
                echo "Duplicate Username !!!";
            }
        }
    }
}
// ---------------- Login --------------------
else if (isset($_POST['login'])) {
    $userName = mysqli_escape_string($connect, $_POST['userName']);
    $password = mysqli_escape_string($connect, $_POST['password']);

    $result = mysqli_query($connect, "
    select *
    from users
    where username = '$userName' and pass = md5('$password')");
    $userId = mysqli_fetch_assoc($result)['id'];
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['userName'] = $userName;
        $_SESSION['userId'] = $userId;
        $_SESSION['isLogged'] = true;
        header("Location:../View/postList.php");
    } else {
        header("Location:../View/login.php");
    }
}
// ---------------- Logout --------------------
else if (isset($_GET)) {
    session_destroy();
    header("Location:../View/login.php");
}
?>
