<?php
  include('include/header.php');
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
            } else {
                $success_message = "Error: " . $stmt->error;
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


<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Contact Us</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-7">
    <div class="container">
    <?php echo @$msg;?>
        <div class="main-title">
            <h1>Contact Us</h1>
            <p>For More Details Please Fill Form With Your Query Our Team Connect You.</p>
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <form  method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="mobile" class="form-control" placeholder="Number" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Write message" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 offset-lg-1">
                <div class="contact-info">
                    <h3>Contact Info</h3>
                    <div class="media">
                        <i class="fa fa-map-marker"></i>
                        <div class="media-body">
                            <h5>Office Address</h5>
                            <p>Darbar galli Nandura</p>
                        </div>
                    </div>
                    <div class="media">
                        <i class="fa fa-phone"></i>
                        <div class="media-body">
                            <h5>Phone Number</h5>
                            <p>Office: <a href="tel:8956210047">8956210047</a></p>
                            <p>Mobile: <a href="tel:9423166190">9423166190</a></p>
                        </div>
                    </div>
                    <div class="media">
                        <i class="fa fa-envelope"></i>
                        <div class="media-body">
                            <h5>Email Address</h5>
                            <p><a href="mailto:info@gauravbhavsar.com">info@gauravbhavsar.com</a></p>
                            <p><a href="mailto:info@ommuhre.com">info@ommuhre.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact 1 end -->

<script>
        // Responsive Navbar Toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const navbarUl = document.querySelector('.navbar ul');

        menuToggle.addEventListener('click', () => {
            navbarUl.classList.toggle('active');
        });
    </script>


<!-- Footer -->
<?php include('include/footer.php'); ?>
