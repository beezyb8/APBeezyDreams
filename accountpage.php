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
    <link rel="stylesheet" href="css/account.css">
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
$banksql = "SELECT * FROM bankorder WHERE userid = :userid order by display_order";
$banklist = $con->prepare($banksql);
$banklist->bindParam('userid', $userid);
$banklist->execute();
?>
<body>
       <nav class="nav_bar_sticky">
        <div class="logocont">
            <img src="../images/logos/navlogo.png" alt="MLU logo" class="logo" height="80px">
        </div>
        <div class="links">
            <a href="dashboard.php"><p class="innernav_txt">Dashboard</p></a>
            <a href="allcontacts.php"><p class="innernav_txt">Network</p></a>
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
            <a href="accountpage.php"><p class="innernav_txt current_nav">Your Account</p></a>
        </div>
        <i class="bi bi-menu-down drop_down"></i>
        <i class="bi bi-menu-up drop_up"></i>
    </nav>
        <div class="dropdown_links">
            <a href="dashboard.php"><p class="drop_innernav_txt">Dashboard</p></a>
            <a href="allcontacts.php"><p class="drop_innernav_txt">Network</p></a>
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
            <a href="accountpage.php"><p class="drop_innernav_txt drop_current_nav">Your Account</p></a>
        </div>
    <div class="bodycont">
        <h1>Your Account</h1>
        <h3 class="accinfo_head">Email Address:&nbsp;&nbsp;</h3><p class="email"><?php echo $user['email']?></p><br>
        <h3 class="accinfo_head">Registration Date:&nbsp;&nbsp;</h3><p class="regdate"><?php echo date("m/d/y", strtotime($user['reg_date']));?></p><br>
        <h3 class="accinfo_head">Click To Logout:&nbsp;&nbsp;</h3><a href="logout.php">Logout</a><br>
        <div class="banklist">
            <h3>Your Banks:</h3><p>Check off boxes to add/remove banks from your dashboard</p>
            <div class="flex_banks">
                <?php while($data = $banklist->fetch(PDO::FETCH_ASSOC)){ 
                    if($data['checked'] == 1){
                        $checked = 'checked';
                    } else{
                        $checked = '';
                    }?>
                    <span style="white-space: nowrap;" id="span_bank"><input type="checkbox"  class="checker" id="<?php echo $data['rowid'];?>" <?php echo $checked;?>><?php echo $data['bank_name'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;  
                <?php } ?>
            </div>
        </div>
    </div>
    <?php require_once "inc/footer.php"; ?>
</body>
</html>