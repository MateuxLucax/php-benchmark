<?php
// Benchmark.php
$start = microtime(true);

// Test math operations
for ($i = 0; $i < 1000000; $i++) {
    $a = $i * $i;
    $b = sqrt($a);
}

// Test string operations
$string = '';
for ($i = 0; $i < 100000; $i++) {
    $string .= 'a';
    $string = md5($string);
}

$end = microtime(true);

$execution_time = ($end - $start);

echo "Total Execution Time: ".$execution_time." seconds";
