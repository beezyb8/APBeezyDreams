<?php
    define('__CONFIG__', true);
    require_once "inc/config.php";
    
    Page::ForceLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leg Up</title>
    <link rel="icon" type="image/x-icon" href="/images/logos/mlu_favicon.png">
    <link rel="stylesheet" href="css/navbar/non_dash_nav.css">
    <link rel="stylesheet" href="css/cements/cements.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
<nav class="nav_bar_sticky">
        <div class="logocont">
            <img src="../images/logos/navlogo.png" alt="MLU logo" class="logo" height="80px">
        </div>
        <div class="links">
            <a href="dashboard.php"><p class="innernav_txt">Dashboard</p></a>
            <a href="allcontacts.php"><p class="innernav_txt">Network</p></a>
            <a href="timing.php"><p class="innernav_txt">Applications</p></a>
            <?php
                $user_id = (int)$_SESSION['user_id'];
                $usersql = "SELECT * FROM users WHERE user_id = :user_id";
                $userinfo = $con->prepare($usersql);
                $userinfo->bindParam('user_id', $user_id);
                $userinfo->execute();
                $user = $userinfo->fetch(PDO::FETCH_ASSOC);
                if($user['mcheck'] == 1) : ?>
                    <a href="bestpractices.php">
                <?php else : ?>
                    <a href="bestpractices_neut.php">
            <?php endif; ?>
            <p class="innernav_txt">Best Practices</p></a>
            <a href="announcements.php"><p class="innernav_txt current_nav">Announcements</p></a>
            <a href="accountpage.php"><p class="innernav_txt">Your Account</p></a>
        </div>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </nav>
        <div class="dropdown_links">
            <a href="dashboard.php"><p class="drop_innernav_txt">Dashboard</p></a>
            <a href="allcontacts.php"><p class="drop_innernav_txt">Network</p></a>
            <a href="timing.php"><p class="drop_innernav_txt">Applications</p></a>
            <?php
                $user_id = (int)$_SESSION['user_id'];
                $usersql = "SELECT * FROM users WHERE user_id = :user_id";
                $userinfo = $con->prepare($usersql);
                $userinfo->bindParam('user_id', $user_id);
                $userinfo->execute();
                $user = $userinfo->fetch(PDO::FETCH_ASSOC);
                if($user['mcheck'] == 1) : ?>
                    <a href="bestpractices.php">
                <?php else : ?>
                    <a href="bestpractices_neut.php">
            <?php endif; ?>
            <p class="drop_innernav_txt">Best Practices</p></a>
            <a href="announcements.php"><p class="drop_innernav_txt drop_current_nav">Announcements</p></a>
            <a href="accountpage.php"><p class="drop_innernav_txt">Your Account</p></a>
        </div>
    <div class="bodycont">
        <div class="contcont_body">
            <div class="cont_body">
                <h2 class="header">Announcements</h2>
                <div class="anc_cont">
                    <div class="cm_tag admin_cm_tag">
                        <h3 class="anc_tag_head">Admin</h3>
                        <i class="bi bi-arrow-down-short arrow" id="arrowdown"></i>
                        <i class="bi bi-arrow-up-short arrow" id="arrowup"></i>
                    </div>
                    <div class="anc_stuff_cont admin_hide_show">
                        <div class = "anc_head">
                            <h3 class="anc_title">About Us / Privacy</h3>
                            <p class="anc_date">1/15/2022</p>
                        </div>
                        <div class="anc_text_cont">
                            <p class="anc_text">Hey everyone, welcome to My Leg Up. We created this announcements page as an easy way to communicate with everyone on the platform. As the recruiting process continues and we add information or implement new features to the website, we wanted to have this quick way of telling you all. We also wanted to introduce ourselves so you can get to know the people and the story behind the website. Our names are Nate Ramras and Brandon Behar. We are BBA Juniors and have been friends since coming to Michigan. We both recruited last year and found it genuinely difficult to keep our network and applications organized, all while learning about the banks, studying technicals, and preparing for interviews. For this reason, we created My Leg Up with the goal of turning investment banking recruiting into a less stressful process.
                            </p>
                            <p class="anc_text">Throughout the first week, we’ve seen great engagement with the website; we really appreciate all your interest and are thrilled that you are finding it so useful! However, a couple students have reached out to us with some concerns over the privacy of their accounts and contacts. We want to make it as clear as possible that your information is private and will not be sold. We treat privacy extremely seriously, and are currently working on a terms of service agreement which will be posted shortly. As stated before, our company’s mission is to make the recruiting process easier and less stressful for our users. As a part of this we ensure that all your information is confidential and protected.
                            </p>
                            <p class="anc_text">One last thing: please reach out to support@mylegup.co if you run into any problems or have any feedback for us. 
                            </p>
                            <p class="mylegupllc">My Leg Up LLC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='assets/js/announcements.js'></script>
    <?php require_once "inc/footer.php"; ?>
</body>
</html>