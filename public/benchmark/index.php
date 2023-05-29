<?php

function fib($n) {
    if ($n <= 1) {
        return $n;
    } else {
        return fib($n - 1) + fib($n - 2);
    }
}

if (!isset($_GET['n'])) {
    die("Por favor, forneça um número como parâmetro. Exemplo: ?n=35");
}

$n = isset($_GET['n']) ? intval($_GET['n']) : 35;

if ($n < 0) {
    die("Por favor, forneça um número válido não negativo como parâmetro.");
}

$start = microtime(true);

echo fib($n);

$time_elapsed_secs = microtime(true) - $start;
echo "\nTempo gasto: $time_elapsed_secs segundos";
