<?php

$time_start = microtime(true);

$csv = '/Users/kiwalidis0/IPT10/labs-2425/lab2b/customers-100000.csv';
$customers = [];

if (($handle = fopen($csv, 'r')) !== FALSE) 
{
    fgetcsv($handle);

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $customers[] = $data;
    }
    fclose($handle);
}

$results_per_page = 100; 
$total_records = count($customers);
$total_pages = ceil($total_records / $results_per_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = ($page > $total_pages) ? $total_pages : $page;
$page = ($page < 1) ? 1 : $page;

$start_index = ($page - 1) * $results_per_page;

$paginated_customers = array_slice($customers, $start_index, $results_per_page);

$time_end = microtime(true);
$execution_time = ($time_end - $time_start);

echo "<br><strong>Execution Time:</strong> " . number_format($execution_time, 5) . " seconds";


?>

<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<h1>
    Customers
</h1>
<h4>
<?php foreach(range('A', 'Z') as $letter): ?>
    <a href="filtered.php?letter=<?php echo $letter; ?>"><?php echo $letter; ?></a>
<?php endforeach; ?>
</h4>
<small>
The dataset is retrieved from this URL <a href="https://www.datablist.com/learn/csv/download-sample-csv-files">https://www.datablist.com/learn/csv/download-sample-csv-files</a>
</small>
<table aria-label="Customers Dataset">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Complete Name</th>
            <th>Company</th>
            <th>Address</th>
            <th>Email Address</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($paginated_customers as $record):
    ?>
        <tr>
            <td><?php echo $record[1]; ?></td>
            <td><?php echo "<strong>{$record[1]}</strong>, {$record[2]}"; ?></td>
            <td><?php echo $record[4]; ?></td>
            <td><?php echo $record[7]; ?></td>
            <td><?php echo $record[9]; ?></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>

<div>
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php if ($page < $total_pages): ?>
        <a href="?page=<?php echo $page + 1; ?>"><b>Next</b></a>
    <?php endif; ?>
</div>

</body>
</html>
