<?php
/**
 * IPTV Admin Dashboard - Channel Status API
 * Returns the status of all channels
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// Database connection (example)
// $db = new PDO('mysql:host=localhost;dbname=iptv', 'username', 'password');

// For demonstration, using static data
// Replace this with actual database queries

$channels = [
    [
        'name' => 'BeIN Sports 1 HD',
        'group' => 'BeIN SPORT',
        'status' => 'live',
        'url' => '/streams/bein1.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'BeIN Sports 2 HD',
        'group' => 'BeIN SPORT',
        'status' => 'live',
        'url' => '/streams/bein2.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'BeIN Sports 3 HD',
        'group' => 'BeIN SPORT',
        'status' => 'offline',
        'url' => '/streams/bein3.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'BeIN Sports 4 HD',
        'group' => 'BeIN SPORT',
        'status' => 'live',
        'url' => '/streams/bein4.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'SSC 1 HD',
        'group' => 'SSC',
        'status' => 'live',
        'url' => '/streams/ssc1.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'SSC 2 HD',
        'group' => 'SSC',
        'status' => 'live',
        'url' => '/streams/ssc2.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'SSC 3 HD',
        'group' => 'SSC',
        'status' => 'offline',
        'url' => '/streams/ssc3.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'OSN Movies HD',
        'group' => 'OSN',
        'status' => 'live',
        'url' => '/streams/osn_movies.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'OSN Sports 1',
        'group' => 'OSN',
        'status' => 'offline',
        'url' => '/streams/osn_sports1.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'MBC 1',
        'group' => 'OTHER',
        'status' => 'live',
        'url' => '/streams/mbc1.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'Dubai Sports',
        'group' => 'OTHER',
        'status' => 'live',
        'url' => '/streams/dubai_sports.m3u8',
        'type' => 'm3u8'
    ],
    [
        'name' => 'Abu Dhabi Sports',
        'group' => 'OTHER',
        'status' => 'live',
        'url' => '/streams/abudhabi_sports.m3u8',
        'type' => 'm3u8'
    ]
];

// In production, query from database:
/*
$stmt = $db->prepare("SELECT name, `group`, status, url, type FROM channels");
$stmt->execute();
$channels = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/

// Return JSON response
echo json_encode([
    'success' => true,
    'channels' => $channels,
    'timestamp' => time()
]);
?>
