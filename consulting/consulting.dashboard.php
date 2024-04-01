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
    <link rel="stylesheet" href="css/navbar/dashboard_nav.css">
    <link rel="stylesheet" href="css/dashboard/networktable.css">
    <link rel="stylesheet" href="css/dashboard/thevibe.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<?php
$userid = (int)$_SESSION['user_id'];
$firmsql = "SELECT * FROM confirms WHERE userid = :userid order by display_order";
$allfirms = $con->prepare($firmsql);
$allfirms->bindParam('userid', $userid);
$allfirms->execute();
?>
<div class="body_div_body">
    <nav class="nav_bar_sticky">
        <div class="logocont">
            <img src="../images/logos/navlogo.png" alt="MLU logo" class="logo" height="80px">
        </div>
        <div class="links">
                <a href="consulting.dashboard.php"><p class="innernav_txt current_nav">Dashboard</p></a>
                <a href="consulting.allcontacts.php"><p class="innernav_txt">Network</p></a>
                <a href="consulting.applications.php"><p class="innernav_txt">Applications</p></a>
            <a href="consulting.bestpractices.php"><p class="innernav_txt">Best Practices</p></a>
            <a href="consulting.accountpage.php"><p class="innernav_txt">Your Account</p></a>
        </div>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </nav>
        <div class="dropdown_links">
            <a href="consulting.dashboard.php"><p class="drop_innernav_txt drop_current_nav">Dashboard</p></a>
            <a href="consulting.allcontacts.php"><p class="drop_innernav_txt">Network</p></a>
            <a href="consulting.applications.php"><p class="drop_innernav_txt">Applications</p></a>
            <a href="consulting.bestpractices.php"><p class="drop_innernav_txt">Best Practices</p></a>
            <a href="consulting.accountpage.php"><p class="drop_innernav_txt">Your Account</p></a>
        </div>
        <div class="bank_info_cont">
        <!--paste-->
            <div class="bank_list_cont">
                <div class="search-bar">
                    <i class='bi bi-search'></i>
                    <input type="text" id="search_banks" placeholder="Search...">
                </div>
                <table class="banklisttable" id="banklist">
                    <tbody class="row_position">
                    <?php while($data = $allfirms->fetch(PDO::FETCH_ASSOC)){ 
                        if($data['checked'] == 1){
                            $display = "";
                        } else{
                            $display = "display: none";
                        }?>
                        <tr id="<?php echo $data["uq_id"]?>" style="<?php echo $display;?>">
                            <td class="switch" id="<?php echo $data['firmid'];?>" uq_id="<?php echo $data['uq_id'];?>" value="<?php echo $data['firm'];?>"><?php echo $data['firm'];?><i class="bi bi-arrows-expand" id="arrows"></i></td>
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
            <div class="info_inner_container">
                <div class="bank_title_cent">
                    <h3 class="firm_name" id="firm_name">Welcome To My Leg Up</h3>
                    <img src="../images/logos/mlu_favicon.png" alt="Firm Logo" class="firm_logo">
                </div>
                <div class="abus_hide">
                    <p class="abus">My Leg Up is an organizational, informational, and advisory resource that assists students with recruiting for investment banking and consulting internships. The website is designed to help students land the jobs they want and deserve, while easing the stress and anxiety induced by the recruiting process. As students who recruited ourselves, we understand the pain-points and nuances of the process. For this reason, and with the help of many others who have recruited, we have put this website together to be a helping hand on your journey towards getting an internship.</p>
                    <p class="abus" id="demo">Watch the demo video below to familiarize yourself with the website:</p>
                </div>
                <div class="homepage">
                    <iframe class="video" src="https://www.youtube.com/embed/KzbypkG7kJY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="disclaimer_cont">
                    <h4 class="sup">If you have any issues email support@mylegup.co</h4>
                </div>
                <div class="spacer"></div>
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
                <div class="applink_modal_cont">
                    <button class="applink_modal btn_guo">Application Portal</button>
                </div>
                <div class="app_cont">
                        <div class="app_table_cont">
                            <table class="our_links">
                                <thead>
                                    <tr>
                                        <th>Firm</th>
                                        <th>Application Title (linked)</th>
                                        <th>Due Date</th>
                                        <th>Applied</th>
                                    </tr>
                                </thead>
                                <tbody class="app_table_fillit">
                                </tbody>
                            </table>
                        </div>
                        <form class="applinks">
                            <h3 id="app_link">Application Link:&nbsp;</h3><input name="link" required><br>
                            <h3 id="app_link">Application Title/Name:&nbsp;</h3><input name="title" required><br>
                            <h3 id="app_due_date">Apply By:&nbsp;</h3><input type="date"><br>
                            <button type="submit" class="btn_guo">Confirm</button>
                            <button type="button" class="closeapp btn_guo">Close</button>
                        </form>
                    </div>
                <div class="contactcont">
                    <div class="nocontacts">No Contacts!</div>
                    <table class="nworktable">
                        <thead class="nworkhead">
                            <tr>
                                <th class="contact_title">Contact Name<br><button class="editcontbtn bi bi-pencil-square" id="editbtnid"> Edit</button></th>
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
                <button class="newcontact btn_guo">Add new contact</button>
                </div>
                <br>
                <div class="contactmodal">
                    <form class = "js-add-contact">
                        <label class="contact-name-header" for="form-stacked-text">Contact Name</label>
                        <div class="contact-name-bin">
                            <input class="contact-name-input" id="conname" type="text" placeholder="John Smith" autocomplete="off" required="required">
                        </div>
                        <div class="submit-bin">
                            <button class="submit-button btn_guo">Add Contact</button>
                        </div>
                    </form>
                    <button type="" class="closemodal btn_guo">Close Window</button>
                </div>
                <div class="the_vibe">
                        <div class="vibe_header">
                            <h3 class="vibe_title">The Vibe</h3>
                            <h3 class="vibe_today_date"><?php echo date("m/d/y");?></h3>
                            <div class="vibe_summary">
                                <p>The vibe is a place where students can share their recruiting experiences at different firms.</p>
                                <ul>
                                    <li>The identity of all posters are anonymous.</li>
                                    <li>If you select “ASAP” –  your post will undergo immediate review and will be posted shortly after.</li>
                                    <li>If you select “For Next Year” – your post will be held privately until next year's recruiting cycle.</li>
                                    <li>The information posted is vetted by My Leg Up LLC for relevance.</li>
                                    <li>Like the posts you agree with for them to rise to the top of the board.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="vibe_body">
                            <div class="vibe_post">
                            </div>
                            <div class="vibe_create">
                                <form class="create_a_vibe">
                                    <div class="vibe_create_header">
                                        <span class="vibe_create_title">
                                            <input class="vibe_title_input" id="vibe_title_id" type="text" name="name" placeholder="Title Your Post" required="required">
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
                        </div></div>
                    </div>
        </div>
    </div>
    </div>

    <!-- Need a footer or space on bottom of the page -->
        <?php
        require_once "../inc/consulting.footer.php";
        
        $user_id = (int)$_SESSION['user_id'];
        $usersql = "SELECT * FROM users WHERE user_id = :user_id";
        $userinfo = $con->prepare($usersql);
        $userinfo->bindParam('user_id', $user_id);
        $userinfo->execute();
        $user = $userinfo->fetch(PDO::FETCH_ASSOC);
        ?>
        
    <script src='../consulting/assets/js/editcontact.js'></script>
    
    
    
    <!--DASBOARD-->
    <script src='../consulting/assets/js/dashboard/firm_shift.js'></script>
    <script src='../consulting/assets/js/dashboard/firm_order_change.js'></script>
    <script src='../consulting/assets/js/dashboard/network.js'></script>
    <script src='../consulting/assets/js/dashboard/contactnotes.js'></script>
    <script src='../consulting/assets/js/dashboard/update_apps.js'></script>
    <script src='../consulting/assets/js/dashboard/con_notes.js'></script>
    <script src='../consulting/assets/js/dashboard/application.js'></script>
    <script src='../consulting/assets/js/dashboard/addfirm.js'></script>
    <script src='../consulting/assets/js/dashboard/searchbar.js'></script>
    <!--Dashboard-->
    
    
    <!--VIBE-->
    <script src='../consulting/assets/js/thevibe/thevibe.js'></script>
    <script src='../consulting/assets/js/thevibe/vibepull_function.js'></script>
    <!--VIBE-->
    
    <script src='../consulting/assets/js/applications/applied_yours.js'></script>
    
    <script src='../consulting/assets/js/drop_nav.js'></script>
</div>
<footer>
    <div class="footer_cont">
        <img src="../../images/logos/mlu_tranlg.png" alt="MLU logo" class="foot_logo"><br>
        <span><a href="../about_us.php.php" class="about_us_link" target="blank">About Us</a></span>
        <span><a href="../privacypolicy.php" class="privacypol_link" target="blank">Privacy Policy</a></span>
        <span><a href="../pdf/TermsAndCons.pdf" class="privacypol_link" target="blank">Terms and Conditions</a></span>
        <span><p>My Leg Up LLC - support@mylegup.co</p></span>
    </div>
</footer>
</html>