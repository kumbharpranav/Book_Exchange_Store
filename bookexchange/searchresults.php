<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <header>
    <div class="navbar">
    <a href="#">
    <img src="images/bs.png" width="150px" height="100px">
</a>

            <ul class="menu-items">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
              
                
            </ul>
        </div>
        
        <form action="searchresults.php" class="search-bar" method="GET">
    <input type="text" id="search-input" name="query" placeholder="Search..." autocomplete="on" value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
    <button type="submit"><img src="images/sea.png" alt="Search"></button>
    <div class="autocomplete-results" id="autocomplete-results"></div>
</form>
<h1><br>Search Results 
        </h1>
    </header>

    <main>
        <div id="search-results">
            <?php
            // Include database configuration file
            include 'db_config.php';

            // Check if the 'query' key exists in the $_GET array
            if(isset($_GET['query'])) {
                // Get the search query from the URL parameter
                $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);

                // Fetch search results from the database
                $sql = "SELECT * FROM books WHERE name LIKE '%$searchQuery%' OR author LIKE '%$searchQuery%' OR published_year LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%'";
                $result = mysqli_query($conn, $sql);

                // Check if there are any results
                if ($result && mysqli_num_rows($result) > 0) {
                    // Loop through each row and display search results
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="search-result">';
                        // Display ID
                        echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                        echo '<h2>' . htmlspecialchars($row['name']) . '</h2><br>';
                        // Display name
                        echo '<p><br>' . htmlspecialchars($row['author']) . '</p>';
                        // Display other details as needed
                        // Example: Description
                        // echo '<p>Description: ' . htmlspecialchars($row['description']) . '</p>';
                       
                       
                        echo '</div>';
                    }
                } else {
                    echo '<p>No search results found.</p>';
                }
            } else {
                echo '<p>No search query provided.</p>';
            }

            // Close database connection
            mysqli_close($conn);
      

// Display image

            ?>
        </div>
    </main>

    <footer>
        <p>Copyright © 2021 BookBliss Barter. All rights reserved.</p>
    </footer>
</body>
</html>




