<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("Method not allowed.");
}

$data = [
    "Enquiry_ID"        => clean($_POST['Enquiry_ID'] ?? ''),
    "student_name"   => clean($_POST['student_name'] ?? ''),
    "phone"          => clean($_POST['phone'] ?? ''),
    "course"         => clean($_POST['course'] ?? ''),
    "call_result"    => clean($_POST['call_result'] ?? ''),
    "interested"     => clean($_POST['interested'] ?? ''),
    "lead_status"    => clean($_POST['lead_status'] ?? ''),
    "follow_up_date" => clean($_POST['follow_up_date'] ?? ''),
    "counselor_name" => clean($_POST['counselor_name'] ?? ''),
    "notes"          => clean($_POST['notes'] ?? ''),
    "updated_at"     => date('Y-m-d H:i:s')
];

if ($data["Enquiry_ID"] === '' || $data["call_result"] === '' || $data["lead_status"] === '') {
    http_response_code(400);
    exit("Lead ID, Call Result and Lead Status are required.");
}

$ch = curl_init($n8nWebhookUrl);

curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Accept: application/json"
    ],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($response === false || $httpCode < 200 || $httpCode >= 300) {
    http_response_code(502);
    ?>
    <!doctype html>
    <html><head><meta charset="utf-8"><title>Error</title>
    <style>body{font-family:Arial;background:#f4f7fb}.card{max-width:550px;margin:80px auto;background:#fff;padding:30px;border-radius:15px;text-align:center;color:#b42318}</style>
    </head><body><div class="card">
    <h2>CRM Update Failed</h2>
    <p>The update could not be sent to n8n.</p>
    <p>Please contact the administrator.</p>
    </div></body></html>
    <?php
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>CRM Updated</title>
<style>
body{margin:0;font-family:Arial;background:#f4f7fb}
.card{max-width:550px;margin:80px auto;background:#fff;padding:40px;border-radius:16px;text-align:center;box-shadow:0 10px 30px #0001}
.ok{font-size:55px;color:#14833b}
h1{color:#124a91}
p{color:#667085}
</style>
</head>
<body>
<div class="card">
<div class="ok">✓</div>
<h1>CRM Updated Successfully</h1>
<p>Lead <b><?= htmlspecialchars($data["Enquiry_ID"]) ?></b> has been updated.</p>
<p>Status: <b><?= htmlspecialchars($data["lead_status"]) ?></b></p>
</div>
</body>
</html>
