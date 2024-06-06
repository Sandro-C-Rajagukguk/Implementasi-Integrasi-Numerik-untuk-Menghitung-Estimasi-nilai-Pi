<?php
include 'main.php';

// Testing dengan variasi N
$N_values = [10, 100, 1000, 10000];
$results = test_simpson_integration($N_values);

foreach ($results as $result) {
    echo "N: " . $result['N'] . "</br> \n";
    echo "Calculated Pi: " . $result['calculated_pi'] . "</br> \n";
    echo "RMS Error: " . $result['rms_error'] . "</br> \n";
    echo "Execution Time: " . $result['execution_time'] . " seconds\n\n </br>";
}
?>

