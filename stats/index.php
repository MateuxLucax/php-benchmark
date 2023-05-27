<?php
$memory = shell_exec('free -m');
echo "Memory usage:\n" . $memory . "\n";

$load = shell_exec('uptime');
echo "CPU load:\n" . $load . "\n";

$disk = shell_exec('df -h');
echo "Disk usage:\n" . $disk . "\n";

$network = shell_exec('netstat -i');
echo "Network info:\n" . $network . "\n";

$system = shell_exec('uname -a');
echo "System info:\n" . $system . "\n";

$processes = shell_exec('ps aux');
echo "Running processes:\n" . $processes . "\n";

$temp = shell_exec('cat /sys/class/thermal/thermal_zone0/temp');
$temp = $temp / 1000;
echo "CPU temperature: " . $temp . "°C";
