<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = [
        'name' => $_POST['name'],
        'course' => $_POST['course'],
        'mobilenumber' => $_POST['mobilenumber'],
        'question' => $_POST['question']
    ];

    $ch = curl_init("https://shreeinfotechsoftware.app.n8n.cloud/webhook/website-enquiry");

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {

        echo "cURL Error: " . curl_error($ch);

    } else {

        // Debug
        echo "<pre>";
        echo "HTTP Code: " . $httpCode . "\n";
        echo "Response:\n";
        echo $response;
        echo "</pre>";

        $result = json_decode($response, true);

        if ($httpCode == 200 && !empty($result['success'])) {
            echo "<script>alert('".$result['message']."');</script>";
        } else {
            echo "<script>alert('Submission failed');</script>";
        }
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Course Enquiry Form</title>

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
    </style>
</head>

<body>

<div class="container">

    <h2>Programming Course Enquiry</h2>

    <form action="https://shreeinfotechsoftware.app.n8n.cloud/webhook/website-enquiry" method="POST">

        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>

        <label>Select Course</label>
        <select name="course" required>
            <option value="">-- Select Course --</option>
            <option>Python</option>
            <option>Java</option>
            <option>C Programming</option>
            <option>C++</option>
            <option>JavaScript</option>
            <option>Mongo DB</option>
            <option>React.JS</option>
            <option>Node.JS</option>
            <option>Express.js</option>
            <option>DSA</option>
            <option>HTML & CSS</option>
            <option>Full Stack Web Development</option>
        </select>

        
        <label>Select Training Mode</label>
        <select name="trainingmode" required>
            <option value="">-- Select Training Mode --</option>
            <option>Online</option>
            <option>Offline</option>
            <option>Hybrid</option>
        </select>

        <label>Mobile Number</label>
        <input
            type="tel"
            name="mobilenumber"
            pattern="[0-9]{10}"
            maxlength="10"
            placeholder="Enter 10-digit mobile number"
            required>

        <label>Your Question</label>
        <textarea
            name="question"
            rows="5"
            placeholder="Type your question here..."
            required></textarea>

        <button type="submit">Submit Enquiry</button>

    </form>

</div>

</body>
</html>