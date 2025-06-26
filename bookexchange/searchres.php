 <?php
        // Include your database connection file
        include 'db_config.php';
       
        // Check if search query is submitted
        if (isset($_POST['search-input'])) {
            $searchQuery = strtolower($_POST['search-input']);

            // Prepare and execute a query to fetch results from the database
            $stmt = $pdo->prepare("SELECT * FROM test WHERE keyword LIKE ?");
            $stmt->execute(["%$searchQuery%"]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Display the search results
            if ($results) {
                foreach ($results as $result) {
                    echo "<div class='result'>";
                    echo "<h2>{$result['title']}</h2>";
                    echo "<img src='{$result [ 'image' ]} ' alt='{$result['title' ]}'>";
                    echo "<p>{$result['description']}</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No results found for '$searchQuery'.</p>";
            }
        } else {
            // Display message if no search query submitted
            echo "<p>Please enter a search query.</p>";
        }
        ?>