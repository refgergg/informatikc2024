<?php
session_start();
// Check if the form is submitted
if(isset($_POST['submit'])) 
    $review = $_POST['input-99'];
    $comment = $_POST['comment'];
    $usernamepost = $_SESSION['username'];
    // Database connection parameters
    $servername = "localhost";
    $username = ""; // Replace with your MySQL username
    $password_db = ""; // Replace with your MySQL password
    $dbname = "bio";
    $port = "3306";

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to upload  reviews
    $sql = "INSERT INTO reviews (rating, username, comment) VALUES ('$review', '$usernamepost', '$comment');";

    $result = $conn->query($sql);

    // Check if there is a matching record
    if ($result === TRUE) {
        echo "comment posted!";

        // Update review sum
        // Prepare SQL statement to retrieve reviews
        $sql = "SELECT * FROM reviews";
        $result = $conn->query($sql);

        $counter = 0;
        $ratingsamlet = 0;
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $counter++;
                $ratingsamlet += $row['rating'];
            }
            $ratingsamlet = $ratingsamlet / $counter;
            
            // Update rating of movie
            $sql = "UPDATE movies SET rating = '$ratingsamlet' WHERE moviename='Encanto'";

            $result = $conn->query($sql);

            if($result === TRUE)
            {
                echo "rating updated!";
                header('Location: encantopage.php');
            }
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();

?>