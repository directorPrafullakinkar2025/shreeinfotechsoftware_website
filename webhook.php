<?php
// Verification for Meta Webhooks
$verify_token = "Ai_Agent";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $mode = $_GET['hub_mode'] ?? $_GET['hub.mode'] ?? '';
    $token = $_GET['hub_verify_token'] ?? $_GET['hub.verify_token'] ?? '';
    $challenge = $_GET['hub_challenge'] ?? $_GET['hub.challenge'] ?? '';

    if ($mode === 'subscribe' && $token === $verify_token) {
        echo $challenge;
        http_response_code(200);
    } else {
        http_response_code(403);
        echo "Verification failed";
    }
    exit;
}

// Receive webhook events
$input = file_get_contents("php://input");

// Save to a log file
file_put_contents(
    "facebook_webhook.log",
    date("Y-m-d H:i:s") . PHP_EOL . $input . PHP_EOL . PHP_EOL,
    FILE_APPEND
);

http_response_code(200);
echo "EVENT_RECEIVED";
?>