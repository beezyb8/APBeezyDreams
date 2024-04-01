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
    <link rel="stylesheet" href="css/timing/timing_nav.css">
    <link rel="stylesheet" href="css/timing/main_timing.css">
    <link rel="stylesheet" href="css/timing/edit_app.css">
    <link rel="stylesheet" href="css/timing/add_app.css">
    <link rel="stylesheet" href="css/timing/our_links.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;1,100&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<?php
$userid = (int)$_SESSION['user_id'];
$appsql = "SELECT * FROM con_apps WHERE userid = :userid ORDER BY appdate ASC";
$applications = $con->prepare($appsql);
$applications->bindParam(':userid', $userid);
$applications->execute();

$firmssql = "SELECT * FROM confirms WHERE userid = :userid";
$firmslist = $con->prepare($firmssql);
$firmslist->bindParam(':userid', $userid);
$firmslist->execute();


for ($i = 1; $i <= 20; $i++) {
    $fetchlikes = "SELECT applied_str FROM applied WHERE app_id = :app_id";
    $theselikes = $con->prepare($fetchlikes);
    $theselikes->bindParam(':app_id', $i, PDO::PARAM_INT);
    $theselikes->execute();
    $row = $theselikes->fetch(PDO::FETCH_ASSOC);
    $numbers_string = $row['applied_str'];
    
    $numbers_array = explode(",", $numbers_string);
    $checked = "checked";
    
    if (in_array($userid, $numbers_array)) {
        $new_var_name = "checked_" . $i;
        $$new_var_name = "checked";
    } else {
        $new_var_name = "checked_" . $i;
        $$new_var_name = "";
    }
}
?>

