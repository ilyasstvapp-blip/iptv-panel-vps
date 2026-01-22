<?php
/**
 * IPTV Admin Dashboard - Stop Channel API
 * Stops a running channel stream
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// Get channel name from query parameter
$channelName = $_GET['name'] ?? '';

if (empty($channelName)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Channel name is required'
    ]);
    exit;
}

// Database connection (example)
// $db = new PDO('mysql:host=localhost;dbname=iptv', 'username', 'password');

// Get channel info from database
/*
$stmt = $db->prepare("SELECT * FROM channels WHERE name = ?");
$stmt->execute([$channelName]);
$channel = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$channel) {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'Channel not found'
    ]);
    exit;
}
*/

// Generate stream name
$streamName = strtolower(str_replace(' ', '_', $channelName));

// Find and kill FFmpeg process for this channel
/*
$findCommand = "ps aux | grep 'ffmpeg.*{$streamName}' | grep -v grep | awk '{print $2}'";
$pid = shell_exec($findCommand);

if ($pid) {
    $killCommand = "kill -9 {$pid}";
    exec($killCommand);
}
*/

// Update database status
/*
$stmt = $db->prepare("UPDATE channels SET status = 'offline' WHERE name = ?");
$stmt->execute([$channelName]);
*/

// Delete stream files
/*
$streamPath = "/var/www/html/streams/{$streamName}*";
exec("rm -f {$streamPath}");
*/

// Return success response
echo json_encode([
    'success' => true,
    'message' => 'Channel stopped successfully',
    'data' => [
        'name' => $channelName,
        'status' => 'offline'
    ]
]);
?>