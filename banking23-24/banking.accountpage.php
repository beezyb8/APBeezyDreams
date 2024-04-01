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
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;1,100&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<?php
$user_id = (int)$_SESSION['user_id'];
$usersql = "SELECT * FROM users WHERE user_id = :user_id";
$userinfo = $con->prepare($usersql);
$userinfo->bindParam('user_id', $user_id);
$userinfo->execute();
$user = $userinfo->fetch(PDO::FETCH_ASSOC)
?>
<?php
$userid = (int)$_SESSION['user_id'];
$firmsql = "SELECT * FROM ibfirms WHERE userid = :userid order by display_order";
$firmlist = $con->prepare($firmsql);
$firmlist->bindParam('userid', $userid);
$firmlist->execute();
?>
<body>
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
    </section>
    <div class="bodycont">
        <h1>Your Account</h1>
        <h3 class="accinfo_head">Email Address:&nbsp;&nbsp;</h3><p class="email"><?php echo $user['email']?></p><br>
        <h3 class="accinfo_head">Registration Date:&nbsp;&nbsp;</h3><p class="regdate"><?php echo date("m/d/y", strtotime($user['reg_date']));?></p><br>
        <?php if($user['google_check'] == 1): ?>
            <h3 class="accinfo_head">Click To Logout:&nbsp;&nbsp;</h3><a onclick="GoogleLogout()">Logout</a><br>
        <?php else: ?>
            <h3 class="accinfo_head">Click To Logout:&nbsp;&nbsp;</h3><a href="../../../logout.php">Logout</a><br>
        <?php endif; ?>
        <div class="banklist">
            <h3>Your Firms:</h3><p>Check off boxes to add/remove firms from your dashboard</p>
            <div class="flex_banks">
                <?php while($data = $firmlist->fetch(PDO::FETCH_ASSOC)){ 
                    if($data['checked'] == 1){
                        $checked = 'checked';
                    } else{
                        $checked = '';
                    }?>
                    <span style="white-space: nowrap;" id="span_bank"><input type="checkbox"  class="checker" id="<?php echo $data['uq_id'];?>" <?php echo $checked;?>><?php echo $data['firm'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;  
                <?php } ?>
            </div>
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
    <script>
        function GoogleLogout(){
            fetch("https://oauth2.googleapis.com/revoke?token=<?php echo $user['accesstoken'] ?>",{
                method:'POST',
                headers:{
                    'Content-type': 'application/x-www-form-urlencoded'
                }
            })
            .then((data) => {
                location.href="../../../logout.php"
            })
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>
    
    
    <script src='../banking/assets/js/accountpg.js'></script>
    
    <!-- TESTTTTSTTSTTE -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</body>
</html>