<body>
    <div class="outermostcont_change">
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
            <div class="second_header_nav">
                <div class="filter_title">
                    <h5>Applications</h5>
                    <button class="newapp"><i class="bi bi-database-fill-add"></i>Add Application</button>
                </div>
                <div class="filter_holders">
                    <div class="filter_button selected_filter_button" id="home_apps">
                        Home
                    </div>
                    <div class="filter_button" id="saved_apps">
                        Saved
                    </div>
                    <div class="filter_button" id="ny_apps">
                        New York
                    </div>
                    <div class="filter_button" id="diversity_apps">
                        Diversity
                    </div>
                    <div class="filter_button" id="strategy_apps">
                        Strategy
                    </div>
                    <div class="filter_button" id="mgmt_apps">
                        Management
                    </div>
                    <div class="filter_button" id="supply_apps">
                        Supply Chain
                    </div>
                    <div class="filter_button" id="audit_apps">
                        Audit
                    </div>
                    <div class="filter_button" id="other_apps">
                        Other
                    </div>
                </div>
            </div>
        </section>
        <div class="bodycont">
            <div class="contcont_body">
                <div class="cont_body">
                    <div class="section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title">Our Notes</h3>
                            </div>
                        </div>
                        <div class="add_info_cont">
                            <p>Add our recommended application links to your list by clicking <i class="bi bi-plus-square-fill"></i></p>
                            <p>We will update the other sections below with relevant applications throughout the year. For the Summer 2025 recruiting cycle there is nothing urgent as of yet and therefore no applications to add to your list.</p>
                        </div>
                    </div>
                    <br>
                    <div class="section_cont saved_section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title"><i class="bi bi-save-fill"></i>&nbsp;Saved Applications</h3>
                            </div>
                            <div class="saved_selector_cont">
                                <select class="show_saved_filters">
                                    <option value="all">Show All</option>
                                    <option value="applied">Show Applied</option>
                                    <option value="unapplied">Show Unapplied</option>
                                </select>
                            </div>
                        </div>
                        <div class="app_tile_holder saved_app_tile_holder">
                            <?php if($applications->rowCount() > 0){
                                while($data = $applications->fetch(PDO::FETCH_ASSOC)){
                                    if($data["applied"] == 1){
                                        $marchbaby = "checked";
                                    }else{
                                        $marchbaby = "";
                                    }
                                    $firm_id_name = strtolower($data['firm_name']);
                                    $characters_to_remove = array(" ", "&", ".", "#", "/", "@", "$", "?", "*", "^", "]", "[", "(", ")", "+", "=", "{", "}", "|", ";", ":", "'", "!", "~", "`", "%", ",", "<", ">", "_", "-", '"');
                                    $firm_id_name = str_replace($characters_to_remove, '', $firm_id_name);
                                    $firmidlistarray_apps = ['mckinsey','bostonconsultinggroup','deloitte','kpmg','baincompany','pwc','strategy','ey','eyp','fticonsulting','zs','boozallen','oliverwyman','clearviewhcp','accenture','westmonroe','lek','treacycompany','rolandberger','cornerstone'];
                                    if(in_array($firm_id_name,$firmidlistarray_apps)){
                                    }else{
                                        $firm_id_name = "default_logo";
                                    }
                             ?>
                                <div class='tile_container saved_tile_container'>
                                    <div class='tile_logo_checker_cont'>
                                        <div class='tile_image_container'>
                                            <img src = 'images/firmlogos/<?php echo $firm_id_name;?>.png'>
                                        </div>
                                        <div class="tile_pencil_check_container">
                                            <div class='tile_input_container'>
                                                <input type='checkbox' class='your_app_check tile_app_checker' id="<?php echo $data['app_id'];?>" <?php echo $marchbaby;?>>
                                            </div>
                                            <div class="tile_pencil_container">
                                                <div class="tooltip">
                                                    <i class="bi bi-pencil-square edit-app-tool" id='<?php echo $data['app_id'];?>'></i>
                                                    <span class="tooltiptext">Click to Edit</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tile_link_box' onclick=window.open('<?php echo $data['applink'];?>','_blank');>
                                            <div class='tile_header'>
                                                <h3 class='tile_firm_name'><?php echo $data['firm_name'];?></h3>
                                            </div>
                                        <div class='tile_body'>
                                            <div class='tile_link_name'><?php echo $data['app_name'];?></div>
                                            <div class='tile_location_date'>
                                                <div class='tile_location'><?php echo $data['applocation'];?></div>
                                                <div class='tile_date'><?php $appdate = $data['appdate'];
                                                    // Check if the date is TBD (12/31/1969)
                                                    if ($appdate == '1969-12-31') {
                                                        echo 'TBD';
                                                    } else {
                                                        echo date("m/d/y", strtotime($appdate));
                                                    };?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }}else{ ?>
                                <div class='tile_container'>
                                        <div class='tile_logo_checker_cont'>
                                            <div class='tile_image_container'>
                                                <img src = '../images/logos/mlu_favicon.png'>
                                            </div>
                                            <div class='tile_input_container'>
                                                <!--<i class="bi bi-database-fill-add"></i>-->
                                            </div>
                                            </div>
                                            <div class='tile_link_box'>
                                                <div class='tile_header'>
                                                    <h3 class='tile_firm_name'>My Leg Up</h3>
                                                </div>
                                                <div class='tile_body'>
                                                    <div class='tile_link_name'>Add Applications Through The Dashboard and Watch Them Populate Here</div>
                                                    <div class='tile_link_for_add_only'></div>
                                                    <div class='tile_location_date'>
                                                        <div class='tile_location'>All</div>
                                                    <div class='tile_date'>Try Out Now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="section_cont ny_section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title"><i class="bi bi-building-fill"></i>&nbsp;New York Applications</h3>
                            </div>
                        </div>
                        <div class="app_tile_holder">
                            <div class='tile_container'>
                                <div class='tile_logo_checker_cont'>
                                    <div class='tile_image_container'>
                                        <img src = '../images/logos/mlu_favicon.png'>
                                    </div>
                                    <div class='tile_input_container'>
                                        <!--<i class="bi bi-database-fill-add"></i>-->
                                    </div>
                                </div>
                                <div class='tile_link_box'>
                                    <div class='tile_header'>
                                        <h3 class='tile_firm_name'>My Leg Up</h3>
                                    </div>
                                    <div class='tile_body'>
                                            <div class='tile_link_name'>Applications will be loaded in soon for you to add to your saved applications and apply to!</div>
                                            <div class='tile_link_for_add_only'></div>
                                            <div class='tile_location_date'>
                                                <div class='tile_location'>All</div>
                                            <div class='tile_date'>12/31/25</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!--<div class='tile_container'>-->
                                <!--    <div class='tile_logo_checker_cont'>-->
                                <!--        <div class='tile_image_container'>-->
                                <!--            <img src = 'images/banklogos/rbc.png'>-->
                                <!--        </div>-->
                                <!--        <div class='tile_input_container'>-->
                                <!--            <i class="bi bi-plus-square-fill" id="add_app"></i>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class='tile_link_box' onclick=window.open('https://jobs.rbc.com/ca/en/job/R-0000067336/2025-Capital-Markets-Global-Investment-Banking-Summer-Analyst','_blank');>-->
                                <!--            <div class='tile_header'>-->
                                <!--                <h3 class='tile_firm_name'>RBC</h3>-->
                                <!--            </div>-->
                                <!--            <div class='tile_body'>-->
                                <!--                <div class='tile_link_name'>2025 Capital Markets, Global Investment Banking Summer Analyst</div>-->
                                <!--                <div class='tile_link_for_add_only'>https://jobs.rbc.com/ca/en/job/R-0000067336/2025-Capital-Markets-Global-Investment-Banking-Summer-Analyst</div>-->
                                <!--                <div class='tile_location_date'>-->
                                <!--                    <div class='tile_location'>NY</div>-->
                                <!--                <div class='tile_date'>3/2/24</div>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                        </div>
                    </div>
                    <div class="section_cont diversity_section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title"><i class="bi bi-file-earmark-person-fill"></i>&nbsp;Diversity Programs</h3>
                            </div>
                        </div>
                        <div class="app_tile_holder">
                            <div class='tile_container'>
                                <div class='tile_logo_checker_cont'>
                                    <div class='tile_image_container'>
                                        <img src = '../images/logos/mlu_favicon.png'>
                                    </div>
                                    <div class='tile_input_container'>
                                        <!--<i class="bi bi-database-fill-add"></i>-->
                                    </div>
                                </div>
                                <div class='tile_link_box'>
                                    <div class='tile_header'>
                                        <h3 class='tile_firm_name'>My Leg Up</h3>
                                    </div>
                                    <div class='tile_body'>
                                            <div class='tile_link_name'>Applications will be loaded in soon for you to add to your saved applications and apply to!</div>
                                            <div class='tile_link_for_add_only'></div>
                                            <div class='tile_location_date'>
                                                <div class='tile_location'>All</div>
                                            <div class='tile_date'>12/31/25</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class='tile_container'>-->
                            <!--    <div class='tile_logo_checker_cont'>-->
                            <!--        <div class='tile_image_container'>-->
                            <!--            <img src = 'images/banklogos/lazard.png'>-->
                            <!--        </div>-->
                            <!--        <div class='tile_input_container'>-->
                            <!--            <i class="bi bi-plus-square-fill" id="add_app"></i>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class='tile_link_box' onclick=window.open('https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB','_blank');>-->
                            <!--            <div class='tile_header'>-->
                            <!--                <h3 class='tile_firm_name'>Lazard</h3>-->
                            <!--            </div>-->
                            <!--            <div class='tile_body'>-->
                            <!--                <div class='tile_link_name'>U.S. 2025 Summer Analyst Investment Banking Program Lazard Undergraduate Fellowship for Leadership in Diversity, Equity and Inclusion</div>-->
                            <!--                <div class='tile_link_for_add_only'>https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB</div>-->
                            <!--                <div class='tile_location_date'>-->
                            <!--                    <div class='tile_location'>ALL</div>-->
                            <!--                <div class='tile_date'>TBD</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="section_cont strategy_section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title"><i class="bi bi-file-earmark-person-fill"></i>&nbsp;Strategy Programs</h3>
                            </div>
                        </div>
                        <div class="app_tile_holder">
                            <div class='tile_container'>
                                <div class='tile_logo_checker_cont'>
                                    <div class='tile_image_container'>
                                        <img src = '../images/logos/mlu_favicon.png'>
                                    </div>
                                    <div class='tile_input_container'>
                                        <!--<i class="bi bi-database-fill-add"></i>-->
                                    </div>
                                </div>
                                <div class='tile_link_box'>
                                    <div class='tile_header'>
                                        <h3 class='tile_firm_name'>My Leg Up</h3>
                                    </div>
                                    <div class='tile_body'>
                                            <div class='tile_link_name'>Applications will be loaded in soon for you to add to your saved applications and apply to!</div>
                                            <div class='tile_link_for_add_only'></div>
                                            <div class='tile_location_date'>
                                                <div class='tile_location'>All</div>
                                            <div class='tile_date'>12/31/25</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class='tile_container'>-->
                            <!--    <div class='tile_logo_checker_cont'>-->
                            <!--        <div class='tile_image_container'>-->
                            <!--            <img src = 'images/banklogos/lazard.png'>-->
                            <!--        </div>-->
                            <!--        <div class='tile_input_container'>-->
                            <!--            <i class="bi bi-plus-square-fill" id="add_app"></i>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class='tile_link_box' onclick=window.open('https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB','_blank');>-->
                            <!--            <div class='tile_header'>-->
                            <!--                <h3 class='tile_firm_name'>Lazard</h3>-->
                            <!--            </div>-->
                            <!--            <div class='tile_body'>-->
                            <!--                <div class='tile_link_name'>U.S. 2025 Summer Analyst Investment Banking Program Lazard Undergraduate Fellowship for Leadership in Diversity, Equity and Inclusion</div>-->
                            <!--                <div class='tile_link_for_add_only'>https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB</div>-->
                            <!--                <div class='tile_location_date'>-->
                            <!--                    <div class='tile_location'>ALL</div>-->
                            <!--                <div class='tile_date'>TBD</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="section_cont mgmt_section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title"><i class="bi bi-file-earmark-person-fill"></i>&nbsp;Management Consulting Programs</h3>
                            </div>
                        </div>
                        <div class="app_tile_holder">
                            <div class='tile_container'>
                                <div class='tile_logo_checker_cont'>
                                    <div class='tile_image_container'>
                                        <img src = '../images/logos/mlu_favicon.png'>
                                    </div>
                                    <div class='tile_input_container'>
                                        <!--<i class="bi bi-database-fill-add"></i>-->
                                    </div>
                                </div>
                                <div class='tile_link_box'>
                                    <div class='tile_header'>
                                        <h3 class='tile_firm_name'>My Leg Up</h3>
                                    </div>
                                    <div class='tile_body'>
                                            <div class='tile_link_name'>Applications will be loaded in soon for you to add to your saved applications and apply to!</div>
                                            <div class='tile_link_for_add_only'></div>
                                            <div class='tile_location_date'>
                                                <div class='tile_location'>All</div>
                                            <div class='tile_date'>12/31/25</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class='tile_container'>-->
                            <!--    <div class='tile_logo_checker_cont'>-->
                            <!--        <div class='tile_image_container'>-->
                            <!--            <img src = 'images/banklogos/lazard.png'>-->
                            <!--        </div>-->
                            <!--        <div class='tile_input_container'>-->
                            <!--            <i class="bi bi-plus-square-fill" id="add_app"></i>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class='tile_link_box' onclick=window.open('https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB','_blank');>-->
                            <!--            <div class='tile_header'>-->
                            <!--                <h3 class='tile_firm_name'>Lazard</h3>-->
                            <!--            </div>-->
                            <!--            <div class='tile_body'>-->
                            <!--                <div class='tile_link_name'>U.S. 2025 Summer Analyst Investment Banking Program Lazard Undergraduate Fellowship for Leadership in Diversity, Equity and Inclusion</div>-->
                            <!--                <div class='tile_link_for_add_only'>https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB</div>-->
                            <!--                <div class='tile_location_date'>-->
                            <!--                    <div class='tile_location'>ALL</div>-->
                            <!--                <div class='tile_date'>TBD</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="section_cont supply_section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title"><i class="bi bi-file-earmark-person-fill"></i>&nbsp;Supply Chain Programs</h3>
                            </div>
                        </div>
                        <div class="app_tile_holder">
                            <div class='tile_container'>
                                <div class='tile_logo_checker_cont'>
                                    <div class='tile_image_container'>
                                        <img src = '../images/logos/mlu_favicon.png'>
                                    </div>
                                    <div class='tile_input_container'>
                                        <!--<i class="bi bi-database-fill-add"></i>-->
                                    </div>
                                </div>
                                <div class='tile_link_box'>
                                    <div class='tile_header'>
                                        <h3 class='tile_firm_name'>My Leg Up</h3>
                                    </div>
                                    <div class='tile_body'>
                                            <div class='tile_link_name'>Applications will be loaded in soon for you to add to your saved applications and apply to!</div>
                                            <div class='tile_link_for_add_only'></div>
                                            <div class='tile_location_date'>
                                                <div class='tile_location'>All</div>
                                            <div class='tile_date'>12/31/25</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class='tile_container'>-->
                            <!--    <div class='tile_logo_checker_cont'>-->
                            <!--        <div class='tile_image_container'>-->
                            <!--            <img src = 'images/banklogos/lazard.png'>-->
                            <!--        </div>-->
                            <!--        <div class='tile_input_container'>-->
                            <!--            <i class="bi bi-plus-square-fill" id="add_app"></i>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class='tile_link_box' onclick=window.open('https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB','_blank');>-->
                            <!--            <div class='tile_header'>-->
                            <!--                <h3 class='tile_firm_name'>Lazard</h3>-->
                            <!--            </div>-->
                            <!--            <div class='tile_body'>-->
                            <!--                <div class='tile_link_name'>U.S. 2025 Summer Analyst Investment Banking Program Lazard Undergraduate Fellowship for Leadership in Diversity, Equity and Inclusion</div>-->
                            <!--                <div class='tile_link_for_add_only'>https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB</div>-->
                            <!--                <div class='tile_location_date'>-->
                            <!--                    <div class='tile_location'>ALL</div>-->
                            <!--                <div class='tile_date'>TBD</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="section_cont audit_section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title"><i class="bi bi-file-earmark-person-fill"></i>&nbsp;Audit Programs</h3>
                            </div>
                        </div>
                        <div class="app_tile_holder">
                            <div class='tile_container'>
                                <div class='tile_logo_checker_cont'>
                                    <div class='tile_image_container'>
                                        <img src = '../images/logos/mlu_favicon.png'>
                                    </div>
                                    <div class='tile_input_container'>
                                        <!--<i class="bi bi-database-fill-add"></i>-->
                                    </div>
                                </div>
                                <div class='tile_link_box'>
                                    <div class='tile_header'>
                                        <h3 class='tile_firm_name'>My Leg Up</h3>
                                    </div>
                                    <div class='tile_body'>
                                            <div class='tile_link_name'>Applications will be loaded in soon for you to add to your saved applications and apply to!</div>
                                            <div class='tile_link_for_add_only'></div>
                                            <div class='tile_location_date'>
                                                <div class='tile_location'>All</div>
                                            <div class='tile_date'>12/31/25</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class='tile_container'>-->
                            <!--    <div class='tile_logo_checker_cont'>-->
                            <!--        <div class='tile_image_container'>-->
                            <!--            <img src = 'images/banklogos/lazard.png'>-->
                            <!--        </div>-->
                            <!--        <div class='tile_input_container'>-->
                            <!--            <i class="bi bi-plus-square-fill" id="add_app"></i>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class='tile_link_box' onclick=window.open('https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB','_blank');>-->
                            <!--            <div class='tile_header'>-->
                            <!--                <h3 class='tile_firm_name'>Lazard</h3>-->
                            <!--            </div>-->
                            <!--            <div class='tile_body'>-->
                            <!--                <div class='tile_link_name'>U.S. 2025 Summer Analyst Investment Banking Program Lazard Undergraduate Fellowship for Leadership in Diversity, Equity and Inclusion</div>-->
                            <!--                <div class='tile_link_for_add_only'>https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-94f5afc2db11/candidate/so/pm/1/pl/2/opp/1674-U-S-2025-Summer-Analyst-Investment-Banking-Program-Lazard-Undergraduate-Fellowship-for-Leadership-in-Diversity-Equity-and-Inclusion/en-GB</div>-->
                            <!--                <div class='tile_location_date'>-->
                            <!--                    <div class='tile_location'>ALL</div>-->
                            <!--                <div class='tile_date'>TBD</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="section_cont other_section_cont">
                        <div class="section_title_cont">
                            <div class="title_icon_cont">
                                <h3 class="section_title"><i class="bi bi-file-earmark-post-fill"></i>&nbsp;Other Applications</h3>
                            </div>
                        </div>
                        <div class="app_tile_holder">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="add_appmodal">
        <div class="close-cont">
            <div class="close-modal-cont">
                <i class="bi bi-x-lg add-modal-closemodal"></i>
            </div>
        </div>
        <!--<button type="" class="edit-modal-closemodal btn_guo">Close Window</button>-->
        <div class="add_modal_body">
            <form class = "add_js-add-app">
                <div class='add_tile_container'>
                    <div class='add_tile_logo_checker_cont add_header'>
                        Add To Your Saved Applications
                        <!--<div class='add_tile_image_container'>-->
                        <!--    <img src = 'images/banklogos/jpmorgan.png'>-->
                        <!--</div>-->
                    </div>
                    <div class='add_tile_link_box'>
                        <div class='add_tile_header'>
                            <select class="app-bank-input" id="appbank-selector" required="required">
                                <option value="" disabled selected>--Select Firm--</option>
                                    <?php foreach($firmslist as $firm){?>
                                <option value="<?php echo $firm['firm']?>" id="<?php echo $firm['uq_id']?>"><?php echo $firm['firm']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class='add_tile_body'>
                            <input class="add_app-name-input" id="add-appname" type="text" name="name" placeholder="Application Name: 2025 Summer Internship" autocomplete="off" required="required">
                            <input class="add_app-link-input" id="add-applink" type="text" autocomplete="off" placeholder="Application Link: mylegup.co">
                            <div class="add_tile_location_date">
                                <div class="add_tile_location">
                                    <input class="add_app-location-input" id="add-applocation" type="text" autocomplete="off" placeholder="Location: NY" maxlength="6">
                                </div>
                                <div class="add_tile_date">
                                    <input class="add_app-date-input" id="add-appdate" type="date" autocomplete="off">
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
    </div>
    <div class="edit_appmodal">
        <div class="close-delete-cont">
            <div class="close-modal-cont">
                <i class="bi bi-x-lg edit-modal-closemodal"></i>
            </div>
            <div class="delete-app-cont bottom_tooltip">
                <i class="bi bi-archive-fill delete_application_btn"></i>
                <span class="bottom_tooltiptext">Click to Delete</span>
            </div>
        </div>
        <!--<button type="" class="edit-modal-closemodal btn_guo">Close Window</button>-->
         <div class="edit_modal_body">
            <form class = "edit_js-edit-app">
                <div class='edit_tile_container'>
                    <div class='edit_tile_logo_checker_cont'>
                        <div class='edit_tile_image_container'>
                            <img src = 'images/banklogos/jpmorgan.png'>
                        </div>
                    </div>
                    <div class='edit_tile_link_box'>
                        <div class='edit_tile_header'>
                            <h3 class='app_edit_tile_firm_name'></h3>
                        </div>
                        <div class='edit_tile_body'>
                            <input class="edit_app-name-input" id="edit-appname" type="text" name="name" placeholder="Application Name: 2025 Summer Internship" autocomplete="off" required="required">
                            <input class="edit_app-link-input" id="edit-applink" type="text" autocomplete="off" placeholder="Application Link: mylegup.co">
                            <div class="edit_tile_location_date">
                                <div class="edit_tile_location">
                                    <input class="edit_app-location-input" id="edit-applocation" type="text" autocomplete="off" placeholder="Location: NY" maxlength="6">
                                </div>
                                <div class="edit_tile_date">
                                    <input class="edit_app-date-input" id="edit-appdate" type="date" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-edit-app-bin">
                    <button class="edit-modal-submit-button submit-app-changes-btn">Confirm Changes</button>
                </div>
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
<?php 
    if(!defined('__ALLOWFOOTER__')) {
        exit('404 Gateway Error, email support@mylegup.co and inform about error');
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>

<script src='assets/js/applications/applied_yours.js'></script>
<script src='assets/js/applications/application_filters.js'></script>
<script src='assets/js/applications/application_add.js'></script>
<script src='assets/js/applications/update_your_apps.js'></script>
<script src='assets/js/applications/edits_apps.js'></script>

<script src='assets/js/drop_nav.js'></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>
</html>