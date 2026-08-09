<?php
$success = false;
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$data = [
    "student_name" => $_POST['student_name'],
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
        .modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.65);
    justify-content: center;
    align-items: center;
    z-index: 9999;
    padding: 20px;
}

.modal-content {
    background: #fff;
    width: 100%;
    max-width: 500px;
    padding: 28px;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 20px 60px rgba(0,0,0,.25);
    animation: popup .25s ease;
}

.modal-content h2 {
    color: #1f4e79;
    margin-bottom: 18px;
}

#successMessage {
    background: #f5f8fc;
    border: 1px solid #e1e7ef;
    border-radius: 10px;
    padding: 18px;
    margin: 15px 0 20px;
    line-height: 1.6;
    font-size: 15px;
    text-align: left;
    white-space: pre-wrap;
    word-wrap: break-word;
}

.modal button {
    width: auto;
    margin: 5px;
    padding: 11px 20px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
}

@keyframes popup {
    from {
        opacity: 0;
        transform: scale(.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
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

<!-- Enquiry Type -->
<label for="enquiry_type">What are you enquiring about?</label>
<select
    id="enquiry_type"
    name="enquiry_type"
    required
>
    <option value="" selected disabled>-- Select Enquiry Type --</option>

    <option value="Course Enquiry">Course / Training</option>
    <option value="Software Project">Software / Project Development</option>
    <option value="Website Development">Website Development</option>
    <option value="Mobile App Development">Mobile App Development</option>
    <option value="AI & Automation">AI / Automation</option>
    <option value="Internship">Internship</option>
    <option value="Other">Other Enquiry</option>
</select>


<!-- ========================= -->
<!-- COURSE SECTION -->
<!-- ========================= -->

<div id="courseSection" style="display:none;">

    <!-- Course -->
    <label for="course_name">Select Course</label>
    <select
        id="course_name"
        name="course_name"
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
    >
        <option value="" selected disabled>
            -- Select Training Mode --
        </option>

        <option value="Online">Online Live Training</option>
        <option value="Offline">Offline Classroom Training</option>
        <option value="Hybrid">Hybrid Training</option>
    </select>

</div>


<!-- ========================= -->
<!-- PROJECT SECTION -->
<!-- ========================= -->

<div id="projectSection" style="display:none;">

    <label for="project_type">Project Type</label>

    <select
        id="project_type"
        name="project_type"
    >
        <option value="" selected disabled>
            -- Select Project Type --
        </option>

        <option value="Custom Software">Custom Software</option>
        <option value="ERP / Management System">
            ERP / Management System
        </option>
        <option value="E-Commerce">E-Commerce</option>
        <option value="Web Application">Web Application</option>
        <option value="Other">Other</option>
    </select>

</div>


<!-- ========================= -->
<!-- MOBILE APP SECTION -->
<!-- ========================= -->

<div id="mobileSection" style="display:none;">

    <label for="app_type">Application Type</label>

    <select
        id="app_type"
        name="app_type"
    >
        <option value="" selected disabled>
            -- Select Application Type --
        </option>

        <option value="Android App">Android App</option>
        <option value="iOS App">iOS App</option>
        <option value="Android & iOS">
            Android & iOS
        </option>
    </select>

</div>


<!-- ========================= -->
<!-- GENERAL REQUIREMENTS -->
<!-- ========================= -->

<div id="requirementsSection" style="display:none;">

    <label for="requirements">Requirements / Details</label>

    <textarea
        id="requirements"
        name="requirements"
        rows="5"
        maxlength="2000"
        placeholder="Describe your requirement..."
    ></textarea>

</div>


<!-- ========================= -->
<!-- MOBILE NUMBER -->
<!-- ========================= -->

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


<!-- ========================= -->
<!-- QUESTION -->
<!-- ========================= -->

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
        <h2>🤖 AI Response</h2>

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
document.getElementById("enquiryForm").addEventListener("submit", async function(e) {

    e.preventDefault();

    const form = this;
    const button = document.getElementById("submitBtn");

    button.disabled = true;
    button.innerText = "Sending...";

    const formData = new FormData(form);

    // ================================
    // DATA SENT TO n8n WEBHOOK1
    // ================================

    const data = {
        student_name: formData.get("student_name"),
        enquiry_type: formData.get("enquiry_type"),

        // Course / Training
        course_name: formData.get("course_name"),
        trainingmode: formData.get("trainingmode"),

        // Software / Website
        project_type: formData.get("project_type"),

        // Mobile App
        app_type: formData.get("app_type"),

        // General Requirements
        // Will be empty for Course / Training
        requirements: formData.get("requirements") || "",

        // Common fields
        mobilenumber: formData.get("mobilenumber"),
        question: formData.get("question")
    };


    // ================================
    // CONSOLE DEBUG
    // ================================

    console.log("FORM:", form);

    console.log(
        "student_name:",
        formData.get("student_name")
    );

    console.log(
        "enquiry_type:",
        formData.get("enquiry_type")
    );

    console.log(
        "course_name:",
        formData.get("course_name")
    );

    console.log(
        "trainingmode:",
        formData.get("trainingmode")
    );

    console.log(
        "project_type:",
        formData.get("project_type")
    );

    console.log(
        "app_type:",
        formData.get("app_type")
    );

    console.log(
        "requirements:",
        formData.get("requirements")
    );

    console.log(
        "mobilenumber:",
        formData.get("mobilenumber")
    );

    console.log(
        "question:",
        formData.get("question")
    );

    console.log("DATA:", data);

    console.log(
        "Data being sent to n8n:",
        JSON.stringify(data, null, 2)
    );


    // ================================
    // SEND TO n8n WEBHOOK1
    // ================================

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


        // ================================
        // GET n8n RESPONSE
        // ================================

        const responseText = await response.text();

        console.log(
            "HTTP Status:",
            response.status
        );

        console.log(
            "Response:",
            responseText
        );


        // ================================
        // CHECK ERROR
        // ================================

        if (!response.ok) {

            throw new Error(
                "HTTP " +
                response.status +
                ": " +
                responseText
            );
        }


        // ================================
        // PROCESS AI RESPONSE
        // ================================

        let aiResponse = responseText;

        try {

            const jsonResponse =
                JSON.parse(responseText);

            aiResponse =
                jsonResponse.response ||
                jsonResponse.output ||
                jsonResponse.message ||
                jsonResponse.text ||
                responseText;

        } catch (e) {

            // n8n returned plain text

        }


        // ================================
        // SHOW SUCCESS MODAL
        // ================================

        document.getElementById(
            "successMessage"
        ).innerText = aiResponse;

        showSuccess();


        // ================================
        // RESET FORM
        // ================================

        form.reset();


        // Reset dynamic sections after form reset
        if (typeof updateEnquiryFields === "function") {
            updateEnquiryFields();
        }


    } catch (error) {

        console.error(
            "Webhook Error:",
            error
        );

        alert(
            "Webhook Error:\n\n" +
            error.message
        );


    } finally {

        button.disabled = false;
        button.innerText = "Submit Enquiry";

    }

});


// ======================================
// SUCCESS MODAL
// ======================================

function showSuccess() {

    document.getElementById(
        "successModal"
    ).style.display = "flex";

}


// ======================================
// CLOSE MODAL
// ======================================

function closeModal() {

    document.getElementById(
        "successModal"
    ).style.display = "none";

    location.reload();

}


// ======================================
// OPEN WHATSAPP
// ======================================

function openWhatsApp() {

    window.open(
        "https://wa.me/919579746773",
        "_blank"
    );

}
</script>
<script>
const enquiryType = document.getElementById("enquiry_type");

const courseSection = document.getElementById("courseSection");
const projectSection = document.getElementById("projectSection");
const mobileSection = document.getElementById("mobileSection");

const courseName = document.getElementById("course_name");
const trainingMode = document.getElementById("trainingmode");
const projectType = document.getElementById("project_type");
const requirementsSection = document.getElementById("requirementsSection");
const requirements = document.getElementById("requirements");
const appType = document.getElementById("app_type");

enquiryType.addEventListener("change", function () {

    // Hide all sections
    courseSection.style.display = "none";
    projectSection.style.display = "none";
    mobileSection.style.display = "none";

    // Show Requirements by default
    requirementsSection.style.display = "block";

    // Remove required attributes
    courseName.required = false;
    trainingMode.required = false;
    projectType.required = false;
    appType.required = false;
    requirements.required = false;

    // COURSE / TRAINING
    if (this.value === "Course Enquiry") {

        courseSection.style.display = "block";

        courseName.required = true;
        trainingMode.required = true;

        // Requirements NOT needed for courses
        requirementsSection.style.display = "none";
        requirements.value = "";
    }

    // SOFTWARE / WEBSITE
    else if (
        this.value === "Software Project" ||
        this.value === "Website Development"
    ) {

        projectSection.style.display = "block";

        projectType.required = true;

        // Requirements needed
        requirementsSection.style.display = "block";
    }

    // MOBILE APP
    else if (this.value === "Mobile App Development") {

        mobileSection.style.display = "block";

        appType.required = true;

        // Requirements needed
        requirementsSection.style.display = "block";
    }

    // AI / AUTOMATION
    else if (this.value === "AI & Automation") {

        requirementsSection.style.display = "block";
    }

    // INTERNSHIP
    else if (this.value === "Internship") {

        // No general requirements
        requirementsSection.style.display = "none";
        requirements.value = "";
    }

    // OTHER
    else if (this.value === "Other") {

        requirementsSection.style.display = "block";
    }

});
</script>
</body>
</html>