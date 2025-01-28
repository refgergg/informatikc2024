<?php
session_start();
// Check if the form is submitted
if(isset($_POST['submit'])) 
    $user = $_POST['username'];
    // Retrieve form data
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password using bcrypt
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

    // Prepare SQL statement to retrieve user information
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$password')";

    $result = $conn->query($sql);

    // Check if there is a matching record
    if ($result === TRUE) {
        echo "New user created succesfully!";

        // Save session cookie
        $_SESSION['loggedin'] = true;

        //Grab user_id from userdb and save cookie
        $sql_id = "SELECT * FROM users WHERE username='$user'";
        $result_id = $conn->query($sql_id);
        $row_id = $result_id->fetch_assoc();
        $user_id = $row_id['user_id'];
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $user;
        header('Location: home.php');
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();

?>