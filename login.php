<?php
session_start();
// Check if the form is submitted
if(isset($_POST['submit'])) 
    // Retrieve form data
    $user = $_POST['username'];
    $password = $_POST['password']; // Hash the password using bcrypt
    // Database connection parameters
    $servername = "localhost";
    $username = ""; //MySQL username
    $password_db = ""; //MySQL password
    $dbname = "bio";
    $port = "3306";

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve user information
    $sql = "SELECT * FROM users WHERE username='$user'";

    $result = $conn->query($sql);

    // Check if there is a matching record
    if ($result->num_rows > 0) {
        // Fetch the user's data
        $row = $result->fetch_assoc();
        $hashed_password_db = $row['password']; // Retrieve hashed password from the database

        // Compare hashed passwords
        if (password_verify($password, $hashed_password_db)) {
            if(!password_needs_rehash($hashed_password_db, PASSWORD_DEFAULT)) {
                echo "<p>Login successful!</p>";

                // Save session cookie
                $_SESSION['loggedin'] = true;

                //Grab user_id from userdb and save cookie
                $sql_id = "SELECT * FROM users WHERE username='$user'";
                $result_id = $conn->query($sql_id);
                $row_id = $result_id->fetch_assoc();
                $user_id = $row_id['user_id'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $row['username'];

                // Redirect to home
                header('Location: home.php');
                exit;
            } else {
                echo "<p>Error! Please rehash the password. </p>";
            }
        } else {
            echo "<p>Error! Hashes don't match.</p>";
        }
    } else {
        echo "<p>Invalid username.</p>";
    }

    // Close connection
    $conn->close();

?>
