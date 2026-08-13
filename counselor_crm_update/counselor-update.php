
<?php
$leadId = $_GET['Enquiry_ID'] ?? '';

if ($leadId === '') {
    die('Lead ID is missing.');
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Counselor Lead Update</title>
<style>
*{box-sizing:border-box}
body{margin:0;font-family:Arial,sans-serif;background:#f4f7fb;color:#172033}
.container{max-width:650px;margin:35px auto;padding:15px}
.card{background:#fff;border-radius:16px;padding:28px;box-shadow:0 10px 30px rgba(0,0,0,.08)}
h1{margin:0 0 8px;color:#124a91}
.subtitle{color:#667085;margin-bottom:25px}
label{display:block;font-weight:700;margin:16px 0 7px}
input,select,textarea{width:100%;padding:12px;border:1px solid #cbd5e1;border-radius:9px;font-size:15px}
textarea{min-height:110px;resize:vertical}
button{width:100%;padding:14px;margin-top:22px;border:0;border-radius:9px;background:#1255a0;color:white;font-size:16px;font-weight:700;cursor:pointer}
.note{background:#eef5ff;padding:12px;border-radius:9px;font-size:14px;color:#344054}
.required{color:#d92d20}
</style>
</head>
<body>
<div class="container">
<div class="card">
<h1>Counselor Lead Update</h1>
<div class="subtitle">Complete this form after speaking with the student.</div>

<div class="note">
Lead ID: <b><?= htmlspecialchars($leadId) ?></b>
</div>
<form method="post" action="submit-counselor-update.php">

<input type="hidden" name="Enquiry_ID" value="<?= htmlspecialchars($leadId) ?>">

<label>Student Name</label>
<input type="text" name="student_name" placeholder="Student name">

<label>Student Phone</label>
<input type="tel" name="phone" placeholder="Phone number">

<label>Course</label>
<input type="text" name="course" placeholder="Course">

<label>Call Result <span class="required">*</span></label>
<select name="call_result" required>
<option value="">Select result</option>
<option value="Interested">Interested</option>
<option value="Not Interested">Not Interested</option>
<option value="Call Back Later">Call Back Later</option>
<option value="No Answer">No Answer</option>
<option value="Admission Confirmed">Admission Confirmed</option>
</select>

<label>Interested?</label>
<select name="interested">
<option value="">Select</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>

<label>Final Lead Status <span class="required">*</span></label>
<select name="lead_status" required>
<option value="">Select status</option>
<option value="Follow-up Required">Follow-up Required</option>
<option value="Ready To Join">Ready To Join</option>
<option value="Enrolled">Enrolled</option>
<option value="Not Interested">Not Interested</option>
<option value="Lost">Lost</option>
</select>

<label>Next Follow-up Date</label>
<input type="date" name="follow_up_date">

<label>Counselor Name</label>
<input type="text" name="counselor_name" placeholder="Counselor name">

<label>Counselor Notes</label>
<textarea name="notes" placeholder="Enter important details from the call..."></textarea>

<button type="submit">Update CRM</button>
</form>
</div>
</div>
</body>
</html>
