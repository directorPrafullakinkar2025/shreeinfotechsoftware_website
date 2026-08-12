<?php
// Counselor CRM Update Form
// No CRM credentials are stored here.
// This form sends the counselor's result to the n8n webhook.

$n8nWebhookUrl = "https://shreeinfotechsoft.com/webhook/counselor-lead-update";

function clean($value) {
    return trim((string)$value);
}
