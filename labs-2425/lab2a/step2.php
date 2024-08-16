<?php

require "helpers/helper-functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $program = $_POST['program'];
  $address = $_POST['address'];

  if (empty($program) || empty($address)) {
      $_SESSION['error'] = "Fill all fields to proceed.";
      $_SESSION['form_data'] = $_POST;
      header("Location: step2.php");
      exit();
  }
  
  $_SESSION['program'] = $program;
  $_SESSION['address'] = $address;

  header("Location: step3.php");
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
          Registration (Step 2/3)
        </h1>
      </div>
      <div class="p-section--shallow">

        <form action="step2.php" method="POST">

          <fieldset>

            <label>Program</label>
            <select name="program">
              <option disabled="disabled" selected="">Select an option</option>
              <option value="CS">Computer Science</option>
              <option value="IT">Information Technology</option>
              <option value="IS">Information Systems</option>
              <option value="SE">Software Engineering</option>
              <option value="DS">Data Science</option>
            </select>

            <label>Complete Address</label>
            <textarea name="address" rows="3"></textarea>

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
