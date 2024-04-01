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
    <link rel="stylesheet" href="css/allcontacts/main_allcontacts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<?php
$userid = (int)$_SESSION['user_id'];
$checked = 1;
$banksql = "SELECT * FROM bankorder WHERE userid = :userid order by display_order";
$getbankshit = $con->prepare($banksql);
$getbankshit->bindParam(':userid', $userid);
$getbankshit->execute();

$usercontactid = (int)$_SESSION['user_id'];
$sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid";
$networkdata = $con->prepare($sqlfilter);
$networkdata->bindParam(':user_contactid', $usercontactid);
$networkdata->execute();

$banklist = $getbankshit->fetchAll(PDO::FETCH_ASSOC);


?>
<?php
    $contact_withkeys = [];
    while($contact = $networkdata->fetch(PDO::FETCH_ASSOC)){
        $contact['bank'] = str_replace("&amp;","&",$contact['bank']);
        foreach($banklist as $bank){
            if($contact['bank'] == $bank['bank_name']){
                $contact['orderkey'] = $bank['display_order'];
                $contact['bankname'] = $bank['bank_name'];
            }
        }
        array_push($contact_withkeys, $contact);
    }
    usort($contact_withkeys, function($a, $b) {
        return $a['orderkey'] <=> $b['orderkey'];
    });
?>

