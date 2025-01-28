<?php
session_start();
// Check if the form is submitted
if(isset($_POST['submit'])) 
    // Database connection parameters
    $servername = "localhost";
    $username = ""; // Replace with your MySQL username
    $password_db = ""; // Replace with your MySQL password
    $dbname = "bio";
    $port = "3306";

    $moviename = "Encanto";
    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Retrieve tickets from session
    $tickets = $_SESSION['tickets'];

    // Check if we have any tickets available
    if ($tickets < 1) {
        die("Tickets are sold out!");
    }

    $ticketsupdated = $tickets - 1;
    // Prepare SQL statement to retrieve movie info
    $sql = "UPDATE movies SET ticketsathand = '$ticketsupdated' WHERE moviename='$moviename'";

    $result = $conn->query($sql);

    // Check if successfully updated
    if ($result === TRUE) {
        echo "ticket bought!";
        header('Location: ../sold.php');
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();

?>