<?php
require("./assets/require/require.php");
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
            <a href="index.php" class="logo">
              <img src="assets/images/logoupper.png" alt="" />
            </a>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id="searchText" name="searchKeyword" onkeypress="handle" />
                <i class="fa fa-search"></i>
              </form>
            </div>
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="browse.php" class="active">Browse</a></li>
                            <?php if ($_SESSION['loggedin'] == true) { ?>
              <li><a href="./logout.php">Logout</a></li>
              <?Php } ?>
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
          <div class="row">
            <div class="col-lg-8">
              <div class="featured-games header-text">
                <div class="heading-section">
                  <h4><em>Most Viewed</em> Projects</h4>
                  <div class="row">
                    <?php
                    $SQL = "SELECT * FROM projects ORDER BY downloads DESC LIMIT 4";
                    $query = $con->query($SQL);

                    if (!$query) {
                      echo "Error executing query: " . $mysqli->error;
                      exit;
                    }

                    if ($query->num_rows == 0) {
                      echo "<p>No projects found.</p>";
                    } else {
                      while ($result = $query->fetch_assoc()) {
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
                                    <li><i class='fa fa-heart' style='color: #ff00a6;'></i> $likes</li>
                                    <li><i class='fa fa-eye'></i> $downloads</li>
                                  </ul>
                                </div>
                              </a>";
                      }
                    }
                    ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="top-downloaded">
                <div class="heading-section">
                  <h4><em>Top</em> Liked</h4>
                </div>
                <ul>
                  <?php
                  $SQL = "SELECT * FROM projects ORDER BY likes DESC LIMIT 3";
                  $query = $con->query($SQL);

                  if (!$query) {
                    echo "Error executing query: " . $mysqli->error;
                    exit;
                  }

                  if ($query->num_rows == 0) {
                    echo "<p>No projects available.</p>";
                  } else {
                    while ($result = $query->fetch_assoc()) {
                      $naam = $result['naam'];
                      $img = $result['projectimg'];
                      $link = $result['projectlink'];
                      $acountnaam = $result['Userid'];
                      $likes = $result['likes'];
                      $downloads = $result['downloads'];

                      $imgBase64 = base64_encode($img);

                      echo "<li>
                              <img src='data:image/png;base64,$imgBase64' alt='' class='templatemo-item' />
                              <h4>$naam</h4>
                              <h6>$acountnaam</h6>
                              <span><i class='fa fa-heart' style='color: #ff00a6'></i>$likes</span>
                              <span><i class='fa fa-eye' style='color: #ff00a6'></i>$downloads</span>
                              <div class='download'>
                                <a href='$link'><i class='fa fa-eye'></i></a>
                              </div>
                            </li>";
                    }
                  }
                  ?>


                </ul>
                <div class="text-button">
                  <a href="profile.php?">View All Projects</a>
                </div>
              </div>
            </div>
          </div>
          <div class="Upload-Project">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>How To Upload </em> Your Projects</h4>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="item">
                    <div class="icon">
                      <img src="assets/images/service-01.jpg" alt="" style="max-width: 60px; border-radius: 50%" />
                    </div>
                    <h4>Go To Your Profile</h4>
                    <p>In the top right corner</p>
                    <br />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="item">
                    <div class="icon">
                      <img src="assets/images/service-02.jpg" alt="" style="max-width: 60px; border-radius: 50%" />
                    </div>
                    <h4>Upload Project Button</h4>
                    <p>
                      Click on the button Upload Project Fill in every field
                      on the page and click submit
                    </p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="item">
                    <div class="icon">
                      <img src="assets/images/service-03.jpg" alt="" style="max-width: 60px; border-radius: 50%" />
                    </div>
                    <h4>You Uploaded Your Project</h4>
                    <p>Your Project Is Uploaded!</p>
                    <br />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="profile.php">Go To Profile</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <br>
          <br>
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
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
          <script src="assets/js/isotope.min.js"></script>
          <script src="assets/js/owl-carousel.js"></script>
          <script src="assets/js/tabs.js"></script>
          <script src="assets/js/popup.js"></script>
          <script src="assets/js/custom.js"></script>
        </div>
      </div>

</body>

</html>