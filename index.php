<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <title>Vote For Fan Favorite</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/templatemo-Cyborg-gaming.css" />
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
                <input type="text" placeholder="Type Something" id="searchText" name="searchKeyword" onkeypress="handle" />
                <i class="fa fa-search"></i>
              </form>
            </div>
            <ul class="nav">
              <li><a href="./index.php" class="active">Home</a></li>
              <li><a href="./browse.php">Browse</a></li>
              <li><a href="./details.php">Details</a></li>
              <li>
                <a href="./profile.php">Profile <img src="assets/images/profile-header.jpg" alt="" /></a>
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
                  $db_host = 'localhost';
                  $db_user = 'root';
                  $db_pass = '';
                  $db_data = 'vfff';

                  $db_connection = new mysqli($db_host, $db_user, $db_pass, $db_data);

                  ?>

                  <a class='col-lg-3 col-sm-6'>
                    <div class='item'>
                      <img src='' alt='' />
                      <h4><br /><span>Battle S</span></h4>
                      <ul>
                        <li><i class='fa fa-star'></i> 4.8</li>
                        <li><i class='fa fa-download'></i> 2.3M</li>
                      </ul>
                    </div>
                  </a>


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
              <div class="item">
                <ul>
                  <li>
                    <img src="assets/images/game-01.jpg" alt="" class="templatemo-item" />
                  </li>
                  <li>
                    <h4>Dota 2</h4>
                    <span>Sandbox</span>
                  </li>
                  <li>
                    <h4>Date Added</h4>
                    <span>24/08/2036</span>
                  </li>
                  <li>
                    <h4>Votes</h4>
                    <span>3.4K</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button">
                <a href="profile.php">View Your Library</a>
              </div>
            </div>
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
            Copyright © 2036 <a href="#">Upper</a> Company. All rights
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
</body>

</html>