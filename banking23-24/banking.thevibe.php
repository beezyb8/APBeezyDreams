<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    Page::ForceLogin();


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
    <link rel="stylesheet" href="css/thevibe/vibe_create.css">
    <link rel="stylesheet" href="css/thevibe/vibe_general.css">
    <link rel="stylesheet" href="css/thevibe/vibe_reply.css">
    <link rel="stylesheet" href="css/thevibe/vibe_nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;1,100&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="outermostcont_change">
    <section class="nav_section">
        <nav>
            <a href="https://mylegup.co/banking23-24/banking.dashboard.php"><img src="../images/logos/navlogo.png" alt="MLU Logo"></a>
            <div class="nav-links" id="navlinks">
                <i class="bi bi-x-lg" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="https://mylegup.co/banking23-24/banking.dashboard.php">Dashboard</a></li>
                    <li><a href="https://mylegup.co/banking23-24/banking.allcontacts.php">Network</a></li>
                    <li><a href="https://mylegup.co/banking23-24/banking.applications.php">Applications</a></li>
                    <li><a href="https://mylegup.co/banking23-24/banking.thevibe.php">The Street</a></li>
                    <li><a href="https://mylegup.co/banking23-24/banking.bestpractices.php">Best Practices</a></li>
                    <li><a href="https://mylegup.co/banking23-24/banking.accountpage.php">Your Account</a></li>
                </ul>
            </div>
            <i class="bi bi-justify" onclick="showMenu()"></i>
        </nav>
        <div class="second_header_nav">
            <div class="filter_title">
                <h5>The Street</h5>
                <button class="createpostbtn"><i class="bi bi-database-fill-add"></i>Post Here</button>
            </div>
            <div class="street-sum">
                <div class="street-sum-text">The Street is an anonymous forum feature we hope can bring value to students recruiting. By maintaining anonymity in posts, we hope to allow recruitees across the country a place where they can ask and answer honest questions about their recruiting processes and needs.
                </div>
            </div>
        </div>
    </section>
    <div class = "outside_table_container">
        <div class="the_vibe">
                        <!--<div class="vibe_header">-->
                        <!--    <h3 class="vibe_title">The Vibe</h3>-->
                        <!--    <h3 class="vibe_today_date"><?php echo date("m/d/y");?></h3>-->
                        <!--</div>-->
                        <div class="vibe_body">
                            <div class="filters_container">
                                <div class="vibe_show">
                                    <div class="search-bar">
                                        <i class='bi bi-search'></i>
                                        <input type="text" class="search_in" id="search_for" placeholder="Search...">
                                    </div>
                                    <select class="show_sel" id="show_selector" name="show">
                                        <option value="" disabled selected>--- Filter By ---</option>
                                        <option class="sel_filt" value=" ">Show All</option>
                                        <option class="sel_filt" value="General">General</option>
                                        <option class="sel_filt" value="<?php echo $user['school']?>"><?php echo $user['school']?></option>
                                    <?php foreach($ibfirms as $firm){?>
                                        <option class="sel_filt" value="<?php echo $firm['firm']?>"><?php echo $firm['firm']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="vibe_post">
                            </div>
                        </div></div>
    </div>
    </div>
    <div class="add_post_modal">
        <i class="bi bi-x-lg close_new_post_modal"></i>
        <div class="vibe_create">
            <!--<div class="header_design">-->
            <!--    <img src = "images/designs/street_design.png">-->
            <!--</div>-->
            <div class="vibe_header_text">
                <h3>Post anonymously!</h3>
                <br>
                <div class="post_summary_container">
                    <p>Create a post here. Select "ASAP" or "For Next Year" for when you want your post to be released. And share any experience, opinion, or question related to your recruitment process.</p>
                </div>
                <!--<p>The Diag is a place where students can annonymously share and reply about their experiences recruiting at different firms. Help build the My Leg Up community by posting and answering your peers.</p>-->
            </div>
            <form class="create_a_vibe">
                <div class="vibe_create_header">
                    <span class="vibe_create_title">
                        <input class="vibe_title_input" id="vibe_title_id" type="text" name="name" placeholder="Title Your Post" required="required">
                    </span>
                    <div class="create_dropdown_cont">
                        <span class="vibe_create_pickwhen">
                            <select class="vibe_pick_post_release" id="TBD" required="required" name="vibe_pick_when">
                                <option value="">--Select Post Release--</option>
                                <option value="asap">ASAP</option>
                                <option value="next">For Next Year</option>
                            </select>
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
                </div>
                <div class="vibe_create_content">
                    <textarea maxlength="20000" class="vibe_create_textarea" name="vibe_post_textarea" placeholder="Speak Your Truth...."></textarea>
                </div>
                <button class="vibe_post_submit_btn">Submit Post</button>
            </form>
        </div>
    </div>
    <script>
        var navlinks = document.getElementById("navlinks")
        function showMenu(){
            navlinks.style.right = "0px"
        }
        function hideMenu(){
            navlinks.style.right = "-600px"
        }
        
        window.addEventListener("load", function() {
    // Wait for the page to load completely
    // Find the element you want to apply the transition to
            const rms = document.querySelector(".rms-textbox");
    // Apply the transition by changing the opacity
            rms.style.opacity = 1;
        });
    </script>
    <!-- Need a footer or space on bottom of the page -->
    <?php require_once "../inc/thevibe_footer.php"; ?>
    <script src='assets/js/vibe_page/vibe_modal.js'></script>
    <script src='assets/js/drop_nav.js'></script>
</body>
</html>