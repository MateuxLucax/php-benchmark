<?php

function fibonacci($n) {
    if ($n <= 0) {
        return [];
    } elseif ($n == 1) {
        return [0];
    } elseif ($n == 2) {
        return [0, 1];
    } else {
        $fib = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        }
        return $fib;
    }
}

if (isset($_GET['n'])) {
    $n = intval($_GET['n']);
    $start_time = microtime(true);
    $fibonacci_sequence = fibonacci($n);
    $end_time = microtime(true);
    
    $execution_time = $end_time - $start_time;

    echo "Sequência de Fibonacci para n = $n:<br>";
    echo implode(", ", $fibonacci_sequence);
    echo "<br><br>";
    echo "Tempo de execução: $execution_time segundos";
} else {
    echo "Por favor, forneça um valor para 'n' via parâmetro GET.";
}
?>
