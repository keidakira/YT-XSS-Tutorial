<?php

$con = mysqli_connect("localhost", "root", "", "test");
session_start();

if ($_POST) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT id FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("location: dashboard.php");
    } else
        $msg = "Invalid Username/Password";
} else {
    $msg = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .my-container {
            width: 50%;
            padding: 8%;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="my-container">
        <form action method="POST">
            <input class="form-control" type="text" placeholder="username" name="username" required /><br />
            <input class="form-control" type="password" placeholder="password" name="password" required /><br />
            <p class="text-danger small"><?php echo $msg; ?></p>
            <button class="btn btn-secondary w-100">Login</button>
            <p class="mt-3 small text-center">Don't have an account? <a href="signup.php">Signup</a></p>
        </form>
    </div>
</body>

</html>