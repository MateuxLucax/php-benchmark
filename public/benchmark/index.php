<?php
// Benchmark.php
$start = microtime(true);

// Get multiplier from GET parameter, default to 1 if not set
$multiplier = isset($_GET['multiplier']) ? $_GET['multiplier'] : 1;

// Test math operations
for ($i = 0; $i < 1000000 * $multiplier; $i++) {
    $a = $i * $i;
    $b = sqrt($a);
}

// Test string operations
$string = '';
for ($i = 0; $i < 100000 * $multiplier; $i++) {
    $string .= 'a';
    $string = md5($string);
}

$end = microtime(true);

$execution_time = ($end - $start);

echo "Total Execution Time: ".$execution_time." seconds";
