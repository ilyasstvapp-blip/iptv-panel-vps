<?php
/**
 * IPTV Admin Dashboard - Statistics API
 * Returns system statistics
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// Database connection (example)
// $db = new PDO('mysql:host=localhost;dbname=iptv', 'username', 'password');

// Get statistics from database
/*
$stmt = $db->query("SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN status = 'live' THEN 1 ELSE 0 END) as live,
    SUM(CASE WHEN status = 'offline' THEN 1 ELSE 0 END) as offline
    FROM channels");
$stats = $stmt->fetch(PDO::FETCH_ASSOC);

// Get active sessions (from screen or other monitoring)
$sessionsCommand = "screen -ls | grep -c 'stream_'";
$sessions = (int)shell_exec($sessionsCommand);
*/

// For demonstration, return sample data
$stats = [
    'total' => 12,
    'live' => 9,
    'offline' => 3,
    'sessions' => rand(10, 50),
    'server_status' => 'online',
    'uptime' => shell_exec('uptime -p') ?: 'N/A',
    'cpu_usage' => rand(10, 60) . '%',
    'memory_usage' => rand(30, 70) . '%',
    'disk_usage' => rand(20, 50) . '%',
    'bandwidth' => [
        'upload' => rand(100, 500) . ' Mbps',
        'download' => rand(200, 800) . ' Mbps'
    ],
    'timestamp' => time(),
    'date' => date('Y-m-d H:i:s')
];

// Get system load (Linux only)
/*
if (function_exists('sys_getloadavg')) {
    $load = sys_getloadavg();
    $stats['system_load'] = [
        '1min' => round($load[0], 2),
        '5min' => round($load[1], 2),
        '15min' => round($load[2], 2)
    ];
}
*/

// Get channel groups statistics
/*
$stmt = $db->query("SELECT `group`, COUNT(*) as count FROM channels GROUP BY `group`");
$groups = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stats['groups'] = $groups;
*/

$stats['groups'] = [
    ['group' => 'BeIN SPORT', 'count' => 4],
    ['group' => 'SSC', 'count' => 3],
    ['group' => 'OSN', 'count' => 2],
    ['group' => 'OTHER', 'count' => 3]
];

// Return JSON response
echo json_encode([
    'success' => true,
    'stats' => $stats
]);
?>