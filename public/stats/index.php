<?php
    $meminfo = shell_exec('free -m');
    $uptime = shell_exec('uptime');
    $memlines = explode("\n", $meminfo);
    $temp = shell_exec('cat /sys/class/thermal/thermal_zone0/temp');
    $temp = $temp / 1000;

    $memory = array();
    foreach ($memlines as $line) {
        $parts = preg_split('/\s+/', $line);
        if(count($parts) >= 7) {
            $memory[$parts[0]] = array(
                'total' => $parts[1],
                'used' => $parts[2],
                'free' => $parts[3],
                'shared' => $parts[4],
                'buff/cache' => $parts[5],
                'available' => $parts[6]
            );
        }
    }

    $uptime = preg_replace('/\s+/', ' ', $uptime);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Server Information</title>
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
    <h2>Server Information</h2>

    <h3>Memory Usage (in MB)</h3>
    <table>
        <tr>
            <th></th>
            <th>Total</th>
            <th>Used</th>
            <th>Free</th>
            <th>Shared</th>
            <th>Buff/Cache</th>
            <th>Available</th>
        </tr>
        <?php foreach($memory as $key => $value): ?>
            <tr>
                <td><?= $key; ?></td>
                <td><?= $value['total']; ?></td>
                <td><?= $value['used']; ?></td>
                <td><?= $value['free']; ?></td>
                <td><?= $value['shared']; ?></td>
                <td><?= $value['buff/cache']; ?></td>
                <td><?= $value['available']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>CPU Load and Uptime</h3>
    <p><?= $uptime; ?></p>

    <h3>CPU Temperature</h3>
    <p><?= $temp . "°C" ?></p>
</body>
</html>
