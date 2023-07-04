<?php
session_start();

// Check if the cart array is not already initialized in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to check if a book is already in the cart
function isBookInCart($bookId) {
    return in_array($bookId, $_SESSION['cart']);
}

// Add a book to the cart
function addToCart($bookId) {
    if (!isBookInCart($bookId)) {
        $_SESSION['cart'][] = $bookId;
    }
}

// Remove a book from the cart
function removeFromCart($bookId) {
    $index = array_search($bookId, $_SESSION['cart']);
    if ($index !== false) {
        array_splice($_SESSION['cart'], $index, 1);
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
$query = 'SELECT * FROM buku';
$result = mysqli_query($conn, $query);

// Handle the add to cart form submission
if (isset($_POST['add_to_cart'])) {
    if (isset($_POST['book_id'])) {
        $bookId = $_POST['book_id'];
        addToCart($bookId);
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
    <style>
        .item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Main Page</h1>

    <form action="main-page.php" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <div class="item-container">
        <?php
            // Display books
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="item">';
                echo '<h2>' . $row['judul'] . '</h2>';
                echo '<img src="' . $row['cover'] . '" alt="Girl in a jacket" width="250" height="300">';
                echo '<p>' . $row['sinopsis'] . '</p>';
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
            // Cart button
            echo '<a href="cart.php">Go to Cart</a>';
        ?>
    </div>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
