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
    <link rel="stylesheet" href="css/allcontacts/allcontacts_nav.css">
    <link rel="stylesheet" href="css/allcontacts/contactmodal.css">
    <link rel="stylesheet" href="css/allcontacts/main_allcontacts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;1,100&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<?php
$userid = (int)$_SESSION['user_id'];
$checked = 1;
$firmsql = "SELECT * FROM ibfirms WHERE userid = :userid order by display_order";
$getfirms_list = $con->prepare($firmsql);
$getfirms_list->bindParam(':userid', $userid);
$getfirms_list->execute();

$confirmsql = "SELECT * FROM confirms WHERE userid = :userid order by display_order";
$congetfirms_list = $con->prepare($confirmsql);
$congetfirms_list->bindParam(':userid', $userid);
$congetfirms_list->execute();

$usercontactid = (int)$_SESSION['user_id'];
$sqlfilter = "SELECT * FROM contacts WHERE user_contactid = :user_contactid";
$networkdata = $con->prepare($sqlfilter);
$networkdata->bindParam(':user_contactid', $usercontactid);
$networkdata->execute();

$firmslist = $getfirms_list->fetchAll(PDO::FETCH_ASSOC);
$confirmslist = $congetfirms_list->fetchAll(PDO::FETCH_ASSOC);


?>
<?php
    $contact_withkeys = [];
    while($contact = $networkdata->fetch(PDO::FETCH_ASSOC)){
      $contact_withkeys[] = $contact;
    };
?>

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
                    <h5>Your Network</h5>
                    <button class="newcontact"><i class="bi bi-database-fill-add"></i>Add Contact</button>
                </div>
                <div class="filter_holders">
                    <div class="filter_button" id="fav_contact">
                        Favorites
                    </div>
                    <!--<div class="filter_button" id="favorites_contact">-->
                    <!--    Favorites-->
                    <!--</div>-->
                    <div class="filter_button" id="call_contact">
                        Calls Had
                    </div>
                    <div class="filter_button" id="ascend_contact">
                        Ascending Date
                    </div>
                    <div class="filter_button" id="descend_contact">
                        Descending Date
                    </div>
                </div>
            </div>
        </section>
        <div class = "outside_table_container">
            <div class = "table_container">
                <div class="contactcont">
                    <table class="nworktable">
                        <thead class="nworkhead">
                            <tr>
                                <th class="contact_title">Contact Name</th>
                                <th class="date_tit">Date Added</th>
                                <th class="bank_tit">Firm</th>
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
                                    <td class='contacttitle' id='<?php echo $txmarker?>'value='<?php echo $item['contact_name']?>'><div class='tooltip'><?php echo $item['contact_name']?><span class='tooltiptext'>Click to Edit</span></div></td>
                                    <td class='date_td'><?php echo date("m/d/y", strtotime($item['date_added']));?></td>
                                    <td class='bank_td' id="bankname"><?php echo $item['bank']?></td>
                                    <td class='notes'><textarea id='notetextarea' placeholder = 'Click here to enter notes...' class='<?php echo $txmarker?>'><?php echo $item['notes']?></textarea><br><button type='submit' id='textchangebtn' class='<?php echo $btnmarker?>'>Confirm</button></td>
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
                </div>
                <br>
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
                <div class = "input-field">
                    <i class="bi bi-bank"></i>
                    <select class="contact-bank-input" id="conbank" required="required">
                        <option value="" disabled selected>Select Bank</option>
                            <?php foreach($firmslist as $firm){?>
                        <option value="<?php echo $firm['firm']?>"><?php echo $firm['firm']?></option>
                        <?php } ?>
                    </select>
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
    <?php require_once "footers/banking.allcontacts.footer.php"; ?>
    <script src='assets/js/drop_nav.js'></script>
</body>
</html>