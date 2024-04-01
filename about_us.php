<?php 
    define('__CONFIG__', true);
    require_once "inc/config.php";
    
    // Page::ForceToDashboard($con);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My Leg Up is a recruiting resource offered to college students and universities across the country."/>
    <title>My Leg Up</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/mlu_favicon.png">
    <link rel="stylesheet" href="css/landing/aboutus.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Need CSS THIS WILL BE HOMEPAGE -->
</head>
<body>
    <section class="insom-sect">
        <section class="header">
            <nav>
                <a href="https://mylegup.co/"><img src="../images/logos/navlogo.png" alt="MLU Logo"></a>
                <div class="nav-links" id="navlinks">
                    <i class="bi bi-x-lg" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="https://mylegup.co/login_reg.php">Login/Register</a></li>
                        <li><a href="https://mylegup.co/admin_dashboard.php">Admin Dashboard</a></li>
                        <li><a href="https://mylegup.co/about_us.php">About Us</a></li>
                    </ul>
                </div>
                <i class="bi bi-justify" onclick="showMenu()"></i>
            </nav>
        </section>
        <section class="hero">
            <div class="hero-heading">
                <h2>About Us</h2>
            </div>
            <div class="hero-container">
                <div class = "hero-content">
                    <h2>The Story Behind My Leg Up</h2>
                    <p>Welcome to My Leg Up. As the co-founders of the website, we wanted to use this page to explain why My Leg Up exists.</p>
                    <p>Back in the Spring of 2022, we both recruited for investment banking internships. To state it simply, the process was a mess. We struggled to organize our network and application deadlines, we weren’t sure how to get unbiased information about each firm, and we didn’t know how to best study for technical interviews. We lacked a guiding resource to help navigate us through the nuances of the recruiting process.</p>
                    <p>For this reason, we created My Leg Up: so we could be that guiding resource for undergraduate students in the recruiting process. Since September 2022, we’ve worked on creating the best website possible. After a successful first 9 months; we’re excited to keep pushing the website forward.</p>
                    <p>We’re looking forward to working with our users to keep improving the website, so don’t hesitate to reach out with any questions, comments, or ideas to mylegupc@mylegup.co. Together, we can help ease the stress and anxiety that students face throughout undergraduate job and internship recruitment.</p>
                    <button class="insta_btn">Click Here for Our Instagram</button>
            </div>
            <div class="hero-image">
                <img src="../images/landing/aboutus/abkpis.png" class="ab_us_img">
            </div>
        </div>
        </section>
    </section>
    
    
    <!--Next Section-->
    
    <footer>
        <div class="footer_cont">
            <img src="../images/logos/mlu_tranlg.png" alt="MLU logo" class="foot_logo"><br>
            <span><a href="about_us.php" class="about_us_link" target="blank">About Us</a></span>
            <span><a href="privacypolicy.php" class="privacypol_link" target="blank">Privacy Policy</a></span>
            <span><a href="pdf/TermsAndCons.pdf" class="privacypol_link" target="blank">Terms and Conditions</a></span>
            <span><p>My Leg Up LLC - support@mylegup.co</p></span>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>
    <!-- JS toggling menu -->
    <script>
        var navlinks = document.getElementById("navlinks")
        function showMenu(){
            navlinks.style.right = "0px"
        }
        function hideMenu(){
            navlinks.style.right = "-200px"
        }
    </script>
</body>
</html>