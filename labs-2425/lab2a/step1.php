<?php

require "helpers/helper-functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fullname = $_POST['fullname'];
  $birthdate = $_POST['birthdate'];
  $contact_number = $_POST['contact_number'];
  $sex = $_POST['sex'];

  if (empty($fullname) || empty($birthdate) || empty($contact_number) || empty($sex)) {
      $_SESSION['error'] = "Fill all fields to proceed.";
      $_SESSION['form_data'] = $_POST;
      header("Location: step1.php");
      exit();
  }

  $newDate = new DateTime($birthdate);
  $dateFormat = $newDate->format("F, j, Y");

  $currentDate = new DateTime();
  $ageInterval = $currentDate->diff($newDate);
  $age = $ageInterval->y;

  $_SESSION['fullname'] = $fullname;
  $_SESSION['birthdate'] = $dateFormat;  
  $_SESSION['contact_number'] = $contact_number;
  $_SESSION['sex'] = $sex;
  $_SESSION['age'] = $age;

  header("Location: step2.php");
  exit();
}

$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

unset($_SESSION['error'], $_SESSION['form_data']);

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
      Registration (Step 1/3)
      </h1>
      </div>
      <div class="p-section--shallow">

        <form action="step1.php" method="POST">

        <fieldset>
          <label>Complete Name</label>
          <input type="text" name="fullname" placeholder="John Doe">

          <label>Birthdate</label>
            <input type="date" name="birthdate">

          <label>Contact Number</label>
           <input type="text" name="contact_number" placeholder="+639123456789" />

          <label>Sex</label>
           <br />
           <input type="radio" name="sex" value="male" checked="checked">Male
           <br />
           <input type="radio" name="sex" value="female">Female
           <br />

          <button type="submit">Next</button>
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
