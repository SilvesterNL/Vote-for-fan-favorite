<?php
require("./assets/require/require.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <title>Vote For Fan Favorite</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <a href="./index.php" class="logo">
              <img src="assets/images/logoupper.png" alt="logo" />
            </a>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Search" id="searchText" name="searchKeyword" onkeypress="handle" />
                <i class="fa fa-search"></i>
              </form>
            </div>
            <ul class="nav">
              <li><a href="./index.php" class="active">Home</a></li>
              <li><a href="./browse.php">Browse</a></li>
              <li><a href="./logout.php">Logout</a></li>
              <li>
                <?php if ($_SESSION['loggedin'] == true) { ?>
                  <a href="./profile.php">Profile <img src="assets/images/profile.jpg" alt="" /></a>
                <?php } else { ?>
                  <a href="./login.php">Login <img style="filter: brightness(0) invert(1);" src="assets/images/login-header.png" alt="" /></a>
                <?php } ?>
              </li>
            </ul>
            <a class="menu-trigger">
              <span>Menu</span>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Welcome To Upper</h6>
                  <h4><em>Browse</em> Our Popular Projects Here</h4>
                  <div class="main-button">
                    <a href="./browse.php">Browse Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Most Popular</em> Projects Right Now</h4>
                </div>
                <div class="row">
                  <?php
                  $SQL = "SELECT * FROM projects ORDER BY likes DESC LIMIT 4";
                  $query = $con->query($SQL);

                  if (!$query) {
                    echo "Error executing query: " . $mysqli->error;
                    exit;
                  }

                  if ($query->num_rows == 0) {
                    echo "<p>No projects yet.</p>";
                  } else {
                    while ($result = $query->fetch_assoc()) {
                      $projectid = $result['id'];
                      $naam = $result['naam'];
                      $img = $result['projectimg'];
                      $link = $result['projectlink'];
                      $acountnaam = $result['Userid'];
                      $likes = $result['likes'];
                      $downloads = $result['downloads'];
                      

                      $imgBase64 = base64_encode($img);

                      echo "<a href='$link' class='col-lg-3 col-sm-6'>
                              <div class='item'>
                                <img src='data:image/png;base64,$imgBase64' alt=''/>
                                <h4>$naam<br /><span>$acountnaam</span></h4>
                                <ul>
                                  <li><i onclick='like($projectid)' class='fa fa-heart'></i> $likes</li>
                                  <li><i class='fa fa-eye'></i> $downloads</li>
                                </ul>
                              </div>
                            </a>";
                    }
                  }
                  ?>

                  <div class="col-lg-12">
                    <div class="main-button">
                      <a href="browse.php">Discover Popular</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Your Project</em> Library</h4>
              </div>
              <?php
              if ($_SESSION['loggedin'] == true) {
                $username = $_SESSION['username'];
                $SQL = "SELECT * FROM projects WHERE Userid = '$username' LIMIT 4";
                $query = $con->query($SQL);

                if (!$query) {
                  echo "Error executing query: " . $mysqli->error;
                  exit;
                }

                if ($query->num_rows == 0) {
                  echo "<p>No projects yet.</p>";
                } else {
                  while ($result = $query->fetch_assoc()) {
                    $naam = $result['naam'];
                    $img = $result['projectimg'];
                    $link = $result['projectlink'];
                    $acountnaam = $result['Userid'];
                    $likes = $result['likes'];
                    $downloads = $result['downloads'];
                    $datum = $result['datum'];

                    $imgBase64 = base64_encode($img);

                    echo "<div class='item'>
                            <ul>
                              <li>
                                <img src='data:image/png;base64,$imgBase64' alt='' class='templatemo-item' />
                              </li>
                              <li>
                                <h4>$naam</h4>
                                <a href='./profile.php?$acountnaam'><span>$acountnaam</span></a>
                              </li>
                              <li>
                                <h4>Date Added</h4>
                                <span>$datum</span>
                              </li>
                              <li>
                                <h4>Likes</h4>
                                <span>$likes</span>
                              </li>
                            </ul>
                          </div>";
                  }
                }
              } else {
                echo "<p class='loginmsg'>You need to login to see your projects --- <a href='./login.php'>Login -></a></p>";
              }
              ?>

            </div>
            <?php if ($_SESSION['loggedin'] == true) { ?>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="profile.php">View Your Library</a>
                </div>
              </div>
            <?php } else {
            } ?>
          </div>
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>
            Copyright © 2023 <a href="#">Upper</a> Company. All rights
            reserved.
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
function like(id) {
  
}
</script>
</body>

</html>