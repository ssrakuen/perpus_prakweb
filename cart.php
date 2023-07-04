<?php
session_start();

// Check if the cart array is initialized in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to retrieve book details from the database based on book IDs
function getBooksFromCart($bookIds) {
    // Connect to the database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'dbperpus';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    }

    // Escape and quote book IDs for the query
    $escapedBookIds = array_map(function($id) use ($conn) {
        return mysqli_real_escape_string($conn, $id);
    }, $bookIds);
    $quotedBookIds = "'" . implode("','", $escapedBookIds) . "'";

    // Fetch books from the database based on the book IDs
    $query = "SELECT * FROM buku WHERE id IN ($quotedBookIds)";
    $result = mysqli_query($conn, $query);

    // Store the book details in an array
    $books = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }

    // Close the database connection
    mysqli_close($conn);

    return $books;
}

// Handle remove book from cart action
if (isset($_POST['remove_from_cart']) && isset($_POST['book_id'])) {
    $bookId = $_POST['book_id'];
    if (($key = array_search($bookId, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

// Retrieve book details for the books in the cart
$booksInCart = getBooksFromCart($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart Page</title>
    <style>
        .item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Cart Page</h1>

    <div class="item-container">
        <?php
        // Display books in the cart
        foreach ($booksInCart as $book) {
            echo '<div class="item">';
            echo '<h2>' . $book['judul'] . '</h2>';
            echo '<p>' . $book['sinopsis'] . '</p>';
            echo '<form method="POST" action="cart.php">';
            echo '<input type="hidden" name="book_id" value="' . $book['id'] . '">';
            echo '<button type="submit" name="remove_from_cart">Remove from Cart</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
