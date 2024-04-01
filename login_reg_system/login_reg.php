<?php 
    define('__CONFIG__', true);
    require_once "../inc/config.php";
    
    Page::ForceToDashboard($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leg Up</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/mlu_favicon.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;1,100&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Need CSS THIS WILL BE HOMEPAGE -->
</head>
<body>
    <div class="outer_page_cont">
        <div class="page_content">
            <div class="top_logo_cont">
                <img src="../images/logos/mlu_nobanking_hzl.png" alt="MLU logo" class="top_logo">
            </div>
            <form class="form-bin js-register">
                <div class="bin-bin-bin">
                    <div class="input-field">
                        <i class="bi bi-person-fill"></i>
                        <input class="name-bin" type="text" name="name" placeholder="Full Name" required="required">
                    </div>
                    <div class="input-field">
                        <i class="bi bi-envelope-fill"></i>
                        <input class="email-bin" type="email" placeholder="Email" required="required">
                    </div>
        
                    <div class="input-field">
                            <i class="bi bi-lock-fill"></i>
                            <input class="password-bin" type="password" placeholder="Password" required="required">
                    </div>
                    <div class="input-field">
                        <i class="bi bi-bag-dash"></i>
                        <select id="industry" name="industry" required="required">
                            <option value="" disabled selected>Select Industry</option>
                            <option value="5">Consulting</option>
                            <option value="4">Investment Banking</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="bi bi-bus-front-fill"></i>
                        <select id="michigan" name="michigan" required="required">
                            <option value="" disabled selected>Select School</option>
                            <option value="yes">University of Michigan - Ann Arbor</option>
                            <option value="msu">Michigan State University</option>
                            <option value="vandy">Vanderbilt University</option>
                            <option value="duke">Duke University</option>
                            <option value="bc">Boston College</option>
                            <option value="uva">University of Virginia</option>
                            <option value="harvard">Harvard University</option>
                            <option value="texas">University of Texas at Austin</option>
                            <option value="indiana">Indiana University Bloomington</option>
                            <option value="gwu">George Washington University</option>
                            <option value="tulane">Tulane University</option>
                            <option value="cornell">Cornell University</option>
                            <option value="northwestern">Northwestern University</option>
                            <option value="umass">University of Massachusetts Amherst</option>
                            <option value="washu">Washington University in St. Louis</option>
                            <option value="penn">University of Pennsylvania</option>
                            <option value="babson">Babson College</option>
                            <option value="wisco">University of Wisconsin-Madison</option>
                            <option value="maryland">University of Maryland</option>
                            <option value="northeastern">Northeastern University</option>
                            <option value="usc">University of Southern California</option>
                            <option value="notredame">University of Notre Dame</option>
                            <option value="no">Other</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="bi bi-bus-front-fill"></i>
                        <input class="password-bin" type="text" name="school" placeholder="If School Not Listed Above Enter Here">
                    </div>
                    <div class="input-field">
                        <i class="bi bi-building-fill-add"></i>
                        <input class="club-bin" type="text" name="club" placeholder="Enter Any Club Involvement">
                    </div>
                    <div class="input-field">
                        <i class="bi bi-pen-fill"></i>
                        <select id="grade" name="grade" placeholder="Grade" required="required">
                            <option value="" disabled selected>Select Grade</option>
                            <option value="freshman">Freshman</option>
                            <option value="sophomore">Sophomore</option>
                            <option value="junior">Junior</option>
                            <option value="senior">Senior</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="bi bi-lightbulb-fill"></i>
                        <select id="major" name="major" required="required">
                            <option value="" disabled selected>Select Major</option>
                            <option value="business">Business</option>
                            <option value="econ">Economics</option>
                            <option value="ioe">Engineering</option>
                            <option value="compsci">Computer Science</option>
                            <option value="dscience">Data Science</option>
                            <option value="stats">Statistics</option>
                            <option value="poly">Political Science</option>
                            <option value="info">Information Science</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="checkbox-field">
                        <input type="checkbox" id="terms" name="terms-conditions" required>
                        <p>Agree to <a href="../pdf/TermsAndCons.pdf">Terms and Conditions</a> and <a href="https://mylegup.co/privacypolicy.php">Privacy Policy</a></p>
                    </div>
                    <div class="checkbox-field">
                        <input type="checkbox" id="remember" name="remember-me">
                        <p>Remember me?</p>
                    </div>
        
                    <div class="js-error" style='display: none;'>Test</div>
                    
                    <div class="submit-bin">
                        <button class="submit-button">Create Account</button>
                    </div>
                </div>
            </form>
            <form class="form-bin js-login">
                <div class="bin-bin-bin">
                    <!-- EMAIL ID -->
                    <div class="input-field">
                        <i class="bi bi-envelope-fill"></i>
                        <input class="email-bin" type="email" placeholder="Email" required="required">
                    </div>
        
                    <!-- PASSWORD ID -->
                    <div class="input-field">
                            <i class="bi bi-lock-fill"></i>
                            <input class="password-bin" type="password" placeholder="Password" required="required">
                    </div>
        
                    <div class="js-error" style='display: none;'>Test</div>
                    <div class="checkbox-field-login">
                        <input type="checkbox" id="remember-login" name="remember-me-login">
                        <p>Remember me?</p>
                    </div>
                    <div class="submit-bin">
                        <button class="submit-button">Sign In</button>
                    </div>
                </div>
            </form>
            <div class="newtomlu">
                <button onclick="signIn()" class="google-button"><img width="20px" alt="Google sign-in" src="images/GoogleIcon.png" />
                      Login/Register with Google</button>
                <div class="sign_up_text_btn">New to My Leg Up? <div class="fake_btn">Sign up!</div></div>
            </div>
            <div class="backtolg">
                <button onclick="signIn()" class="google-button"><img width="20px" alt="Google sign-in" src="images/GoogleIcon.png" />
                      Login/Register with Google</button>
                <div class="login_text_btn">Back to <div class="fake_btn">Login Page</div></div>
            </div>
        </div>
    </div>
    <?php 
    if(!defined('__ALLOWFOOTER__')) {
        exit('404 Gateway Error, Text 1(516)640-2417 and inform about error');
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>

<script src='assets/js/googEBlogin.js'></script>
<script src='assets/js/newlogin_reg.js'></script>


<!-- TESTTTTSTTSTTE -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>
</html>