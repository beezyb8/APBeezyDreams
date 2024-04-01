<?php 
    define('__CONFIG__', true);
    require_once "inc/config.php";

    Page::ForceToDashboard();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leg Up</title>
    <link rel="icon" type="image/x-icon" href="/images/logos/mlu_favicon.png">
    <link rel="stylesheet" href="css/login_reg.css">
    <link rel="stylesheet" href="css/login_reg.css">
</head>
<body>
    <h2>Register</h2>
    <form class="entire-bin js-register">
        <div class="bin-bin-bin">
            <div class="login-password-bin">
                <label class="login-password-header" for="form-stacked-text">Email</label>
                <div class="login-password-input-bin">
                    <input class="email-bin" id="form-stacked-text" type="email" placeholder="example@umich.edu" required="required">
                </div>
            </div>

            <div class="login-password-bin">
                <label class="login-password-header" for="form-stacked-select">Password</label>
                <div class="login-password-input-bin">
                    <input class="password-bin" id="form-stacked-text" type="password" placeholder="password" required="required">
                </div>
            </div>

            <div class="js-error" style='display: none;'>Test</div>

            <div class="submit-bin">
                <button class="submit-button">Register</button>
            </div>
        </div>
    </form>
    <?php require_once "inc/footer.php"; ?>
</body>
</html>