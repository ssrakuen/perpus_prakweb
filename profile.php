<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or perform any other action
    header("Location: login.php");
    exit(); // Make sure to exit after redirecting
}

// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dbperpus';

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

// Retrieve user data from the user table
$userId = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE id = $userId";
$result = mysqli_query($conn, $query);

// Check if the user exists
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo 'User not found.';
}

// Handle the form submission for updating user data
if (isset($_POST['update_profile'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    // Update the user data in the user table
    $updateQuery = "UPDATE user SET email = '$email', nama = '$nama', prodi = '$prodi' WHERE id = $userId";
    mysqli_query($conn, $updateQuery);

    // Refresh the user data
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <link rel="stylesheet" href="./style/profile.css">
</head>
<body>
    <div class="navbar">
        <div class="brand">
            <a href="main-page.php">
                <h1>ApaBenar Perpustakaan</h1>
            </a>
        </div>
        <div class="links">
            <div class="profile">
                <a href="profile.php">Profile</a>
            </div>
            <div class="cart">
                <a href="cart.php">Go to Cart</a>
            </div>
            <div class="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Profile</h1>
        <form method="POST" action="profile.php">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required>

            <label>Program of Study (Prodi):</label>
            <input type="text" name="prodi" value="<?php echo $user['prodi']; ?>" required>

            <button type="submit" name="update_profile">Update Profile</button>
        </form>
    </div>
</body>
</html>
