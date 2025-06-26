<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="logo.png">
    <title>BookBliss Barter</title>
    <link rel="stylesheet" href="index.css">
    <style>
        .books-container {
            display: flex;
            flex-wrap: wrap; /* Allows multiple lines */
            justify-content: flex-start; /* Aligns items to the start of the flex container */
            padding: 10px;
            gap: 20px; /* Space between items */
        }
        .book {
            border: 1px solid #ccc;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .book img {
            max-width: 100px; /* Adjust based on your needs */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="video-container">
        <video id="video-bg" autoplay loop muted playsinline>
            <source src="media/cover.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <form action="searchresults.php" class="search-bar" method="GET">
    <input type="text" id="search-input" name="query" placeholder="Search..." autocomplete="on">
    <button type="submit"><img src="images/sea.png" alt="Search"></button>
    <div class="autocomplete-results" id="autocomplete-results"></div>
</form>
    </div>

    <div class="navbar">
    <a href="#">
    <img src="images/bs.png" width="150px" height="100px">
</a>
        <ul class="menu-items">
            <li><a href="indexuser.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            
            
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div><br><br><br><br><br><br>
    <div class="content">
        <h2>Recommended Based on Your Reads</h2>
    <h1>Fiction Books</h1>
    <div class="books-container">
        <?php include 'fetchnonFictionBooks.php'; ?>
    </div><br><br>
    <h1>Non-Fiction Books</h1>
    <div class="books-container">
        <?php include 'fetchFictionBooks.php'; ?>
    </div>
    <h1>Science Fiction & Fantasy</h1>
    <div class="books-container">
        <?php include 'fetchScienceFantasyBooks.php'; ?>
    </div><br><br>
    <h1>Mystery & Thriller</h1>
    <div class="books-container">
        <?php include 'fetchMysteryBooks.php'; ?>
    </div><br><br>
    <h1>Biography</h1>
    <div class="books-container">
        <?php include 'fetchBiography.php'; ?>
    </div><br><br>
    <h1>Mathematics</h1>
    <div class="books-container">
        <?php include 'fetchMathematics.php'; ?>
    </div><br><br>
    <h1>Science</h1>
    <div class="books-container">
        <?php include 'fetchScience.php'; ?>
    </div><br><br>
    <h1>Economics</h1>
    <div class="books-container">
        <?php include 'fetchEconomics.php'; ?>
    </div><br><br>
    

    
        <!-- Dynamically generated recommendations -->
    </div>

    <footer>
        <p>Copyright © 2021 BookBliss Barter. All rights reserved.</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
    <script src="index.js"></script>
</body>
</html>