<body>
    <nav class="nav_bar_sticky">
        <div class="logocont">
            <img src="../images/logos/navlogo.png" alt="MLU logo" class="logo" height="80px">
        </div>
        <div class="links">
            <a href="dashboard.php"><p class="innernav_txt">Dashboard</p></a>
            <a href="allcontacts.php"><p class="innernav_txt current_nav">Network</p></a>
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
            <a href="announcements.php"><p class="innernav_txt">Announcements</p></a>
            <a href="accountpage.php"><p class="innernav_txt">Your Account</p></a>
        </div>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </nav>
        <div class="dropdown_links">
            <a href="dashboard.php"><p class="drop_innernav_txt">Dashboard</p></a>
            <a href="allcontacts.php"><p class="drop_innernav_txt drop_current_nav">Network</p></a>
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
            <a href="announcements.php"><p class="drop_innernav_txt">Announcements</p></a>
            <a href="accountpage.php"><p class="drop_innernav_txt">Your Account</p></a>
        </div>
    <div class = "outside_table_container">
        <div class = "table_container">
            <div class="contactcont">
                <h2 class="header">Your Contacts</h2>
                <form class="filter_contact_form">
                    <div class="filter_checks_cont">
                        <input class="filter_checker" id="bank_radio" type="radio" name="filter_order_name" checked="checked">Sort By Your Bank Order</input>
                        <input class="filter_checker" id="lm_radio" type="radio" name="filter_order_name">Sort By Date (Least to Most Recent)</input>
                        <input class="filter_checker" id="ml_radio" type="radio" name="filter_order_name">Sort By Date (Most to Least Recent)</input>
                    </div>
                    <div class="btn_checks_cont">
                        <button class="filter_btn btn_guo">Update Display Order</button>
                    </div>
                </form>
                <table class="nworktable">
                    <thead class="nworkhead">
                        <tr>
                            <th class="contact_title">Contact Name<br><button class="editcontbtn bi bi-pencil-square" id="editbtnid"> Edit</button></th>
                            <th class="date_tit">Date Added</th>
                            <th class="bank_tit">Bank</th>
                            <th class="notes_tit">Notes</th>
                            <th class="coldtitle"><p class="checkboxhead">Cold Email</p></th>
                            <th class="calltitle"><p class="checkboxhead">Call Set</p></th>
                            <th class="hadtitle"><p class="checkboxhead">Call Had</p></th>
                            <th class="tytitle"><p class="checkboxhead">Thank You</p></th>
                        </tr>
                    </thead>
                    <tbody class="table_body">
                        <?php foreach($contact_withkeys as $item){
                            $str_id = strval($item['contact_id']);
                            $marker = "cd";
                            $marker .= $str_id;
                            $txmarker = $str_id;
                            $btnmarker = "bt";
                            $btnmarker .= $str_id;
                            ?>
                            <tr class="<?php echo $marker?> <?php 
                                if($item['coldemail'] == 1){
                                    echo " colddone ";
                                } 
                                if($item['callsched'] == 1){
                                    echo " callscheddone ";
                                } 
                                if($item['callhad'] == 1){
                                    echo " callhaddone ";
                                } 
                                if($item['thankyou'] == 1){
                                    echo " thankyoudone ";
                                } 
                                ?>">
                                <td class='contacttitle' id='ctcttile<?php echo $txmarker?>'value='<?php echo $item['contact_name']?>'><?php echo $item['contact_name']?><br><button class='editct bi bi-pencil-square' id='<?php echo $txmarker?>'></button></td>
                                <td class='date_td'><?php echo date("m/d/y", strtotime($item['date_added']));?></td>
                                <td class='bank_td' id="bankname"><?php echo $item['bankname']?></td>
                                <td class='notes'><textarea id='notetextarea' placeholder = 'Click here to enter notes...' class='<?php echo $txmarker?>'><?php echo $item['notes']?></textarea><br><button type='submit' id='textchangebtn' class='<?php echo $btnmarker?>'>confirm</button></td>
                                <td class="coldemail">
                                    <form class='coldcheck_checks "<?php echo $txmarker?>"'>
                                        <input type='checkbox' id='cold' name='cold' class = '<?php echo $txmarker?>' <?php 
                                            if($item['coldemail'] == 1){
                                                echo "checked";
                                            }else{}
                                        ?>
                                        >
                                    </form>
                                </td>
                                <td class="callsched">
                                    <form class='callsched_checks "<?php echo $txmarker?>"'>
                                        <input type='checkbox' id='callsched' name='callsched' class = '<?php echo $txmarker?>' <?php 
                                            if($item['callsched'] == 1){
                                                echo "checked";
                                            }else{}
                                        ?>
                                        >
                                    </form>
                                </td>
                                <td class="call">
                                    <form class='callhad_checks "<?php echo $txmarker?>"'>
                                        <input type='checkbox' id='call' name='call' class = '<?php echo $txmarker?>' <?php 
                                            if($item['callhad'] == 1){
                                                echo "checked";
                                            }else{}
                                        ?>
                                        >
                                    </form>
                                </td>
                                <td class="thankyou">
                                    <form class='ty_checks "<?php echo $txmarker?>"'>
                                        <input type='checkbox' id='thankyou' name='thankyou' class = '<?php echo $txmarker?>' <?php 
                                            if($item['thankyou'] == 1){
                                                echo "checked";
                                            }else{}
                                        ?>
                                        >
                                    </form>
                                </td>
                        <?php } ?>
                    </tbody>
                </table><br>
            <button class="newcontact btn_guo">Add new contact</button>
            </div>
            <br>
            <div class="contactmodal">
                <form class = "js-add-contact">
                    <label class="contact-name-header" for="form-stacked-text">Contact Name</label>
                    <div class="contact-name-bin">
                        <input class="contact-name-input" id="conname" type="text" placeholder="John Smith" required="required">
                    </div>
                    <div class="contact-bank-bin">
                        <select class="contact-bank-input" id="conbank" required="required">
                            <option value="" disabled selected>Select Bank</option>
                            <?php foreach($banklist as $bank){?>
                            <option value="<?php echo $bank['bank_name']?>"><?php echo $bank['bank_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="submit-bin">
                        <button class="submit-button btn_guo">Add Contact</button>
                    </div>
                </form>
                <button type="" class="closemodal btn_guo">Close Window</button>
            </div>
        </div>
    </div>
    <!-- Need a footer or space on bottom of the page -->
    <?php require_once "inc/allct_footer.php"; ?>
    <script src='../assets/js/redo_js/redo_drop_nav.js'></script>
    <script>
        $("textarea").each(function () {
            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("input", function () {
            this.style.height = 0;
            this.style.height = (this.scrollHeight) + "px";
        });
    </script>
</body>
<!-- <footer>
    <div class="footer_cont">
        <a href="about.php" class="about_us_link">About Us</a>
        <img src="../finalmlu/images/logos/mluhzltext.jpg" class="footer_lg">
    </div>
</footer> -->
</html>