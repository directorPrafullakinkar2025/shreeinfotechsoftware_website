<?php
$success = false;
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$data = [
    "student_name" => $_POST['name'],
    "mobilenumber" => $_POST['mobilenumber'],
    "course_name" => $_POST['course_name'],
    "question" => $_POST['question']
];
$webhook="https://shreeinfotechsoftware.app.n8n.cloud/webhook/website-enquiry";

$ch = curl_init($webhook);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_exec($ch);


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Course Enquiry Form</title>
  <link rel="stylesheet" href="style.css">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f7fb;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            width:420px;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 5px 15px rgba(0,0,0,0.15);
        }

        h2{
            text-align:center;
            color:#1f4e79;
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-top:15px;
            margin-bottom:6px;
            font-weight:bold;
        }

        input, select, textarea{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
            font-size:15px;
        }

        textarea{
            resize:vertical;
        }

        button{
            width:100%;
            margin-top:20px;
            padding:12px;
            background:#1f4e79;
            color:#fff;
            border:none;
            border-radius:5px;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#163b5c;
        }
        .modal{
    display:none;
    position:fixed;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.5);
    justify-content:center;
    align-items:center;
}

.modal-content{
    background:#fff;
    width:430px;
    padding:20px;
    border-radius:10px;
    text-align:left;
}

#successMessage{
    margin-top:15px;
    line-height:1.25;
    font-size:14px;
    white-space:normal;
    word-wrap:break-word;
}

.modal button{
    margin:8px;
    padding:10px 20px;
}
    </style>
</head>

<body>
    <nav>
      <div class="logo"><h3>Shreeinfotech Software Development Pvt. Ltd.</h3>
        <p class="logo-p">Innovating for Agriculture & Education</p>
      </div>
       <button class="menu-toggle">☰</button>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="#courses">All Courses</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="exam_html_login.html">Exam login</a></li>

    </ul>
  </nav>
<div class="info-container">

    <h2>Programming Course Enquiry</h2>
<form id="enquiryForm">

    <!-- Full Name -->
    <label for="student_name">Full Name</label>
    <input
        type="text"
        id="student_name"
        name="student_name"
        placeholder="Enter your full name"
        minlength="2"
        maxlength="100"
        autocomplete="name"
        required
    >

    <!-- Course -->
    <label for="course_name">Select Course</label>
    <select
        id="course_name"
        name="course_name"
        required
    >
        <option value="" selected disabled>-- Select Course --</option>

        <option value="Python">Python</option>
        <option value="Java">Java</option>
        <option value="C Programming">C Programming</option>
        <option value="C++">C++</option>
        <option value="JavaScript">JavaScript</option>
        <option value="Mongo DB">Mongo DB</option>
        <option value="React.JS">React.JS</option>
        <option value="Node.JS">Node.JS</option>
        <option value="Express.js">Express.js</option>
        <option value="DSA">DSA</option>
        <option value="HTML & CSS">HTML & CSS</option>
        <option value="Full Stack Web Development">
            Full Stack Web Development
        </option>
    </select>

    <!-- Training Mode -->
    <label for="trainingmode">Select Training Mode</label>
    <select
        id="trainingmode"
        name="trainingmode"
        required
    >
        <option value="" selected disabled>
            -- Select Training Mode --
        </option>

        <option value="Online">Online Live Training</option>
        <option value="Offline">Offline Classroom Training</option>
        <option value="Hybrid">Hybrid Training</option>
    </select>

    <!-- Mobile Number -->
    <label for="mobilenumber">Mobile Number</label>
    <input
        type="tel"
        id="mobilenumber"
        name="mobilenumber"
        pattern="[0-9]{10}"
        minlength="10"
        maxlength="10"
        inputmode="numeric"
        autocomplete="tel"
        placeholder="Enter 10-digit mobile number"
        title="Please enter a valid 10-digit mobile number"
        required
    >

    <!-- Question -->
    <label for="question">Your Question</label>
    <textarea
        id="question"
        name="question"
        rows="5"
        minlength="3"
        maxlength="1000"
        placeholder="Type your question here..."
        required
    ></textarea>

    <!-- Submit -->
    <button type="submit" id="submitBtn">
        Submit Enquiry
    </button>

</form>
</div>

...
</div> <!-- End of your .container -->

<!-- Success Modal -->
<div id="successModal" class="modal">
    <div class="modal-content">
        <h2>✅ Enquiry Submitted</h2>

        <p id="successMessage">
            <?php echo $message; ?>
        </p>

        <!-- <button onclick="downloadReceipt()">
            ⬇ Download Details
        </button> -->

        <button onclick="openWhatsApp()">
            💬 Open WhatsApp
        </button>

        <button onclick="closeModal()">
            Close
        </button>
    </div>
</div>
<script>

function showSuccess(){
    document.getElementById("successModal").style.display="flex";
}

function closeModal(){
    document.getElementById("successModal").style.display="none";
    location.reload();
}

function downloadReceipt(){
    window.open("download_receipt.php","_blank");
}

function openWhatsApp(){
    window.open("https://wa.me/919579746773","_blank");
}

</script>
<?php if($success){ ?>
<script>
window.onload=function(){
    showSuccess();
};
</script>
<?php } ?>

<script>
function showSuccess(){
    document.getElementById("successModal").style.display="flex";
}

function closeModal(){
    document.getElementById("successModal").style.display="none";
    window.location.href = window.location.pathname;
}

function downloadReceipt(){
    window.open("download_receipt.php","_blank");
}
</script>
<script>
try {
    const response = await fetch(
        "https://shreeinfotechsoftware.app.n8n.cloud/webhook/website-enquiry",
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }
    );

    const responseText = await response.text();

    console.log("HTTP Status:", response.status);
    console.log("Response:", responseText);

    if (!response.ok) {
        throw new Error(
            "HTTP " + response.status + ": " + responseText
        );
    }

    document.getElementById("successMessage").innerText =
        "Thank you " + data.name +
        ". Your enquiry has been received successfully.";

    showSuccess();
    form.reset();

} catch (error) {

    console.error("Webhook Error:", error);

    alert(
        "Webhook Error:\n\n" + error.message
    );

} finally {

    button.disabled = false;
    button.innerText = "Submit Enquiry";

}
</script>
</body>
</html>