<?php
include 'db_config.php';  // Ensure your DB config file is included

$category = "Science";  // Set the category you want to display

// Prepare and execute the query
$stmt = $conn->prepare("SELECT name, author, image FROM books WHERE category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='book'>";
        echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
        echo "<h4>" . htmlspecialchars($row['name']) . "</h4>";
        echo "<p>Author: " . htmlspecialchars($row['author']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No books found in the '" . htmlspecialchars($category) . "' category.</p>";
}

$stmt->close();
$conn->close();
?>
