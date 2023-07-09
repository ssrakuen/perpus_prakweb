<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or perform any other action
    header("Location: index.php");
    exit(); // Make sure to exit after redirecting
}

// Check if the cart array is not already initialized in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to check if a book is already in the cart
function isBookInCart($bookId) {
    return in_array($bookId, $_SESSION['cart']);
}

// Add a book to the cart
function addToCart($bookId, $conn) {
    if (!isBookInCart($bookId)) {
        $_SESSION['cart'][] = $bookId;
        $userId = $_SESSION['user_id']; // Use the user ID from the session
        $date = date('Y-m-d');
        $insertQuery = "INSERT INTO pinjam (tanggal, id_buku, id_user) VALUES ('$date', '$bookId', '$userId')";
        mysqli_query($conn, $insertQuery);
    }
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

// Fetch books from the database
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $query = "SELECT * FROM buku WHERE judul LIKE '%$searchQuery%' OR genre LIKE '%$searchQuery%'";
} else {
    $query = 'SELECT * FROM buku';
}

$result = mysqli_query($conn, $query);


// Handle the add to cart form submission
if (isset($_POST['add_to_cart'])) {
    if (isset($_POST['book_id'])) {
        $bookId = $_POST['book_id'];
        addToCart($bookId, $conn); // Pass the $conn variable to the function
        header("Location: main-page.php");
        exit();
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" href="./style/main-page.css">
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

    <form action="main-page.php" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <div class="item-container">
        <?php
            // Display books
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="book-detail.php?id=' . $row['id'] . '">';
                echo '<div class="item">';
                echo '<h2>' . $row['judul'] . '</h2>';
                echo '<img src="' . $row['cover'] . '" alt="Book cover" width="250" height="300">';
                echo '<p>Genre: ' . $row['genre'] . '</p>';
                echo '<form method="POST" action="main-page.php">';
                echo '<input type="hidden" name="book_id" value="' . $row['id'] . '">';
                if (isBookInCart($row['id'])) {
                    echo '<button disabled>Added to Cart</button>';
                } else {
                    echo '<button type="submit" name="add_to_cart">Add to Cart</button>';
                }
                
                echo '</form>';
                echo '</div>';
            }
        ?>
    </div>

</body>
</html>
