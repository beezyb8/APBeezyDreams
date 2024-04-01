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
    <link rel="stylesheet" href="css/navbar/non_dash_nav.css">
    <link rel="stylesheet" href="css/timing/main_timing.css">
    <link rel="stylesheet" href="css/timing/our_links.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<?php
$userid = (int)$_SESSION['user_id'];
$appsql = "SELECT * FROM con_apps WHERE userid = :userid";
$applications = $con->prepare($appsql);
$applications->bindParam(':userid', $userid);
$applications->execute();


for ($i = 1000; $i <= 1006; $i++) {
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
            <a href="consulting.dashboard.php"><p class="innernav_txt">Dashboard</p></a>
            <a href="consulting.allcontacts.php"><p class="innernav_txt">Network</p></a>
            <a href="consulting.applications.php"><p class="innernav_txt current_nav">Applications</p></a>
            <a href="consulting.bestpractices.php"><p class="innernav_txt">Best Practices</p></a>
            <a href="consulting.accountpage.php"><p class="innernav_txt">Your Account</p></a>
        </div>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </nav>
        <div class="dropdown_links">
            <a href="consulting.dashboard.php"><p class="drop_innernav_txt">Dashboard</p></a>
            <a href="consulting.allcontacts.php"><p class="drop_innernav_txt">Network</p></a>
            <a href="consulting.applications.php"><p class="drop_innernav_txt drop_current_nav">Applications</p></a>
            <a href="consulting.bestpractices.php"><p class="drop_innernav_txt">Best Practices</p></a>
            <a href="consulting.accountpage.php"><p class="drop_innernav_txt">Your Account</p></a>
        </div>
    <div class="bodycont">
        <div class="contcont_body">
            <div class="cont_body">
                <br>
                <table class="our_links">
                    <thead>
                        <tr>
                            <th colspan="4" class="our_recs_head">Your Applications</th>
                        </tr>
                        <tr>
                            <th>Firm</th>
                            <th>Application Title (linked)</th>
                            <th>Due Date</th>
                            <th>Applied</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php while($data = $applications->fetch(PDO::FETCH_ASSOC)){
                            if($data["applied"] == 1){
                                $marchbaby = "checked";
                            }else{
                                $marchbaby = "";
                            }
                         ?>
                            <tr>
                                <td><?php echo $data['firm_name'];?></td>
                                <td><a href="<?php echo $data['applink'];?>" target="blank"><?php echo $data['app_name'];?></a>
                                </td>
                                <td><?php echo date("m/d/Y", strtotime($data['appdate']));?></td>
                                <td><input type="checkbox" class="your_app_check" id="<?php echo $data['app_id'];?>" <?php echo $marchbaby;?>></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <br>
                <table class="our_links">
                    <thead>
                        <tr>
                            <th colspan="4" class="our_recs_head">Our Recommended Application Links</th>
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
                            <td>Oliver Wyman</td>
                            <td><a href="https://careers.marshmclennan.com/global/en/job/R_226133/Oliver-Wyman-Summer-2024-Intern-US" target="blank">Oliver Wyman - Summer 2024 Intern - US</a>
                            </td>
                            <td>5/14/23</td>
                            <td><input type="checkbox" class="applied_checker" id="1000" <?php echo $checked_1000;?>></td>
                        </tr>
                        <tr>
                            <td>Boston Consulting Group</td>
                            <td><a href="https://talent.bcg.com/en_US/apply/FolderDetail/Internship-Application/10013667" target="blank">BCG Consulting - Internship</a><p class=app_note>*Strongly Encouraged (says BCG)*</p></td>
                            <td>6/28/23</td>
                            <td><input type="checkbox" class="applied_checker" id="1001" <?php echo $checked_1001;?>></td>
                        </tr>
                        <tr>
                            <td>Boston Consulting Group</td>
                            <td><a href="https://talent.bcg.com/en_US/apply/FolderDetail/Internship-Application/10013667" target="blank">BCG Consulting - Internship</a>
                            </td>
                            <td>9/13/23</td>
                            <td><input type="checkbox" class="applied_checker" id="1002" <?php echo $checked_1002;?>></td>
                        </tr>
                        <tr>
                            <td>Bain & Company</td>
                            <td><a href="https://www.bain.com/careers/roles/aci/" target="blank">Associate Consultant Intern</a><p class=app_note>*Scroll to bottom of page and select the office you want to apply to*</p></td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="1003" <?php echo $checked_1003;?>></td>
                        </tr>
                        <tr>
                            <td>Deloitte</td>
                            <td><a href="https://apply.deloitte.com/careers/JobDetail/Deloitte-Consulting-Summer-Scholar-Business-Technology-Solutions/144040" target="blank">Deloitte Consulting - Summer Scholar (Business Technology Solutions)</a>
                            </td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="1004" <?php echo $checked_1004;?>></td>
                        </tr>
                        <tr>
                            <td>Deloitte</td>
                            <td><a href="https://apply.deloitte.com/careers/JobDetail/Deloitte-Consulting-Summer-Scholar-Strategy/144045" target="blank">Deloitte Consulting - Summer Scholar (Strategy)</a>
                            </td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="1005" <?php echo $checked_1005;?>></td>
                        </tr>
                        <tr>
                            <td>EY</td>
                            <td><a href="https://eyglobal.yello.co/jobs/8L6qp1gw3DZ7uzlnM5HwZw?job_board_id=c1riT--B2O-KySgYWsZO1Q" target="blank">USA - Consulting - Technology Risk - Intern - Summer 2024</a><p class="app_note">*Not all EY specific divisoins are out yet. This is the only Summer 2024 Consulting one right now.*</p>
                            </td>
                            <td>N/A</td>
                            <td><input type="checkbox" class="applied_checker" id="1006" <?php echo $checked_1006;?>></td>
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
<?php 
    if(!defined('__ALLOWFOOTER__')) {
        exit('404 Gateway Error, email support@mylegup.co and inform about error');
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>

<script src='../consulting/assets/js/applications/applied_yours.js'></script>
<script src='../consulting/assets/js/applications/applied_ours.js'></script>

<script src='../consulting/assets/js/drop_nav.js'></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>



</body>
</html>