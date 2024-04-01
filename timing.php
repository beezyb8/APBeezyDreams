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
    <link rel="stylesheet" href="css/timing/main_timing.css">
    <link rel="stylesheet" href="css/timing/our_links.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<?php
$userid = (int)$_SESSION['user_id'];
$appsql = "SELECT * FROM banknotes WHERE userid = :userid AND appdate IS NOT NULL order by appdate";
$applications = $con->prepare($appsql);
$applications->bindParam('userid', $userid);
$applications->execute();

$contactsql = "SELECT * FROM contacts WHERE user_contactid = :user_contactid";
$contacts = $con->prepare($contactsql);
$contacts->bindParam('user_contactid', $userid);
$contacts->execute();

// $resultapps = $applications->fetchAll(PDO::FETCH_ASSOC);
$resultcontacts = $contacts->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($resultapps, JSON_PRETTY_PRINT);
// echo json_encode($resultcontacts, JSON_PRETTY_PRINT);
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
    <nav class="nav_bar_sticky">
        <div class="logocont">
            <img src="../images/logos/navlogo.png" alt="MLU logo" class="logo" height="80px">
        </div>
        <div class="links">
            <a href="dashboard.php"><p class="innernav_txt">Dashboard</p></a>
            <a href="allcontacts.php"><p class="innernav_txt">Network</p></a>
            <a href="timing.php"><p class="innernav_txt current_nav">Applications</p></a>
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
            <a href="announcements.php"><p class="innernav_txt">Announcements</p></a>
            <a href="accountpage.php"><p class="innernav_txt">Your Account</p></a>
        </div>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </nav>
        <div class="dropdown_links">
            <a href="dashboard.php"><p class="drop_innernav_txt">Dashboard</p></a>
            <a href="allcontacts.php"><p class="drop_innernav_txt">Network</p></a>
            <a href="timing.php"><p class="drop_innernav_txt drop_current_nav">Applications</p></a>
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
            <a href="announcements.php"><p class="drop_innernav_txt">Announcements</p></a>
            <a href="accountpage.php"><p class="drop_innernav_txt">Your Account</p></a>
        </div>
    <div class="bodycont">
        <div class="contcont_body">
            <div class="cont_body">
                <br>
                <div class="table_cont">
                    <div class="your_app_head">
                        Your Applications
                    </div>
                    <div class = "header_cont" id="header">
                        <span class="header_bank_cont">
                            <span class="bank_link_title"><p>Bank (<u>link</u>)</p></span>
                        </span>
                        <span class="header_banknotes_cont">
                            <span class="banknotes">Your Notes</span>
                        </span>
                        <span class="header_callshad">
                            <span class="callshad">Calls Had</span>
                        </span>
                        <span class="header_thankyou_sent">
                            <span class="thankyous">Applied</span>
                        </span>
                        <span class="header_appdate_cont">
                            <span class="appdate">Due Date</span>
                        </span>
                    </div>
                    <?php while($data = $applications->fetch(PDO::FETCH_ASSOC)){
                    $ch = 0;
                        foreach($resultcontacts as $contact){
                            if($contact['bank'] == $data['bankname'] && $contact['callhad'] == 1){
                                $ch = $ch + 1;
                            }
                        }
                        
                        if($data["applied"] == 1){
                            $marchbaby = "checked";
                        }else{
                            $marchbaby = "";
                        }
                        ?>
                    <div class = "appcont" id="<?php echo $data["notesid"]?>">
                        <span class="bank_cont">
                            <span class="banklink"><a href=<?php echo $data["applink"]?> target="_blank" class="bank_apps"><?php echo $data["bankname"]?></a></span>
                        </span>
                        <span class="banknotes_cont">
                            <span class="banknotes"><?php echo $data["notestxt"];?></span>
                        </span>
                        <span class="calls_had">
                            <span class="callshad"><?php echo $ch;?></span>
                        </span>
                        <span class="calls_had">
                            <span class="callshad"><input type="checkbox" class="app_check" id="<?php echo $data["notesid"]?>" <?php echo $marchbaby;?>></span>
                        </span>
                        <span class="appdate_cont">
                            <span class="appdate"><?php echo date("m/d/Y", strtotime($data["appdate"]));?></span>
                        </span>
                    </div>
                    <?php } ?>
                </div>
                <br>
                <br>
                <table class="our_links">
                    <thead>
                        <tr>
                            <th colspan="4" class="our_recs_head">Our Recommended Application Links (NY Summer Programs)</th>
                        </tr>
                        <tr>
                            <th>Firm</th>
                            <th>Application Title (linked)</th>
                            <th>Due Date</th>
                            <th>Applied</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Macquarie</td>
                            <td><a href="https://www.careers.macquarie.com/en/job/970821/2024-macquarie-capital-summer-analyst-internship-program" target="blank">2024 Macquarie Capital Summer Analyst Internship Program</a></td>
                            <td>3/12/23</td>
                            <td><input type="checkbox" class="applied_checker" id="1" <?php echo $checked_1;?>></td>
                        </tr>
                        <tr>
                            <td>Rothschild</td>
                            <td><a href="https://rothschildandco.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/xf-a115c97ca373/candidate/so/pm/1/pl/2/opp/371-US-2024-Global-Advisory-Summer-Analyst/en-GB" target="blank">US 2024 Global Advisory Summer Analyst</a></td>
                            <td>3/12/23</td>
                            <td><input type="checkbox" class="applied_checker" id="2" <?php echo $checked_2;?>></td>
                        </tr>
                        <tr>
                            <td>William Blair</td>
                            <td><a href="https://williamblair.avature.net/careers/JobDetail/Investment-Banking-Summer-Analyst-Corporate-Advisory-Summer-2024-Program/5015" target="blank">Investment Banking Summer Analyst, Corporate Advisory, Summer 2024 Program</a></td>
                            <td>3/13/23</td>
                            <td><input type="checkbox" class="applied_checker" id="3" <?php echo $checked_3;?>></td>
                        </tr>
                        <tr>
                            <td>Financo</td>
                            <td><a href="https://raymondjames.taleo.net/careersection/rj_extcareersection052308/jobdetail.ftl?job=539980&tz=GMT-05:00&tzname=America/Chicago#JB-10208" target="blank">Investment Banking Summer Analyst 2024 - Consumer Group (New York, NY)-2300035</a></td>
                            <td>3/13/23</td>
                            <td><input type="checkbox" class="applied_checker" id="4" <?php echo $checked_4;?>></td>
                        </tr>
                        <tr>
                            <td>Evercore</td>
                            <td><a href="https://evercore.tal.net/vx/appcentre-ext/brand-4/candidate/so/pm/1/pl/2/opp/1647-2024-Investment-Banking-Summer-Analyst-Program-New-York-Houston-Menlo-Park-Chicago-Toronto/en-GB" target="blank">2024 Investment Banking Summer Analyst Program - New York, Houston, Menlo Park, Chicago, Toronto</a></td>
                            <td>3/16/23</td>
                            <td><input type="checkbox" class="applied_checker" id="17" <?php echo $checked_17;?>></td>
                        </tr>
                        <tr>
                            <td>PJT</td>
                            <td><a href="https://boards.greenhouse.io/pjtpartnersstudents/jobs/4202728005" target="blank">2024 Summer Analyst – Strategic Advisory</a></td>
                            <td>3/26/23</td>
                            <td><input type="checkbox" class="applied_checker" id="15" <?php echo $checked_15;?>></td>
                        </tr>
                        <tr>
                            <td>PWP</td>
                            <td><a href="https://pwpcareers.tal.net/vx/appcentre-pwpext/brand-4/candidate/so/pm/1/pl/2/opp/601-2024-Advisory-Summer-Analyst-US/en-GB" target="blank">2024 Advisory Summer Analyst (US)</a></td>
                            <td>4/2/23</td>
                            <td><input type="checkbox" class="applied_checker" id="5" <?php echo $checked_5;?>></td>
                        </tr>
                        <tr>
                            <td>Solomon</td>
                            <td><a href="" target="blank">2024 Investment Banking Summer Analyst - New York</a></td>
                            <td>7/1/23</td>
                            <td><input type="checkbox" class="applied_checker" id="18" <?php echo $checked_18;?>></td>
                        </tr>
                        <tr>
                            <td>Credit Suisse</td>
                            <td><a href="https://www.linkedin.com/jobs/view/2024-investment-banking-summer-analyst-program-at-credit-suisse-3467652290/" target="blank">2024 Investment Banking Summer Analyst Program</a></td>
                            <td>9/1/23</td>
                            <td><input type="checkbox" class="applied_checker" id="6" <?php echo $checked_6;?>></td>
                        </tr>
                        <tr>
                            <td>Bank of America</td>
                            <td><a href="https://campus.bankofamerica.com/careers/global_investment_banking_summer_analyst_program__2024.html" target="blank">Global Investment Banking Summer Analyst Program - 2024</a></td>
                            <td>9/16/23</td>
                            <td><input type="checkbox" class="applied_checker" id="16" <?php echo $checked_16;?>></td>
                        </tr>
                        <tr>
                            <td>JP Morgan</td>
                            <td><a href="https://jpmc.fa.oraclecloud.com/hcmUI/CandidateExperience/en/sites/CX_1001/job/210365171" target="blank">2024 Corporate & Investment Bank Investment Banking Summer Analyst Program</a></td>
                            <td>10/31/23</td>
                            <td><input type="checkbox" class="applied_checker" id="7" <?php echo $checked_7;?>></td>
                        </tr>
                        <tr>
                            <td>Jefferies</td>
                            <td><a href="https://jefferies.tal.net/vx/lang-en-GB/appcentre-1/candidate/postings/634" target="blank">2024 Investment Banking Summer Analyst Program - New York, Generalist</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="8" <?php echo $checked_8;?>></td>
                        </tr>
                        <tr>
                            <td>Lazard</td>
                            <td><a href="https://lazard-careers.tal.net/vx/lang-en-GB/mobile-0/appcentre-1/brand-4/user-4/xf-41fc224c7843/wid-2/candidate/so/pm/1/pl/2/opp/577-2024-Financial-Advisory-Summer-Analyst-Program-New-York-M-A-Restructuring/en-GB" target="blank">2024 Financial Advisory Summer Analyst Program - New York M&A/Restructuring</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="9" <?php echo $checked_9;?>></td>
                        </tr>
                        <tr>
                            <td>Morgan Stanley</td>
                            <td><a href="https://morganstanley.tal.net/vx/candidate/apply/15004" target="blank">2024 Investment Banking Summer Analyst Program (United States)</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="10" <?php echo $checked_10;?>></td>
                        </tr>
                        <tr>
                            <td>Houlihan Lokey</td>
                            <td><a href="https://hl.wd1.myworkdayjobs.com/en-US/External/job/XMLNAME-2024-Summer-Financial-Analyst--Class-of-2025----Financial-Restructuring---New-York_R0528" target="blank">2024 Summer Financial Analyst (Class of 2025) - Financial Restructuring - New York</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="11" <?php echo $checked_11;?>></td>
                        </tr>
                        <tr>
                            <td>Houlihan Lokey</td>
                            <td><a href="https://hl.wd1.myworkdayjobs.com/en-US/External/job/XMLNAME-2024-Summer-Financial-Analyst--Class-of-2025----Corporate-Finance--Generalist---New-York_R0561?locations=979d930e2eac0100f4fc1a40add20000" target="blank">2024 Summer Financial Analyst (Class of 2025) - Corporate Finance, Generalist - New York</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="12" <?php echo $checked_12;?>></td>
                        </tr>
                        <tr>
                            <td>Guggenheim</td>
                            <td><a href="https://careers-guggenheimpartners.icims.com/jobs/2398/2024-guggenheim-securities-investment-banking-summer-analyst-%e2%80%93-new-york-generalist-program/job" target="blank">2024 Guggenheim Securities Investment Banking Summer Analyst – New York Generalist Program</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="13" <?php echo $checked_13;?>></td>
                        </tr>
                        <tr>
                            <td>Citigroup</td>
                            <td><a href="https://jobs.citi.com/job/new-york/banking-capital-markets-and-advisory-bcma-capital-markets-summer-analyst-new-york-north-america-2024/287/43736295504" target="blank">Banking, Capital Markets and Advisory (BCMA) - Capital Markets, Summer Analyst - New York (North America - 2024)</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="14" <?php echo $checked_14;?>></td>
                        </tr>
                        <tr>
                            <td>Goldman Sachs</td>
                            <td><a href="https://www.goldmansachs.com/careers/students/programs/americas/summer-analyst-program.html" target="blank">2024 Summer Analyst Program</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="19" <?php echo $checked_19;?>></td>
                        </tr>
                        <tr>
                            <td>Barclays</td>
                            <td><a href="https://search.jobs.barclays/job/new-york/banking-analyst-expert-summer-intern-programme-2024/13015/43967132976" target="blank">Banking Analyst – Expert Summer Intern Programme – 2024</a></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="20" <?php echo $checked_20;?>></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <?php require_once "inc/footer.php"; ?>
    <script src='../assets/js/applied_ours.js'></script>
    <script src='../assets/js/redo_js/redo_drop_nav.js'></script>
</body>
</html>