<?php

$csvData = 'registrants.csv';

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Registrants List</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>

<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Registrants List
        </h1>
      </div>
      <div class="p-section--shallow">

        <table aria-label="Registrants Data">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Contact Number</th>
                    <th>Sex</th>
                    <th>Program</th>
                    <th>Complete Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (($file = fopen($csvFile, 'r')) !== false) {
                while (($data = fgetcsv($file)) !== false) {
                    echo '<tr>';
                    foreach ($data as $value) {
                        echo '<td>' . htmlspecialchars($value) . '</td>';
                    }
                    echo '</tr>';
                }
                fclose($file);
            }
            ?>
            </tbody>
        </table>

      </div>
    </div>
  </div>
</section>

</body>

</html>
