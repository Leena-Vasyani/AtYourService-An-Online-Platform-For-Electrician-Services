<?php
session_start();
require_once 'partials/_dbconnect.php';

$username = $_SESSION['username'];

if (!isset($_SESSION['has_responded'])) {
    $_SESSION['has_responded'] = false; // Initialize the session variable
}

$popupVisible = !$_SESSION['has_responded'] ;

if (isset($_POST['rating_value']) && !$popupVisible) {
    // User has already responded, so do nothing
} elseif (isset($_POST['rating_value']) && $popupVisible) {
    // User is responding for the first time
    $rating_value = $_POST['rating_value'];

    $sql = "INSERT INTO `ratings` (`username`, `rating_value`) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $username, $rating_value);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Service rated successfully!";
        $_SESSION['has_responded'] = true; // Update the session variable
        $popupVisible = false;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
    .popup {
    display: <?php echo $popupVisible ? 'block' : 'none'; ?>;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Ensure the popup is on top */
}

.popup-content {
    background: #fff;
    width: 250px;
    height: 250px;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    position: relative;
    top:40%;
    left:40%;
}

.close-button {
    position: absolute;
    top: 5px;
    right: 5px;
    font-size: 24px;
    cursor: pointer;
    background: none;
    border: none;
    color: #000;
    z-index: 1; /* Set a higher z-index to ensure the close button is on top */
    transition: color 0.3s;
}

    #stars {
        margin-top: 10px;
    }

    .star {
        font-size: 24px;
        cursor: pointer;
        margin: 0 5px;
        z-index: 2;
    }

    #submit {
        margin-top: 20px;
    }

    /* Add this style for selected stars */
    .star.selected {
        color: yellow;
    }

    #submit {
        margin-top: 20px;
        background: light-blue;
        border-radius: 5px;
    }

    #submit:hover {
        color: white;
        background: blue;
    }

    .close-button:hover { /* Updated class name */
        color: white;
        background: red;
    }

    .success-alert {
    display: none;
    position: fixed;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: #4CAF50;
    color: white;
    padding: 15px;
    text-align: center;
    border-radius: 5px;
}

    </style>
</head>
<body>
 <form action="" method="post">
    <div class="blur-background" id="blur-background">
        <div class="popup" id="popup">
            <div style="height:100%;">
            
            <div class="popup-content">
                <h2>Rate Us</h2>
                <p>Please rate your experience:</p>
                <div class="stars-container" id="stars">
                    <span class="star" data-rating="1">&#9733;</span>
                    <span class="star" data-rating="2">&#9733;</span>
                    <span class="star" data-rating="3">&#9733;</span>
                    <span class="star" data-rating="4">&#9733;</span>
                    <span class="star" data-rating="5">&#9733;</span>
                </div>
                <button class="close-button" id="close-button">&times;</button>
                <input type="hidden" id="rating_value" name="rating_value" value="0">
                <button type="submit" id="submit">Submit</button>
            </div>
            </div>
        </div>
    </div>
    <div id="success-alert" class="success-alert">
    <?php
    if (isset($_SESSION['success_message'])) {
        echo $_SESSION['success_message'];
        unset($_SESSION['success_message']); // Clear the success message
    }
    ?>
</div>

 </form>

 <script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("hi")
    const popup = document.getElementById("popup");
    const blurBackground = document.getElementById("blur-background");
    const stars = document.querySelectorAll(".star");
    const submitButton = document.getElementById("submit");
    const closeButton = document.getElementById("close-button");
    const successAlert = document.getElementById("success-alert");

    let selectedRating = 0;

    

    <?php
    if (isset($_SESSION['success_message'])) {
    ?>
    // Display the success message if it's set
    successAlert.style.display = "block";
    //setTimeout(function () {
       // successAlert.style.display = "none";
    //}, 3000); // Hide the success message after 3 seconds
    <?php
    }
    ?>

<?php
    if (!$popupVisible && isset($_SESSION['has_responded'])) {
    ?>
    // Open the pop-up when the page loads
    popup.style.display = "none";
    //<?php
    } elseif (!$_SESSION['has_responded'] || $popupVisible) {
    ?>
    // User has already responded, so hide the popup
    popup.style.display = "block";
    <?php
    }
    ?>


        // Add click event listeners to the stars
        const starsContainer = document.getElementById("stars");
        console.log(starsContainer)
    starsContainer.addEventListener("click", (event) => {
        if (event.target.classList.contains("star")) {
        console.warn("hi");
            selectedRating = parseInt(event.target.getAttribute("data-rating"));
            document.getElementById("rating_value").value = selectedRating; // Update the hidden input
            const stars = starsContainer.querySelectorAll(".star");
            stars.forEach((star, index) => {
                if (index < selectedRating) {
                    star.classList.add("selected");
                } else {
                    star.classList.remove("selected");
                }
            });
        }
    });

        // Handle the close button click
        closeButton.addEventListener("click", () => {
            closePopup();
        });

        // Handle the submit button click
        document.getElementById("submit").addEventListener("click", () => {
            // You can send the selectedRating to your backend for processing
            alert("Thank you for your " + selectedRating + " star rating!");
            closePopup();
        });

        function closePopup() {
            popup.style.display = "none";
            blurBackground.style.display = "none";
        }
    });
 </script>

</body>
</html>
