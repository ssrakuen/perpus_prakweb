<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'dbperpus');

if (isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row && isset($row['email']) && $row['email'] != "") {
        // Successful login
        $_SESSION['email'] = $row['email'];
        $_SESSION['status'] = $row['Status'];
        $_SESSION['user_id'] = $row['id']; // Add this line to store the user ID in the session
        header("Location: main-page.php");
        exit();
    } else {
        // Failed login
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="login.php">
        <p>
            email: <input type="text" name="email"><br>
            password: <input type="password" name="password"><br>
            <input type="submit" name="submit" value="Login">
        </p>
        <div class="register">
            <p>Belum punya akun? Daftar sekarang <a href="register.php">di sini</a></p>
        </div>
    </form>
</body>
</html>
