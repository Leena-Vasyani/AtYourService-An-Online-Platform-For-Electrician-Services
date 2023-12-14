<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="viewingreviews.css">
    <style>
        .filled-star {
            color: yellow; 
        }
    </style>
</head>
<body>
    <div id="side-bar">
        <nav class="vmenu navigation">
          <ul>
            <li><a href="loggedinhome.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="services.php">Services</a></li>
          </ul>
        </nav>
        <nav class="vmenu filter">
          <ul>
            <li><a href="aboutus.html">About Us</a></li>
          </ul>
        </nav>
    </div>
      
    <div id="wrapper">
        <div id="header">
          <h1>Reviews</h1>
          <nav class="hmenu">
            <ul>
              <li></li>
              <li></li>
            </ul>
          </nav>
        </div>
        <div id="content">
        <div id="suggestions" class="list-view">
        <ul>
        <?php
            include 'partials/_dbconnect.php';

            // Fetch reviews and their corresponding star ratings
            $sql = "SELECT r.username, r.review, r.created_at, ra.rating_value
                    FROM reviews r
                    LEFT JOIN ratings ra ON r.username = ra.username
                    ORDER BY r.created_at DESC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li>';
                    echo '<div class="misc">';
                    echo '</div>';
                    echo '<div class="details">';
                    echo '<div class="title">';
                    echo '<span class="name">' . $row['username'] . '</span>' . "<br>";
                    echo '<span class="date">' . $row['created_at'] . '</span>' . "<br>";
                    echo '</div>';
                    echo '<span class="suggestion">' . $row['review'] . '</span>' . "<br>";
                    
                    // Display the star rating if available
                    if (!is_null($row['rating_value'])) {
                        echo '<div class="rating">';
                        echo 'Star Rating: ';

                        // Generate star icons based on the rating value
                        $ratingValue = $row['rating_value'];
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $ratingValue) {
                              echo '<span class="filled-star">&#9733;</span>';
                            } else {
                                echo '<span class="star">&#9733;</span>'; // Empty star for remaining positions
                            }
                        }

                        echo '</div>';
                    }
                    
                    echo '</div>';
                    echo '</li>';
                    echo "<br><br>";
                }
            } else {
                echo "No reviews found.";
            }
        ?>
        </ul>
    </div>
</body>
</html>
