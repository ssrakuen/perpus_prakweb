<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'dbperpus');

if (isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : '';
    $prodi = isset($_POST['prodi']) ? $_POST['prodi'] : '';

    $sql = "SELECT * FROM user WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row['email'] != "") {
        // Email already used
        ?>
        <script language="JavaScript">
            alert('Email sudah digunakan. Gunakan email lain.');
            document.location = 'register.php';
        </script>
        <?php
    } elseif ($row['email'] == "") {
        // Successful registration
        $sql = "INSERT INTO user (email, password, nama, prodi) VALUES ('$email','$password','$nama_lengkap','$prodi')";
        $query = mysqli_query($conn, $sql);
        $_SESSION['email'] = $row['email'];
        $_SESSION['status'] = $row['Status'];
        ?>
        <script language="JavaScript">
            alert('User berhasil terdaftar.');
            document.location = 'main-page.php';
        </script>
        <?php
    } else {
        // Registration failed
        ?>
        <script language="JavaScript">
            alert('Registrasi gagal.');
            document.location = 'register.php';
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="./style/register.css">
</head>
<body>
    <div class="register-container">
      <h1>Register</h1>
        <form method="post" action="register.php">
            <div class="register-input">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="register-input">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="register-input">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap">
            </div>
            <div class="register-input">
                <label for="prodi">Prodi:</label>
                <input type="text" name="prodi" id="prodi">
            </div>
            <button type="submit" name="submit">Register</button>
        </form>
      <p>Sudah punya akun? Silakan <a href="login.php">login</a></p>
    </div>
</body>
</html>
