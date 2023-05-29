<?php
function benchmarkOpenSSL($data, $key, $method = 'aes-256-cbc')
{
    $encrypted = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA);
    $decrypted = openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA);
}


$iterations = isset($_GET['iterations'])) ? intval($_GET['iterations']) : 100;

$data = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
$key = "VerySecretKey123";

$totalExecutionTime = 0;

for ($i = 0; $i < $iterations; $i++) {
    $start_time = microtime(true);
    
    benchmarkOpenSSL($data, $key);
    
    $end_time = microtime(true);
    $execution_time = $end_time - $start_time;
    
    $totalExecutionTime += $execution_time;
}

$averageExecutionTime = $totalExecutionTime / $iterations;
$totalExecutionTimeFormatted = number_format($totalExecutionTime, 4);

echo "Número de iterações: $iterations<br>";
echo "Tempo total de execução: $totalExecutionTimeFormatted segundos";
echo "Tempo de execução médio: $averageExecutionTime segundos<br>";
