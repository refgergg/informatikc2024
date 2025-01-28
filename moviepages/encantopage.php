<?php 
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect user to login page
    header('Location: ../index.html');
    exit;
}

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

// Select movie
$sql = "SELECT * FROM movies WHERE moviename='$moviename'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user's data
    $row = $result->fetch_assoc();
    $rating = $row['rating']; // Retrieve rating
    //Save ticket number
    $_SESSION['tickets'] = $row['ticketsathand'];

    // Change buy button if tickets are 0
}


// select reviews
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);
$reviewsamount = $result->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encanto</title>
    <!-- default styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

    <!-- important mandatory libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>

    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme JS files as mentioned below (and change the theme property of the plugin) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>

    <!-- optionally if you need translation for your language then include locale file as mentioned below (replace LANG.js with your own locale file) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js"></script>

    <style>
        .navbar {
            margin-bottom: 20px;
        }
        .jumbotron {
            background: no-repeat center center;
            background-size: cover;
            padding-bottom: 50px;
        }
        .character-card {
            margin-bottom: 20px;
        }
        .gallery img {
            margin-bottom: 15px;
        }
        .banner {
            padding-bottom: 25px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
            </ul>
        </div>
        </div>
    </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
    <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href='../index.html'">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </div>
</header>

<!-- Jumbotron -->
<div class="jumbotron text-center">
    <h1 class="display-4">Encanto</h1>
    <input id="input-33" name="input-33" value="<?php echo $rating;?>" class="rating-loading">
</div>


<!-- Summary Section -->
<section id="summary" class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Summary</h2>
            <p>A Colombian teenage girl has to face the frustration of being the only member of her family without magical powers.</p>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='../home.php'">Tilbage</button>

                <form action="purchase.php" method="post">
                    <button name="Encanto" value="Encanto" type="submit" class="btn btn-outline-primary">Køb</button>
                </form>
            </div>
            <!-- Add own review-->
            <div class="mt-5" style="padding-right: 100px">
                <h2 class="mb-4">Submit Your Rating and Comment</h2>
                <form action="reviewupload.php" style="padding-bottom: 50px" method="post">
                    <div class="form-group">
                    <label for="rating">Rating</label>
                    <input id="input-99" name="input-99" required class="rating-loading">
                    </div>
                    <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea type="text" class="form-control" id="comment" name="comment" rows="4" placeholder="Write your comment here..." required></textarea>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Reviews-->
            <?php
            $counter = 0;
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $counter++;
                    echo "<h3>" . $row['username'] . "</h3>";
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<input id="input-' . $counter . '" name="input-' . $counter . '" value="' . $row['rating'] . '" class="rating-loading">';
                    echo '<p class="card-text">' . $row['comment'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }?>
        </div>
        
        <div class="col-md-6">
            <img class="banner" src="../src/images/encanto.png">
        </div>
    </div>
</section>

    <!--Bootstrap dependencies-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../src/vendor/popper.min.js"></script>
    <script src="../src/vendor/bootstrap.min.js"></script>
    <script src="../src/vendor/holder.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#input-33').rating({displayOnly: true, step: 0.5});
            $('#input-55').rating({clearCaption: 'No stars yet'});
            $('#input-88').rating({rtl: true, containerClass: 'is-star'});
            $('#input-99').rating();

            for (var i = 1; i <= <?php echo $reviewsamount;?> ; i++) {
                $('#input-' + i).rating({displayOnly: true, step: 0.5});
            }
        });

    </script>
</body>
</html>
