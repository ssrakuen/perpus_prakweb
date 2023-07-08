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
    <link rel="stylesheet" href="./style/login.css">
</head>
<body>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <div class="login-container">
        <form method="post" action="index.php">
            <h1>Login</h1>
            <div class="login-input">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="login-input">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
        <div class="atau">
            <p>Belum punya akun? Daftar sekarang <a href="register.php">di sini</a></p>
        </div>
    </div>
</body>
</html>
