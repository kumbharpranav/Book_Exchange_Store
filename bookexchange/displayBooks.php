<?php
include 'db_config.php'; // Assuming this file contains your database connection setup

echo '<h1>Manage Books</h1>';
echo '<a href="addBook.html">Add New Book</a>'; // Link to a form for adding new books
echo '<table border="1">';
echo '<tr><th>Title</th><th>Author</th><th>Published Year</th><th>Price</th><th>Actions</th></tr>';

// Fetch all books from the database
$query = "SELECT  book_id ,name, author, published_year,price FROM books";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['author']) . "</td>
                <td>" . htmlspecialchars($row['published_year']) . "</td>
                <td>" . htmlspecialchars($row['price']) . "</td>
                <td>
                    <a href='updateBook.php?book_id=" . $row['book_id'] . "'>Update</a>
                    <a href='deleteBook.php?book_id=" . $row['book_id'] . "' onclick='return confirm(\"Are you sure you want to delete this book?\")'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No books found</td></tr>";
}
echo '</table>';

$conn->close();
?>
<style>
        /* Basic Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
    padding: 20px;
}

header {
    background: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

h1, h2 {
    margin-bottom: 20px;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: #ffffff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    border-radius: 8px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f8f9fa;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 20px;
    margin: 10px 0;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

footer {
    text-align: center;
    margin-top: 40px;
    padding-top: 20px;
    padding-bottom: 20px;
    background-color: #f8f9fa;
    border-top: 1px solid #e9ecef;
}
</style>