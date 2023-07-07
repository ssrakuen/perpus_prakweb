<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or perform any other action
    header("Location: login.php");
    exit(); // Make sure to exit after redirecting
}

// Check if the cart array is initialized in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dbperpus';

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

// Function to retrieve book details from the database based on book IDs
function getBooksFromCart($bookIds, $conn) {
    // Escape and quote book IDs for the query
    $escapedBookIds = array_map(function($id) use ($conn) {
        return mysqli_real_escape_string($conn, $id);
    }, $bookIds);
    $quotedBookIds = "'" . implode("','", $escapedBookIds) . "'";

    // Fetch books from the database based on the book IDs
    $query = "SELECT b.*, p.tanggal FROM buku AS b JOIN pinjam AS p ON b.id = p.id_buku WHERE b.id IN ($quotedBookIds)";
    $result = mysqli_query($conn, $query);

    // Store the book details in an array
    $books = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }
    return $books;
}

// Handle remove book from cart action
if (isset($_POST['remove_from_cart']) && isset($_POST['book_id'])) {
    $bookId = $_POST['book_id'];
    if (($key = array_search($bookId, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);

        // Delete the book from the pinjam table
        $deleteQuery = "DELETE FROM pinjam WHERE id_buku = '$bookId'";
        mysqli_query($conn, $deleteQuery);
    }
}

// Retrieve book details for the books in the cart
$booksInCart = getBooksFromCart($_SESSION['cart'], $conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart Page</title>
    <link rel="stylesheet" href="./style/cart.css">
</head>
<body>
    <div class="title">
        <h1>Cart Page</h1>
    </div>

    <div class="item-container">
        <?php
        // Display books in the cart
        foreach ($booksInCart as $book) {
            echo '<div class="item">';
            echo '<h2>' . $book['judul'] . '</h2>';
            echo '<p>Book Id: ' . $book['id'] . '</p>';
            echo '<img src="' . $book['cover'] . '" alt="Book cover" width="200" height="250">';
            echo '<p>Genre: ' . $book['genre'] . '</p>';
            echo '<p>Tanggal pinjam: ' . $book['tanggal'] . '</p>';
            echo '<form method="POST" action="cart.php">';
            echo '<input type="hidden" name="book_id" value="' . $book['id'] . '">';
            echo '<button type="submit" name="remove_from_cart">Remove from Cart</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>
    <div class="back">
        <a href="main-page.php">Back to main page</a>
    </div>
</body>
</html>
