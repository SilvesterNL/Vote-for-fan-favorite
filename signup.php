<?php

require("./assets/require/require.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if ($_POST['type'] == "create") {
    $insert = $con->query("INSERT INTO users (username,email,password) VALUES('" . $con->real_escape_string($_POST['username']) . "','" . $con->real_escape_string($_POST['email']) . "','" . password_hash($con->real_escape_string($_POST['password']), PASSWORD_BCRYPT) . "')");
    if ($insert) {
      $respone = true;
      header("Location: login.php");
    }
  }
} else {
  $respone = false;
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="loginsignup.css">
  <link rel="shortcut icon" href="./assets/images/icons8-login-rounded-50.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400&display=swap" rel="stylesheet">
</head>

<body>

  <div class="centered-container">
    <form method="post" class="form">
      <input type="hidden" name="type" value="create">
      <p id="heading">Maak een account aan</p>
      <div class="field">
        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
          <path style="fill:#0055b8" d="M503.756 118.065c0-9.069-7.42-16.489-16.489-16.489H24.733c-9.069 0-16.489 7.42-16.489 16.489v275.87c0 9.069 7.42 16.489 16.489 16.489h462.533c9.069 0 16.489-7.42 16.489-16.489v-275.87z" />
          <path style="opacity:.1;enable-background:new" d="M255.996 230.032 9.306 399.687c2.148 5.713 7.372 9.949 13.636 10.634l233.053-160.278L489.05 410.321c6.267-.683 11.492-4.918 13.641-10.631L255.996 230.032z" />
          <path style="opacity:.2;enable-background:new" d="M487.267 101.576H24.733c-9.069 0-16.489 7.42-16.489 16.489v2.199l247.755 172.539 247.755-172.539v-2.199c.002-9.069-7.418-16.489-16.487-16.489z" />
          <path style="fill:#0082ca" d="M487.267 101.576H24.733c-4.091 0-7.839 1.52-10.73 4.01l241.996 168.529 241.996-168.529c-2.89-2.49-6.637-4.01-10.728-4.01z" />
          <path style="fill:#1e252b" d="M487.267 93.332H24.733C11.095 93.332 0 104.427 0 118.065v275.87c0 13.639 11.095 24.733 24.733 24.733h462.533c13.639 0 24.733-11.095 24.733-24.733v-275.87c.001-13.638-11.095-24.733-24.732-24.733zm-9.777 16.489L256 264.068 34.51 109.821h442.98zm18.021 284.114c0 4.547-3.698 8.244-8.244 8.244H24.733c-4.547 0-8.244-3.698-8.244-8.244v-275.87c0-.229.016-.453.034-.677L251.288 280.88a8.243 8.243 0 0 0 9.422 0l234.765-163.492c.019.224.034.448.034.677v275.87h.002z" />
        </svg>
        <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
        </svg>
        <input name="email" autocomplete="off" placeholder="Email" class="input-field" type="email" required>
      </div>
      <div class="field">
        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
        </svg>
        <input name="username" autocomplete="off" placeholder="Username" class="input-field" type="text" required>
      </div>
      <div class="field">
        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
        </svg>
        <input name="password" placeholder="Password" class="input-field" type="password" required>
      </div>
      <div class="btn">
        <button name="submit" class="button1" style="width:400px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account aanmaken&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
      </div>
      <a class="button3" style="text-decoration: none; color: white;" href="./login.php" T>
        Terug naar login
      </a>
    </form>
  </div>

</body>

</html>