<?php
require("./assets/require/require.php");

$username = $_SESSION['username'];

if ($_SESSION['loggedin'] == false) {
  header("Location: index.php");
} else {
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $query = $con->query($sql);
  $result = $query->fetch_assoc();
  $naam = $_SESSION['username'];

}

$projectcount = 0;


if (isset($_POST['submit'])) {
  $projectName = $_POST['name'];
  $projectLink = $_POST['link'];
  $username = $_SESSION['username'];

  $file = $_FILES['file-upload']['tmp_name'];

  if ($file) {
    $fileContent = file_get_contents($file);

    $escapedContent = $con->real_escape_string($fileContent);

    $sql = "INSERT INTO projects (naam, projectlink, Userid, projectimg) 
            VALUES ('$projectName', '$projectLink', '$username', '$escapedContent')";

    if ($con->query($sql) === TRUE) {
      echo "Project uploaded successfully.";
    } else {
      echo "Error: " . $con->error;
    }
  } else {
    echo "Error: No file uploaded.";
  }
  header("Location: profile.php");
}
?>

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
  <link rel="stylesheet" href="./assets/css/profile.css ">
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
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              <img src="assets/images/logoupper.png" alt="" />
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Search End ***** -->
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id="searchText" name="searchKeyword" onkeypress="handle" />
                <i class="fa fa-search"></i>
              </form>
            </div>
            <!-- ***** Search End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="browse.php">Browse</a></li>
                            <?php if ($_SESSION['loggedin'] == true) { ?>
              <li><a href="./logout.php">Logout</a></li>
              <?Php } ?>
              <li>
                <a href="profile.php" class="active">Profile <img src="assets/images/profile.jpg" alt="" /></a>
              </li>
            </ul>
            <a class="menu-trigger">
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="assets/images/logoupper.png" alt="" style="border-radius: 23px" />
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <h4>
                        <?= $naam ?>
                      </h4>
                      <p></p>
                      <div class="main-border-button">
                        <a id="open-form" href="#">Upload Project</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-container hidden">
                    <form method="post" enctype="multipart/form-data">
                      <div class="inputbox">
                        <input required="required" type="text" name="name">
                        <span>Project Name</span>
                        <i></i>
                      </div>
                      <div class="inputbox">
                        <input required="required" type="text" name="link">
                        <span>Project Link</span>
                        <i></i>
                      </div>
                      <label for="file-upload" class="custom-file-upload" id="file">
                        <i class="fas fa-cloud-upload-alt"></i> Choose File
                      </label>
                      <input accept required id="file-upload" type="file" accept="image/*" name="file-upload">
                      <button name='submit'>
                        <span class="circle1"></span>
                        <span class="circle2"></span>
                        <span class="circle3"></span>
                        <span class="circle4"></span>
                        <span class="circle5"></span>
                        <span class="text">Submit</span>
                      </button>
                    </form>
                  </div>
                </div>
                <div>
                <div class="heading-section">
                <h4><em>Your Recent</em> Projects</h4>
</div>
                <div class="row">
                <div class='col-lg-12'>
                                <div class='clips'>
                                    <div class='col-lg-3 flex col-sm-6'>

                  <?php
                  if ($_SESSION['loggedin'] == false) {
                    header("Location: index.php");
                  } else {
                    $sql = "SELECT * FROM projects WHERE Userid = '$username' ORDER BY datum DESC LIMIT 3";
                    $query = $con->query($sql);
                    $foundProjects = false; // Flag variable to track if projects were found

                    while ($result = $query->fetch_assoc()) {
                      $naam = $result['naam'];
                      $img = $result['projectimg'];
                      $link = $result['projectlink'];
                      $acountnaam = $result['Userid'];
                      $likes = $result['likes'];
                      $downloads = $result['downloads'];

                      $imgBase64 = base64_encode($img);

                      echo "
                                      <a class='item' href='$link'>
                                        <div class='thumb'>
                                          <img src='data:image/png;base64,$imgBase64' alt='' style='border-radius: 23px' />
                                        </div>
                                        <div class='down-content'>
                                          <h4>$naam</h4>
                                          <span><i class='fa fa-eye'></i> $likes</span>
                                        </div>

                            </a>";

                      $foundProjects = true; // Set flag to true since projects were found
                    }

                    if (!$foundProjects) {
                      $link = ""; // Initialize $link variable with an empty string
                      echo "<a href='$link' class='col-lg-12'>
                              <div class='clips'>
                                <div class='row'>
                                  <div class='col-lg-12'>
                                    <p>No projects uploaded yet.</p>
                                  </div>
                                </div>
                              </div>
                            </a>";
                    }
                  }
                  ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ***** Banner End ***** -->

        <!-- ***** Gaming Library Start ***** -->
        <div class="gaming-library profile-library">
          <div class="col-lg-12">
            <div class="heading-section">
              <h4><em>Your Project</em> Library</h4>
            </div>
            <?php
            if ($_SESSION['loggedin'] == false) {
              header("Location: index.php");
            } else {
              $sql = "SELECT * FROM projects WHERE Userid = '$username'";
              $query = $con->query($sql);
              $projectCount = $query->num_rows; // Get the number of projects
              $foundProjects = false; // Flag variable to track if projects were found

              while ($result = $query->fetch_assoc()) {
                $naam = $result['naam'];
                $img = $result['projectimg'];
                $link = $result['projectlink'];
                $acountnaam = $result['Userid'];
                $likes = $result['likes'];
                $downloads = $result['downloads'];
                $datum = $result['datum'];

                $foundProjects = true; // Set flag to true since projects were found

                $imgBase64 = base64_encode($img);

                echo "<div class='item'>
                          <ul>
                            <li>
                              <img src='data:image/png;base64,$imgBase64' alt='' class='templatemo-item' />
                            </li>
                            <li>
                              <h4>$naam</h4>
                              <span>$acountnaam</span>
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

              if (!$foundProjects) {
                echo "<div class='col-lg-12'>
                          <div class='clips'>
                            <div class='row'>
                              <div class='col-lg-12'>
                                <p>No projects uploaded yet.</p>
                              </div>
                            </div>
                          </div>
                        </div>";
              }
            }
            ?>

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
    const formcontainer = document.querySelector('.form-container');
    const openform = document.getElementById('open-form');
    openform.addEventListener('click', () => {
      if (formcontainer.classList.contains('hidden')) {
        formcontainer.classList.remove('hidden');
      } else {
        formcontainer.classList.add('hidden');
      }
    })

    let fileinv = document.getElementById('file');
    document.getElementById('file-upload').addEventListener('change', function() {
      let file = this.files[0];
      if (file) {
        fileinv.textContent = ('File uploaded: ' + file.name);
      }
    });
  </script>

</body>

</html>