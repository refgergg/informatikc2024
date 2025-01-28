<?php 
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect user to login page
    header('Location: index.html');
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

// Prepare SQL statement to retrieve passwords for the logged-in user
$sql = "SELECT * FROM movies WHERE moviename='$moviename'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user's data
    $row = $result->fetch_assoc();
    $tickets = $row['ticketsathand']; // Retrieve number of tickets
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Custom styles for this template -->
    <link href="./src/album.css" rel="stylesheet">
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

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">NEXT Bio</h1>
          <p class="lead text-muted">Bestil billetter her</p>
          <!--<p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>-->
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow zoom">
                <a href="./moviepages/encantopage.php">
                    <img class="card-img-top" src="./src/images/encanto.png" alt="Card image cap">
                </a>
                <div class="card-body">
                  <p class="card-text">A Colombian teenage girl has to face the frustration of being the only member of her family without magical powers.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location.href='./moviepages/encantopage.php'">Se</button>
                      <button type="button" class="btn btn-sm btn-outline-primary" onclick="window.location.href='./moviepages/purchase.php'">Køb</button>
                    </div>
                    <small class="text-muted">om 1 uge</small>
                    <small class="text-muted"><?php echo $tickets;?> billetter</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow zoom">
                <img class="card-img-top" src="./src/images/insideout.png" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Follows Riley, in her teenage years, encountering new emotions.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Se</button>
                      <button type="button" class="btn btn-sm btn-outline-primary">Køb</button>
                    </div>
                    <small class="text-muted">om 2 uger</small>
                    <small class="text-muted">6 billetter</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow zoom">
                <img class="card-img-top" src="./src/images/marvels.png" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Carol Danvers gets her powers entangled with those of Kamala Khan and Monica Rambeau, forcing them to work together to save the universe.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Se</button>
                      <button type="button" class="btn btn-sm btn-outline-primary">Køb</button>
                    </div>
                    <small class="text-muted">om 1 måned</small>
                    <small class="text-muted">2 billetter</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow zoom">
                <img class="card-img-top" src="./src/images/moana.png" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-primary">Se</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Køb</button>
                    </div>
                    <small class="text-muted">om 2 måneder</small>
                    <small class="text-muted">5 billetter</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow zoom">
                <img class="card-img-top" src="./src/images/wish.png" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-primary">Se</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Køb</button>
                    </div>
                    <small class="text-muted">om 2 måneder</small>
                    <small class="text-muted">12 billetter</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow zoom">
                <img class="card-img-top" src="./src/images/lionking.png" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-primary">Se</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Køb</button>
                    </div>
                    <small class="text-muted">om 2 måneder</small>
                    <small class="text-muted">15 billetter</small>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>

    </main>

    <!--Bootstrap dependencies-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./src/vendor/popper.min.js"></script>
    <script src="./src/vendor/bootstrap.min.js"></script>
    <script src="./src/vendor/holder.min.js"></script>
</body>
</html>