<?php

require "helpers/helper-functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $agree = $_POST['agree'] ?? null;

  if (empty($email) || empty($password) || !$agree) {
      $_SESSION['error'] = "Fill all fields to proceed.";
      $_SESSION['form_data'] = $_POST;
      header("Location: step3.php");
      exit();
  }

  $_SESSION['email'] = $email;
  $_SESSION['password'] = password_hash($password, PASSWORD_BCRYPT);
  $_SESSION['agree'] = $agree;

  header("Location: thank-you.php");
  exit();
}

$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

unset($_SESSION['error'], $_SESSION['form_data']);

dump_session();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Registration (Step 3/3)
        </h1>
      </div>
      <div class="p-section--shallow">

        <form action="step3.php" method="POST">

          <fieldset>
            <label>Email address</label>
              <input type="email" name="email" placeholder="example@canonical.com" autocomplete="email">

            <label>Password</label>
              <input type="password" name="password" placeholder="******" autocomplete="current-password">

            <label class="p-checkbox--inline">
              <input type="checkbox" name="agree">
            </label>
            I agree to the terms and conditions...
            
            <br />
            <br />

            <button type="submit" class="p-button--positive">Finish</button>
          </fieldset>

        </form>

      </div>

    </div>

    <div class="col">
      <div class="p-image-container--3-2 is-cover">
        <img class="p-image-container__image" src="https://www.auf.edu.ph/home/images/ittc.jpg" alt="">
      </div>
    </div>

  </div>
</section>

</body>
</html>
