<?php
// Database connection
include 'db_config.php';


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $author = $conn->real_escape_string($_POST['author']);
    $publishedYear = intval($_POST['published_year']);
    $price = floatval($_POST['price']);
    $category = $conn->real_escape_string($_POST['category']);

    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true); // Creates the directory with read/write/execute permissions for everyone
    }
    
    // Handle file upload
    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        $image = $target_file;
    } else {
        $image = "";
    }

    // Insert into database
    $sql = "INSERT INTO books (name, author, published_year, price, image,category) VALUES ('$name', '$author', $publishedYear, $price, '$image','$category')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
