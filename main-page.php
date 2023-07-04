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

    <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <div class="item-container">
        <?php
        // Example data for item container
        $items = [
            ['title' => 'Item 1', 'description' => 'This is item 1.'],
            ['title' => 'Item 2', 'description' => 'This is item 2.'],
            ['title' => 'Item 3', 'description' => 'This is item 3.'],
        ];

        // Loop through items and display them
        foreach ($items as $item) {
            echo '<div class="item">';
            echo '<h2>' . $item['title'] . '</h2>';
            echo '<p>' . $item['description'] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
