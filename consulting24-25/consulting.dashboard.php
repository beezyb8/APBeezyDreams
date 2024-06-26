<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

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
    <link rel="stylesheet" href="css/dashboard/dashbody.css">
    <link rel="stylesheet" href="css/dashboard/banklist.css">
    <link rel="stylesheet" href="css/navbar/dashboard_nav.css">
    <link rel="stylesheet" href="css/dashboard/networktable.css">
    <link rel="stylesheet" href="css/dashboard/thevibe.css">
    <link rel="stylesheet" href="css/dashboard/applications.css">
    <link rel="stylesheet" href="css/dashboard/loadpage.css">
    <link rel="stylesheet" href="css/dashboard/add_app.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;1,100&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<?php
$userid = (int)$_SESSION['user_id'];
$firmsql = "SELECT * FROM confirms WHERE userid = :userid order by display_order";
$allfirms = $con->prepare($firmsql);
$allfirms->bindParam('userid', $userid);
$allfirms->execute();

$userid = (int)$_SESSION['user_id'];
$firmsql = "SELECT * FROM confirms WHERE userid = :userid order by display_order";
$allfirmsfav = $con->prepare($firmsql);
$allfirmsfav->bindParam('userid', $userid);
$allfirmsfav->execute();
?>
<div class="body_div_body">
    <section class="nav_section">
        <nav>
            <a href="https://mylegup.co/consulting24-25/consulting.dashboard.php"><img src="../images/logos/navlogo.png" alt="MLU Logo"></a>
            <div class="nav-links" id="navlinks">
                <i class="bi bi-x-lg" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.dashboard.php">Dashboard</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.allcontacts.php">Network</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.applications.php">Applications</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.thevibe.php">The Street</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.bestpractices.php">Best Practices</a></li>
                    <li><a href="https://mylegup.co/consulting24-25/consulting.accountpage.php">Your Account</a></li>
                </ul>
            </div>
            <i class="bi bi-justify" onclick="showMenu()"></i>
        </nav>
    </section>
        <div class="bank_info_cont">
        <!--paste-->
            <div class= "simple-cont" id="collap-table-cont">
                <div class="bank_list_cont">
                    <div class="favorites_header">
                        <p>Favorites</p>
                    </div>
                    <div class="table-scroll">
                        <table class="banklisttable" id="banklist">
                            <tbody class="row_position favorites">
                            <?php while($data = $allfirmsfav->fetch(PDO::FETCH_ASSOC)){ 
                                if($data['checked'] == 1 && $data['favorite'] == 1){
                                    $display = "";
                                } else{
                                    $display = "display: none";
                                }?>
                                <tr id="<?php echo $data["uq_id"]?>" favTag="favorite" style="<?php echo $display;?>">
                                    <td class="switch" id="<?php echo $data['firmid'];?>" uq_id="<?php echo $data['uq_id'];?>" value="<?php echo $data['firm'];?>"><?php echo $data['firm'];?><i class="bi bi-bookmark-dash-fill" id="unstar" value="<?php echo $data['uq_id'];?>"></i></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="search-bar">
                        <i class='bi bi-search'></i>
                        <input type="text" id="search_banks" placeholder="Search...">
                        <!--<i class="bi bi-arrow-bar-left" id="collapse-table"  onclick="collapseTable()"></i>-->
                    </div>
                    <div class="table-scroll">
                        <table class="banklisttable banklisttable_searchclass" id="banklist">
                            <tbody class="row_position normal">
                            <?php while($data = $allfirms->fetch(PDO::FETCH_ASSOC)){ 
                                if($data['checked'] == 1 && $data['favorite'] == 0){
                                    $display = "";
                                } else{
                                    $display = "display: none";
                                }?>
                                <tr id="<?php echo $data["uq_id"]?>" favTag="normal" style="<?php echo $display;?>">
                                    <td class="switch" id="<?php echo $data['firmid'];?>" uq_id="<?php echo $data['uq_id'];?>" value="<?php echo $data['firm'];?>"><?php echo $data['firm'];?><i class="bi bi bi-bookmark-star" id="star" value="<?php echo $data['uq_id'];?>"></i></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td class="addbank" id=""><p class="addbankp">Add Firm</p>
                                    <div class="addbankcont">
                                        <form class="addbankform">
                                            <label class="addbankname" id="compname">Company Name</label><br>
                                            <input class="companyname" id="compname"><br>
                                            <button type="submit" class="submit bi bi-plus-square bankaddsub" id="compname"></button>
                                            <button type="button" class="exitaddform bi bi-x-square bankaddexit" id="compname"></button><br>
                                            <!-- STYLE^^ -->
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div class="info_inner_container">
                    <div class="bank_title_cent">
                        <!--<i class="bi bi-arrow-bar-right" id="expand-table" onclick="expandTable()"></i>-->
                        <div class="tab-cont tri_top_flexer">
                            <div class="filter_tab show_all current_show_filter">Show<br>All</div>
                            <div class="filter_tab show_yours">Your<br>Info</div>
                            <div class="filter_tab show_info">Our<br>Info</div>
                        </div>
                        <div class="title-cont tri_top_flexer">
                            <h3 class="firm_name" id="firm_name">My Leg Up</h3>
                        </div>
                        <div class="logo-cont tri_top_flexer">
                            <img src="../images/logos/mlu_favicon.png" alt="Firm Logo" class="firm_logo">
                        </div>
                    </div>
                    <section class="load_dashboard_section">
                        <div class="body_dashboard">
                            <div class="left_half_container">
                                <div class="top_left_container">
                                    <div class="news_outer_cont">
                                        <span class="news_header_cont">
                                            <h3>MLU's Top News (4/1)</h3>
                                        </span>
                                        <div class="news_container">
                                            <div class="deal_activity_cont">
                                                <span class="deal_header">
                                                    Consulting News
                                                </span>
                                                <div class="deal_container">
                                                    <div class="deal_title">1. West Monroe has entered into a strategic partnership with Backbase, a firm known for their Engagement Banking Platform. This alliance will help accelerate digital capabilities for banks and credit union clients across the globe by allowing them to simplify and elevate their offerings &nbsp; <a href="https://www.westmonroe.com/press-releases/west-monroe-backbase-enter-partnership-to-accelerate-digital-capacbilities-for-banks-credit-unions" target="blank">West Monroe</a></div>
                                                <!--    <div class="deal_written">Lead Advisors: Goldman Sachs</div>-->
                                                </div>                                            
                                                <div class="deal_container">
                                                    <div class="deal_title">2. BCG and Madiant, a Google Cloud division focused on cybersecurity services, have reached an agreement on a partnership. Together, they will help clients determine their most threatening cyber risks and create plans and procedures to mitigate attacks &nbsp; <a href="https://www.consulting.us/news/10400/boston-consulting-group-partners-with-mandiant-on-cyber-consulting" target="blank">The Consulting.us</a></div>
                                                    <!--<div class="deal_written">Lead Advisors: BofA, Goldman Sachs, Rothschild & Co</div>-->
                                                </div>
                                                <div class="deal_container">
                                                    <div class="deal_title">3. Dallas headquartered consulting firm Embark recently opened up an office in NYC. The firm is known for their work in the financial services and private equity space, and expanding their reach will better equip the growing firm in the future. The firm also added former CEO of Deloitte, Barry Salzberg, to its board of directors, who has a depth of experience and a strong network in NYC &nbsp; <a href="https://www.consulting.us/news/10478/consulting-firm-embark-expands-into-northeast-with-new-york-city-office" target="blank">The Consulting.us</a></div>
                                                    <!--<div class="deal_written">Lead Advisors: N/A</div>-->
                                                </div>
                                            </div>
                                            <!--Scrapped split news box-->
                                            <!--<div class="finance_activity_cont">-->
                                            <!--    <span class="finance_header">-->
                                            <!--        Relevant Finance News-->
                                            <!--    </span>-->
                                            <!--    <div class="finance_container">-->
                                            <!--        <div class="finance_headline">Damn that boy is really handsome</div>-->
                                            <!--    </div>-->
                                            <!--    <div class="finance_container">-->
                                            <!--        <div class="finance_headline">Damn that boy is really handsome</div>-->
                                            <!--    </div>-->
                                            <!--    <div class="finance_container">-->
                                            <!--        <div class="finance_headline">Damn that boy is really handsome</div>-->
                                            <!--    </div>-->
                                            <!--    <div class="finance_container">-->
                                            <!--        <div class="finance_headline">Damn that boy is really handsome</div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                    <div class ="recent">
                                    </div>
                                </div>
                                <div class="bottom_left_container">
                                    <!--Commented out Progress Container-->
                                    <!--<div class="progress_outer_container">-->
                                    <!--    <div class="progress_column_container">-->
                                    <!--        <div class="progress_title_container_div">-->
                                    <!--            <span class="progress_header">-->
                                    <!--                <h3>Your Progress</h3>-->
                                    <!--            </span>-->
                                    <!--        </div>-->
                                    <!--        <div class="progress_container">-->
                                    <!--            <div class="kpi_cont">-->
                                    <!--                <div class="progress-bar">-->
                                    <!--                    <progress value="75" min="0" max="100" style="visibility:hidden;height:0;width:0;">75%</progress>-->
                                    <!--                </div>-->
                                    <!--                <div class="kpi_stat">3</div>-->
                                    <!--                <div class="kpi_title">Applciations Submitted</div>-->
                                    <!--            </div>-->
                                    <!--            <div class="kpi_cont">-->
                                    <!--                <div class="progress-bar">-->
                                    <!--                    <progress value="75" min="0" max="100" style="visibility:hidden;height:0;width:0;">75%</progress>-->
                                    <!--                </div>-->
                                    <!--                <div class="kpi_stat">3</div>-->
                                    <!--                <div class="kpi_title">Banks With 3+ Contacts</div>-->
                                    <!--            </div>-->
                                    <!--            <div class="kpi_cont">-->
                                    <!--                <div class="progress-bar">-->
                                    <!--                    <progress value="75" min="0" max="100" style="visibility:hidden;height:0;width:0;">75%</progress>-->
                                    <!--                </div>-->
                                    <!--                <div class="kpi_stat">46%</div>-->
                                    <!--                <div class="kpi_title">Cold Email -> Call Conversion</div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="demo_video_outer_container">
                                        <div class="demo_video_header">
                                            <h3>Demo Video</h3>
                                            <p>We strongly recommend that all of our new users watch the demo video before using My Leg Up. There are numerous useful features and abilities users who do not watch the demo video may miss.</p>
                                        </div>
                                        <div class="bubbles-col thumbnail">
                                            <img src="../images/landing/newland/youtube_thumbnail.png" onclick=window.open('https://www.youtube.com/watch?v=pDgRceQa1RY&t=1s','_blank');>   
                                            <div class="layer" onclick=window.open('https://www.youtube.com/watch?v=pDgRceQa1RY&t=1s','_blank')>
                                                <h3>Watch Demo Video</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right_half_container">
                                <div class="to_do_list_cont">
                                    <div class="to_do_header">
                                        <h3>To-Do List</h3> 
                                    </div>
                                    <div class="to_do_item_cont">
                                        <div class="add_to_do_item">
                                            <form class="add_item_form" id="add_item_form">
                                                <div class="inner_add_item_form_cont">
                                                    <i class="bi bi-plus-lg"></i>
                                                    <input class="new_item" id="user_input_todo" autocomplete="off" placeholder="Add a new item to your to list!">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="to_do_inner_header">
                                            <h6>To Do</h6>
                                        </div>
                                        <div class="ind_uncompleted_item_cont">
                                        </div>
                                        <div class="completed_inner_header">
                                            <h6>Completed</h6>
                                        </div>
                                        <div class="ind_completed_item_cont">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="disclaimer_cont">
                            <h4 class="sup">If you have any issues email support@mylegup.co</h4>
                        </div>
                    </section>
                    <div class="spacer"></div>
                    <div class="scroll-inner-firm-cont">
                        <div class="notescont">
                            <h6 id="item_title" class="notestitle">Your Notes</h6>
                            <div class="banknotescont"><textarea class="banknotes"></textarea></div>
                        </div>
                        <div class="writtencont">
                            <h6 id="item_title" class="toptitle">Firm Description</h6>
                            <p id="writeup">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis excepturi mollitia eos fugit ut vero aliquid soluta sed, alias iste ipsam non labore necessitatibus voluptatum, saepe, ex amet in! Velit.</p>
                            <h6 id="item_title" class="bottomtitle">Recruiting Details</h6>
                            <p id="interviewsum">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis excepturi mollitia eos fugit ut vero aliquid soluta sed, alias iste ipsam non labore necessitatibus voluptatum, saepe, ex amet in! Velit.</p>
                            <h6 id="emailformat">Email Format:&nbsp;<p id="emailex"></p></h6>
                        </div>
                        <div class="app_tile_holder">
                        </div>
                        <div class="button_modal_cont">
                            <button class="applink_modal btn_guo">Application Portal</button>
                            <button class="newcontact btn_guo">Add new contact</button>
                        </div>
                        <div class="contactcont">
                            <div class="nocontacts"></div>
                            <table class="nworktable">
                                <thead class="nworkhead">
                                    <tr>
                                        <th class="contact_title">Contact Name</th>
                                        <th class="notes_tit">Notes</th>
                                        <th class="coldtitle"><p class="checkboxhead">Cold Email</p></th>
                                        <th class="calltitle"><p class="checkboxhead">Call Set</p></th>
                                        <th class="hadtitle"><p class="checkboxhead">Call Had</p></th>
                                        <th class="tytitle"><p class="checkboxhead">Thank You</p></th>
                                    </tr>
                                </thead>
                                <tbody class="table_body">
                                </tbody>
                            </table><br>
                        </div>
                        <br>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <div class="contactmodal">
        <i class="bi bi-x-lg closemodal"></i>
         <div class="modal_body">
            <div class="modal_header">
                <i class="bi bi-file-person"></i>
            </div>
            <form class = "js-add-contact">
                <div class="input-field">
                    <i class="bi bi-person-fill"></i>
                    <input class="contact-name-input" id="conname" type="text" name="name" placeholder="Name: John Smith" autocomplete="off" required="required">
                </div>
                <div class="input-field">
                    <i class="bi bi-envelope-fill"></i>
                    <input class="email-bin" id="conemail" type="email" autocomplete="off" placeholder="Not Required ~ Email: john.smith@mylegup.co">
                </div>
                <div class="input-field">
                    <i class="bi bi-phone-vibrate-fill"></i>
                    <input class="phone-number-bin" id="conphonenumber" type="text" autocomplete="off" placeholder="Not Required ~ Phone Number: +1(516)999-1515">
                </div>
                <div class="input-field">
                    <i class="bi bi-pass-fill"></i>
                    <input class="connection-bin" id="conconnection" type="text" autocomplete="off" placeholder="Not Required ~ Connection: Met at event 10/27 or Cold emailed 12/4">
                </div>
                <div class="submit-bin">
                    <button class="submit-button btn_guo">Add Contact</button>
                </div>
            </form>
        </div>
    </div>
    <div class="edit_contactmodal">
        <i class="bi bi-x-lg edit-modal-closemodal"></i>
        <!--<button type="" class="edit-modal-closemodal btn_guo">Close Window</button>-->
         <div class="edit_modal_body">
            <div class="edit_modal_header">
                <i class="bi bi-file-person"></i>
            </div>
            <form class = "edit_js-edit-contact">
                <div class="input-field">
                    <i class="bi bi-person-fill"></i>
                    <input class="edit_contact-name-input" id="edit-conname" type="text" name="name" placeholder="Name: John Smith" autocomplete="off" required="required">
                </div>
                <div class="input-field">
                    <i class="bi bi-envelope-fill"></i>
                    <input class="edit_email-bin" id="edit-conemail" type="email" autocomplete="off" placeholder="Email: john.smith@mylegup.co">
                </div>
                <div class="input-field">
                    <i class="bi bi-phone-vibrate-fill"></i>
                    <input class="edit_phone-number-bin" id="edit-conphonenumber" type="text" autocomplete="off" placeholder="Phone Number: +1(516)999-1515">
                </div>
                <div class="input-field">
                    <i class="bi bi-pass-fill"></i>
                    <input class="edit_connection-bin" id="edit-conconnection" type="text" autocomplete="off" placeholder="Connection: Met at event 10/27 or Cold emailed 12/4">
                </div>
                <div class="input_field">
                    <textarea class="edit_notes" id="edit-contactnotes">
                    </textarea>
                </div>
                <div class="submit-bin">
                    <button class="edit-modal-submit-button btn_guo">Confirm Changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="app_cont">
        <div class="close-cont">
            <div class="close-modal-cont">
                <i class="bi bi-x-lg add-modal-closemodal closeapp"></i>
            </div>
        </div>
        <form class = "applinks">
            <div class='add_tile_container'>
                <div class='add_tile_logo_checker_cont add_header'>
                    Add To Your Saved Applications
                    <!--<div class='add_tile_image_container'>-->
                    <!--    <img src = 'images/banklogos/jpmorgan.png'>-->
                    <!--</div>-->
                </div>
                <div class='add_tile_link_box'>
                    <div class='add_tile_body'>
                        <input class="add_app-name-input"input id="clear_apptitle" name="title" name="link" type="text" placeholder="Application Name: 2025 Summer Internship" autocomplete="off" required="required">
                        <input class="add_app-link-input" id="clear_applink" type="text" autocomplete="off" name="link" placeholder="Application Link: mylegup.co">
                        <div class="add_tile_location_date">
                            <div class="add_tile_location">
                                <input class="add_app-location-input" id="add-applocation" name="applocation-name" type="text" autocomplete="off" placeholder="Location: NY" maxlength="6">
                            </div>
                            <div class="add_tile_date">
                                <input class="add_app-date-input" id="clear_appdate" type="date" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="submit-add-app-bin">
                <button class="add-modal-submit-button submit-app-add-btn">Add Application</button>
            </div>
        </form>
    </div>
    <script>
        var navlinks = document.getElementById("navlinks")
        function showMenu(){
            navlinks.style.right = "0px"
        }
        function hideMenu(){
            navlinks.style.right = "-600px"
        }
    </script>
    

    <!-- Need a footer or space on bottom of the page -->
    <?php
        require_once "footers/consulting24-25.dashboard.footer.php";

        
        
        $user_id = (int)$_SESSION['user_id'];
        $usersql = "SELECT * FROM users WHERE user_id = :user_id";
        $userinfo = $con->prepare($usersql);
        $userinfo->bindParam('user_id', $user_id);
        $userinfo->execute();
        $user = $userinfo->fetch(PDO::FETCH_ASSOC);
    if($user['industry']==3){
        if($user['mcheck'] == 1) : ?>
                <script src='assets/js/dashboard/firm_shift.js'></script>
            <?php else : ?>
                <script src='assets/js/dashboard/firm_shiftneut.js'></script>
        <?php endif; }
    elseif($user['industry']==4){
            if($user['mcheck'] == 1) : ?>
                <script src='assets/js/dashboard/check4/firm_shift.js'></script>
            <?php else : ?>
                <script src='assets/js/dashboard/check4/firm_shiftneut.js'></script>
    <?php endif; }
    elseif($user['industry']==5){
            if($user['mcheck'] == 1) : ?>
                <script src='assets/js/dashboard/schoolshifts/firm_shift.js'></script>
            <?php else : ?>
                <script src='assets/js/dashboard/schoolshifts/firm_shift.js'></script>
    <?php endif; } ?>
    <script src='assets/js/dashboard/star_unstar_firm.js'></script>
    <script src='assets/js/dashboard/display_filters.js'></script>
    <script src='assets/js/dashboard/to_do_list.js'></script>
</div>
<footer>
    <div class="footer_cont">
        <img src="../../images/logos/mlu_tranlg.png" alt="MLU logo" class="foot_logo"><br>
        <span><a href="https://mylegup.co/about_us.php" class="about_us_link" target="blank">About Us</a></span>
        <span><a href="../privacypolicy.php" class="privacypol_link" target="blank">Privacy Policy</a></span>
        <span><a href="../pdf/TermsAndCons.pdf" class="privacypol_link" target="blank">Terms and Conditions</a></span>
        <span><p>My Leg Up LLC - support@mylegup.co</p></span>
    </div>
</footer>
</html>



<!--Script for Collapsing side bar    -->
    <!--<script>-->
    <!--    var Table = document.getElementById("collap-table-cont")-->
    <!--    var ExpandArrow = document.getElementById("expand-table")-->
    <!--    function collapseTable(){-->
    <!--        Table.style.left = "-250px"-->
    <!--        setTimeout(function() {-->
    <!--            Table.style.width = "0px"-->
    <!--            ExpandArrow.style.opacity="1"-->
    <!--        }, 1000);-->
    <!--    }-->

    <!--</script>-->
<!--Script for Collapsing side bar    -->
    