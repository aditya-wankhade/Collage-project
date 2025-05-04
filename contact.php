<?php
// PHP for handling form submission
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $servername = "localhost";
            $username = "root"; // Replace with your DB username
            $password = ""; // Replace with your DB password
            $dbname = "realestate"; // Replace with your DB name

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO inquiry (name, subject, email, mobile, message) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $subject, $email, $mobile, $message);


            if ($stmt->execute()) {
                $success_message = "Thank you, $name. Your inquiry has been submitted successfully.";
                echo "<script>alert(' Enquiry send Successfully .. Thanks for your response our team will contact you soon .');</script>";
            } else {
                $success_message = "Error: " . $stmt->error;
                echo "error";
            }

            $stmt->close();
            $conn->close();
        } else {
            $success_message = "Invalid email address.";
        }
    } else {
        $success_message = "All fields except 'Phone' are required.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Poppins:wght@300;500&display=swap" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="assets/css/dropzone.css">
    <link type="text/css" rel="stylesheet" href="assets/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="assets/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/leaflet.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/css/map.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

    <title>Property Dealer</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(to right, #d8cbe7, #2575fc);
            color: #fff;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.85);
            padding: 10px 20px;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar .logo-container img {
            height: 50px;
            width: auto;
            border-radius: 5px;
        }

        .navbar .logo-container .logo-text {
            font-size: 24px;
            font-weight: 600;
            font-family: 'Montserrat', sans-serif;
            color: #fff;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: #fff;
            font-size: 18px;
            font-family: 'Montserrat', sans-serif;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            padding: 5px 10px;
        }

        .navbar ul li a:hover {
            background: #2575fc;
            border-radius: 5px;
        }

        /* Responsive Navbar */
        @media (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
                background: rgba(0, 0, 0, 0.9);
                padding: 10px;
                position: absolute;
                top: 100%;
                right: 0;
                display: none;
                z-index: 1000;
            }

            .navbar ul.active {
                display: flex;
            }

            .navbar .menu-toggle {
                display: block;
                cursor: pointer;
                font-size: 24px;
                color: #fff;
            }
        }

        @media (min-width: 769px) {
            .navbar .menu-toggle {
                display: none;
            }
        }

        /* Container */
        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: 100px auto;
            /* Add space to account for the fixed navbar */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;

        }

        /* Form Section */
        .form-section {
            flex: 1;
            background: #fff;
            color: #333;
            padding: 30px;

        }

        .form-section h1 {
            color: #6a11cb;
        }

        .form-section input,
        .form-section textarea,
        .form-section button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-section button {
            background: #6a11cb;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-section button:hover {
            background: #2575fc;
        }

        /* Contact Info Section */
        .info-section {
            flex: 1;
            background: linear-gradient(to right, #0605052e, #d7b4da);
            padding: 30px;
            color: #fff;
        }

        .info-section h2 {
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .info-item i {
            font-size: 24px;
            margin-right: 15px;
        }

        /* Success Message Box */
        .success-box {
            background: #4caf50;
            color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            display: none;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
                gap: 10px;
            }

            .container {
                flex-direction: column;
            }

            .form-section,
            .info-section {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo-container">
            <a class="navbar-brand logo navbar-brand d-flex w-50 mr-auto" href="index.php">
                <img src="assets/img/logos/black-logo.png" alt="logo">

            </a>
            <div class="logo-text"></div>
        </div>
        <ul style="margin-right:20%">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="properties.php">Property</a></li>
            <li><a href="contact">Contact</a></li>
        </ul>
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </div>

    <!-- Content -->
    <div style="margin-top:8%; text-align: center;">
        <h1>Welcome to Property Hunters </h1>
        <p>For More Details Please Fill Form With Your Query Our Team Connect You.!</p>


        <!-- Content -->
        <div class="container">
            <!-- Form Section -->
            <div class="form-section" id="contact">
                <h1>Contact Us</h1>
                <?php if ($success_message) : ?>
                    <div class="success-box" id="success-box"><?php echo $success_message; ?></div>
                <?php endif; ?>
                <form method="POST" action="">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="text" name="subject" placeholder="Subject">
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="text" name="mobile" placeholder="Your Phone">
                    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>

            <!-- Contact Info Section -->
            <div class="info-section">
                <h2>Contact Info</h2>
                <div class="info-item">
                    <i class="fa fa-map-marker"></i>
                    <p>Darbar galli Nandura</p>
                </div>
                <div class="info-item">
                    <i class="fa fa-phone"></i>
                    <p>+91 8956210047</p>

                </div>
                <div class="info-item">
                    <i class="fa fa-phone"></i>
                    <p>+91 9423166190</p>

                </div>
                <div class="info-item">
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:info@example.com" style="color:white">info@example.com</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Responsive Navbar Toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const navbarUl = document.querySelector('.navbar ul');

        menuToggle.addEventListener('click', () => {
            navbarUl.classList.toggle('active');
        });
    </script>


</body>

</html>