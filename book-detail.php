<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or perform any other action
    header("Location: index.php");
    exit(); // Make sure to exit after redirecting
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Book Detail</title>
    <link rel="stylesheet" href="./style/book-detail.css">
</head>

<body>
    <div class="container">
        <?php
        // Connect to the database
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'dbperpus';

        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die('Failed to connect to the database: ' . mysqli_connect_error());
        }
        // Retrieve the book ID from the URL parameter
        if (isset($_GET['id'])) {
            $bookId = $_GET['id'];

            // Query the database to fetch the book details based on the book ID
            $query = "SELECT * FROM buku WHERE id = $bookId";
            $result = mysqli_query($conn, $query);

            // Check if the book exists
            if (mysqli_num_rows($result) > 0) {
                // Fetch the book details
                $book = mysqli_fetch_assoc($result);

                // Display the book details
                echo '<div class="book-details">';
                echo '<div class="book-cover">';
                echo '<img src="' . $book['cover'] . '" alt="Book cover">';
                echo '</div>';
                echo '<div class="book-info">';
                echo '<h1>' . $book['judul'] . '</h1>';
                echo '<p>Nama Penulis: ' . $book['nama_penulis'] . '</p>';
                echo '<p>Genre: ' . $book['genre'] . '</p>';
                echo '<p>Tahun Terbit: ' . $book['tahun_terbit'] . '</p>';
                echo '<p>Penerbit: ' . $book['penerbit'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="synopsis">';
                echo '<h2>Sinopsis</h2>';
                echo '<p>' . $book['sinopsis'] . '</p>';
                echo '</div>';
            } else {
                echo 'Book not found.';
            }
        }

        mysqli_close($conn);
        ?>
    </div>
</body>

</html>