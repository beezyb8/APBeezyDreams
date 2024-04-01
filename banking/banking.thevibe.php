<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    // Page::ForceLogin();


$userid = (int)$_SESSION['user_id'];

$usersql = "SELECT * FROM users WHERE user_id = :user_id";
$userinfo = $con->prepare($usersql);
$userinfo->bindParam('user_id', $userid);
$userinfo->execute();
$user = $userinfo->fetch(PDO::FETCH_ASSOC);

$firmsql = "SELECT * FROM ibfirms WHERE userid = :userid order by display_order";
$getfirms_list = $con->prepare($firmsql);
$getfirms_list->bindParam(':userid', $userid);
$getfirms_list->execute();
$ibfirms = $getfirms_list->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leg Up</title>
    <link rel="icon" type="image/x-icon" href="/images/logos/mlu_favicon.png">
    <link rel="stylesheet" href="css/thevibe/vibe_general.css">
    <link rel="stylesheet" href="css/thevibe/vibe_reply.css">
    <link rel="stylesheet" href="css/thevibe/vibe_nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <nav class="nav_bar_sticky">
        <div class="logocont">
            <img src="../images/logos/navlogo.png" alt="MLU logo" class="logo" height="80px">
        </div>
        <div class="links">
            <a href="banking.dashboard.php"><p class="innernav_txt">Dashboard</p></a>
            <a href="banking.thevibe.php"><p class="innernav_txt current_nav">The Street</p></a>
            <a href="banking.allcontacts.php"><p class="innernav_txt">Network</p></a>
            <a href="banking.applications.php"><p class="innernav_txt">Applications</p></a>
            <a href="banking.bestpractices.php"><p class="innernav_txt">Best Practices</p></a>
            <a href="banking.accountpage.php"><p class="innernav_txt">Your Account</p></a>
        </div>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </nav>
        <div class="dropdown_links">
            <a href="banking.dashboard.php"><p class="drop_innernav_txt">Dashboard</p></a>
            <a href="banking.thevibe.php"><p class="drop_innernav_txt drop_current_nav">The Street</p></a>
            <a href="banking.allcontacts.php"><p class="drop_innernav_txt">Network</p></a>
            <a href="banking.applications.php"><p class="drop_innernav_txt">Applications</p></a>
            <a href="banking.bestpractices.php"><p class="drop_innernav_txt">Best Practices</p></a>
            <a href="banking.accountpage.php"><p class="drop_innernav_txt">Your Account</p></a>
        </div>
    <div class = "outside_table_container">
        <div class="the_vibe">
                        <!--<div class="vibe_header">-->
                        <!--    <h3 class="vibe_title">The Vibe</h3>-->
                        <!--    <h3 class="vibe_today_date"><?php echo date("m/d/y");?></h3>-->
                        <!--</div>-->
                        <div class="vibe_body">
                            <div class="vibe_create">
                                <div class="vibe_header_text">
                                    <h3>Welcome to The Street</h3>
                                    <p>The Street is a place where students can annonymously share and reply about their experiences recruiting at different firms. Help build the My Leg Up community by posting and answering your peers.</p>
                                </div>
                                <form class="create_a_vibe">
                                    <div class="vibe_create_header">
                                        <span class="vibe_create_title">
                                            <input class="vibe_title_input" id="vibe_title_id" type="text" name="name" placeholder="Title Your Post" required="required">
                                        </span>
                                        <span class="vibe_create_pickbank">
                                            <select class="vibe_pick_post_bank" id="TBD" required="required" name="vibe_pick_bank">
                                                <option value="" disabled selected>--Select Firm/General--</option>
                                                <option value="General"> General </option>
                                                <option value="" disabled>----------</option>
                                                <?php foreach($ibfirms as $firm){?>
                                                    <option value="<?php echo $firm['firm']?>"><?php echo $firm['firm']?></option>
                                                <?php } ?>
                                            </select>
                                        </span>
                                        <span class="vibe_create_pickwhen">
                                            <select class="vibe_pick_post_release" id="TBD" required="required" name="vibe_pick_when">
                                                <option value="">--Select Post Release--</option>
                                                <option value="asap">ASAP</option>
                                                <option value="next">For Next Year</option>
                                            </select>
                                        </span>
                                        <span class="vibe_create_picksub">
                                            <select class="vibe_pick_post_subject" id="TBD" required="required"  name="vibe_pick_sub">
                                                <option value="">--Select Post Subject--</option>
                                                <option value="Opinion">Opinion</option>
                                                <option value="Question">Question</option>
                                                <option value="Application Advice">Application Advice</option>
                                                <option value="Networking">Networking</option>
                                                <option value="Behavioral Interviews">Behavioral Interviews</option>
                                                <option value="Technical Interviews">Technical Interviews</option>
                                                <option value="Hirevue">Hirevue</option>
                                                <option value="1st Round Interview">1st Round Interview</option>
                                                <option value="Superday">Superday</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </span>
                                    </div>
                                    <div class="vibe_create_content">
                                        <textarea maxlength="20000" class="vibe_create_textarea" name="vibe_post_textarea" placeholder="Speak Your Truth...."></textarea>
                                    </div>
                                    <button class="vibe_post_submit_btn">Submit Post</button>
                                </form>
                            </div>
                            <div class="vibe_show">
                                <div class="search-bar">
                                    <i class='bi bi-search'></i>
                                    <input type="text" class="search_in" id="search_for" placeholder="Search...">
                                </div>
                                <select class="show_sel" id="show_selector" name="show">
                                    <option value="" disabled selected>-- Filter By --</option>
                                    <option class="sel_filt" value=" ">Show All</option>
                                    <option class="sel_filt" value="General">General</option>
                                    <option class="sel_filt" value="<?php echo $user['school']?>"><?php echo $user['school']?></option>
                                <?php foreach($ibfirms as $firm){?>
                                    <option class="sel_filt" value="<?php echo $firm['firm']?>"><?php echo $firm['firm']?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="vibe_post">
                            </div>
                        </div></div>
    </div>
    <!-- Need a footer or space on bottom of the page -->
    <?php require_once "../inc/thevibe_footer.php"; ?>
    <script src='assets/js/drop_nav.js'></script>
</body>
</html>