<?php
function fib($n) {
    if ($n <= 1) {
        return $n;
    } else {
        return fib($n - 1) + fib($n - 2);
    }
}
$n = isset($_GET['n']) ? intval($_GET['n']) : 35;

if ($n < 0) {
    die("Por favor, forneça um número válido não negativo como parâmetro.");
}

$start = microtime(true);

$fib_sequence = array();
for ($i = 0; $i <= $n; $i++) {
    $fib_sequence[] = fib($i);
}

$time_elapsed_secs = microtime(true) - $start;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Benchmark - Fibonacci</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Sequência Fibonacci até o número <?= $n; ?></h2>

    <h3>Tempo de Execução</h3>
    <p><?= $time_elapsed_secs; ?> segundos</p>

    <h3>Sequência Fibonacci</h3>
    <table>
        <tr>
            <th>Número</th>
            <th>Valor Fibonacci</th>
        </tr>
        <?php foreach($fib_sequence as $key => $value): ?>
            <tr>
                <td><?= $key; ?></td>
                <td><?= $value; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
