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
    <link rel="stylesheet" href="css/landing/newhome/landing_properties.css">
    <link rel="stylesheet" href="css/landing/newhome/bottom_bubbles.css">
    <link rel="stylesheet" href="css/landing/newhome/reactive_landing.css">
    <link rel="stylesheet" href="css/landing/newhome/pre_login_nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Need CSS THIS WILL BE HOMEPAGE -->
</head>
<body>
    <div class="header_cont">
        <a href="landing.php">
            <img src="../images/headshots/ab_us_logo.png" alt="MLU logo" class="header_logo">
        </a>
        <nav>
            <div class="links">
                <a href="login_reg.php"><p class="innernav_txt">Login/Register</p></a>
                <a href="admin_dashboard.php"><p class="innernav_txt">Administrative Dashboard</p></a>
                <a href="about_us.php"><p class="innernav_txt">About Us</p></a>
            </div>
        </nav>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </div>
    <div class="dropdown_links">
        <a href="login_reg.php"><p class="drop_innernav_txt drop_current_nav">Student Dashboard</p></a>
        <a href="admin_dashboard.php"><p class="drop_innernav_txt">Administrative Dashboard</p></a>
        <a href="about_us.php"><p class="drop_innernav_txt">About Us</p></a>
    </div>
    <div class="biggest_cont">
        <div class="slogan_mission_cont">
            <p class="slogan">Recruiting Made Simple</p>
            <p class="mission">We strive to ease stress and anxiety college students experience while recruiting for internships</p>
            <img src="../images/logos/oursk.jpg" alt="MLU logo" class="body_img">
        </div>
        <div class="target_container">
            <div class="body_cont">
                <span class="body_item_cont">
                    <div class="content_bubble">
                        <p class="bubble_header">Login/Registration</p>
                        <p class="bubble_text">Below is the link to login/register. Click here to create a free account now!</p>
                        <a href="login_reg.php"><img src="../images/random/landing_bubbles/login_sc.png" alt="login link" class="login_img"></a>
                    </div>
                </span>
                <span class="body_item_cont">
                    <div class="content_bubble">
                        <p class="bubble_header">Demo Video</p>
                        <p class="bubble_text">To learn more about how My Leg Up works, watch the video below.</p>
                        <iframe class="video" src="https://www.youtube.com/embed/KzbypkG7kJY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </span>
                <span class="body_item_cont">
                    <div class="content_bubble">
                        <p class="bubble_header">User Success</p>
                        <p class="bubble_text">In our first active recruiting cycle, My Leg Up users have landed internships at these top firms:</p>
                        <img src="../images/landing/companies.png" alt="MLU Success Companies" class="companies_img">
                    </div>
                </span>
                <!--<span class="body_item_cont">-->
                <!--    <div class="content_bubble story_bubble_cont">-->
                <!--            <p class="bubble_header">Success Stories</p>-->
                <!--            <p class=bubble_text>We look forward to growing this with your success stories!</p>-->
                <!--            <div class="story_board">-->
                <!--                <div class="story">-->
                <!--                    <p class="story_header">Looking Forward! - MyLegUp</p>-->
                <!--                    <p class="story_p">In just our first investment banking recruiting cycle MyLegUp has had incredible usage rates and interaction.</p>-->
                <!--                    <p class="story_p">We will fill this up once our users start to get offers! If you benefited from using MyLegUp and are willing to share (even annonymously) email mylegupc@mylegup.co</p>-->
                <!--                </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</span>-->
            </div>
        </div>
        <div class="bottom_target_container">
            <div class="bottom_body_cont">
                <span class="full_bubble">
                    <div class="inner_full_bubble">
                        <div class="full_bubble_content">
                            <div class="new_split_flexes">
                                <div class="wu_stuff_cont">
                                    <div class="wu_bub_written">
                                        <h4>Get The Inside Scoop</h4>
                                        <p>We provide insider information about firms' recruiting processes, reputations, and cultures, through conversations with analysts and interns at each firm.</p>
                                    </div>
                                </div>
                                <div class="nwork_stuff_cont">
                                    <div class="nwork_written">
                                        <h4>Stay Organized</h4>
                                        <p>Our users get access to optimal application trackers and networking tables. We also update and host live applications so you never miss a deadline.</p>
                                    </div> 
                                </div>
                            </div>
                            <div class="new_split_flexes">
                                <div class="bp_stuff_cont">
                                    <div class="bp_bub_written">
                                        <h4>Learn From Experts</h4>
                                        <p>Aggregated, filtered, and organized advice from upperclassmen who recently completed the recruiting process, and placed at top firms.</p>
                                    </div>
                                </div>
                                <div class="vibe_stuff_cont">
                                    <div class="vibe_written">
                                        <h4>Ask Questions</h4>
                                        <p>An anonymous forum feature is available where students can ask questions, gain advice, and hear opinions on different firms and recruiting processes.</p>
                                    </div>    
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
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
    <script src='assets/js/pre_login/pre_login_nav.js'></script>
</body>