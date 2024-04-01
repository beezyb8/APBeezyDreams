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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;1,100&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Need CSS THIS WILL BE HOMEPAGE -->
</head>
<body>
    <div class="Google-Load">
        <div class="icon-container">
            <img src="images/GoogleIcon.png" alt="Google logo" class="google-load-logo">
        </div>
        <div class="load-out-textcontainer">
            <p>Hang on a second!</p>
        </div>
    </div>
    <div class="outer_page_cont" style="display:none">
        <div class="page_content">
            <div class="top_logo_cont">
                <img src="../images/logos/mlu_nobanking_hzl.png" alt="MLU logo" class="top_logo">
            </div>
            <div class="welcome-google-user">
                <p class="Welcome">Welcome,&nbsp;<p class="user-name" id="google-user-name-text"></p>&nbsp;</p>
                <p class="school-info" id="school-specific">Go Blue!</p>
                <p class="please-continue">Please fill out the following information to complete your registration!</p>
            </div>
            <form class="form-bin js-google-register">
                <div class="bin-bin-bin">
                    <div class="input-field" id="name-field-hide">
                        <i class="bi bi-person-fill"></i>
                        <input class="name-bin" id="google-name" type="text" name="name" placeholder="Full Name" required="required" readonly>
                    </div>
                    <div class="input-field" id="email-field-hide">
                        <i class="bi bi-envelope-fill"></i>
                        <input class="email-bin" id="google-email" type="email" placeholder="Email" required="required" readonly>
                    </div>
                    <!--<div class="input-field">-->
                    <!--    <i class="bi bi-bus-front-fill"></i>-->
                    <!--    <select id="michigan" name="michigan" required="required">-->
                    <!--        <option value="" disabled selected>Select School</option>-->
                    <!--        <option value="yes">University of Michigan - Ann Arbor</option>-->
                    <!--        <option value="vandy">Vanderbilt University</option>-->
                    <!--        <option value="duke">Duke University</option>-->
                    <!--        <option value="bc">Boston College</option>-->
                    <!--        <option value="uva">University of Virginia</option>-->
                    <!--        <option value="harvard">Harvard University</option>-->
                    <!--        <option value="texas">University of Texas at Austin</option>-->
                    <!--        <option value="indiana">Indiana University Bloomington</option>-->
                    <!--        <option value="gwu">George Washington University</option>-->
                    <!--        <option value="tulane">Tulane University</option>-->
                    <!--        <option value="cornell">Cornell University</option>-->
                    <!--        <option value="northwestern">Northwestern University</option>-->
                    <!--        <option value="umass">University of Massachusetts Amherst</option>-->
                    <!--        <option value="washu">Washington University in St. Louis</option>-->
                    <!--        <option value="penn">University of Pennsylvania</option>-->
                    <!--        <option value="babson">Babson College</option>-->
                    <!--        <option value="wisco">University of Wisconsin-Madison</option>-->
                    <!--        <option value="maryland">University of Maryland</option>-->
                    <!--        <option value="northeastern">Northeastern University</option>-->
                    <!--        <option value="usc">University of Southern California</option>-->
                    <!--        <option value="notredame">University of Notre Dame</option>-->
                    <!--        <option value="no">Other</option>-->
                    <!--    </select>-->
                    <!--</div>-->
                    <!--<div class="input-field">-->
                    <!--        <i class="bi bi-lock-fill"></i>-->
                    <!--        <input class="password-bin" type="password" placeholder="Password" required="required">-->
                    <!--</div>-->
                    <div class="input-field" id="school-field-hide">
                        <i class="bi bi-bus-front-fill"></i>
                        <input class="password-bin" id="google-input-school" type="text" name="school" placeholder="Enter your school here">
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
                    <div class="input-field">
                        <i class="bi bi-building-fill-add"></i>
                        <input class="club-bin" type="text" name="club" placeholder="Enter Any Club Involvement (Not Required)">
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
            <div class="exit-goog-cont" onclick="GoogleLogout()">
                <p>Click here to "abandon" your Google Registration</p>
            </div>
            <div class="backtolg">
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


<!-- TESTTTTSTTSTTE -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


<script src="assets/js/google-register.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
      // Show the ".outer_page_cont" after 5 seconds
      setTimeout(function() {
        document.querySelector('.outer_page_cont').style.display = 'block';
        document.querySelector('.Google-Load').style.display = 'none';
      }, 2000); // 5000 milliseconds = 5 seconds
    });
    let params={}
    
    let regex= /([^&=]+)=([^&]*)/g, m
    
    while(m = regex.exec(location.href)){
        params[decodeURIComponent(m[1])] = decodeURIComponent(m[2])
    }
    
    if(Object.keys(params).length > 0){
        localStorage.setItem('authInfo',JSON.stringify(params))
    }
    // hide access token
    window.history.pushState({},document.title,"/"+"login_reg_system/profile.php")
    
    let info = JSON.parse(localStorage.getItem('authInfo'))  
    console.log(JSON.parse(localStorage.getItem('authInfo')))
    console.log(info['expires_in'])
    const emaildomain = info['hd']
    const accesstoken = info['access_token']
    
    fetch("https://www.googleapis.com/oauth2/v3/userinfo",{
        headers:{
            "Authorization":`Bearer ${info['access_token']}`
        }
    })
    .then((data) => data.json())
    .then((info) => {
        const name = info.name
        const email = info.email
        if(email !== ''){
            var userstuff = {
                email: email,
                accesstoken: accesstoken
            };
            
            $.ajax({
                type: 'POST',
                url: 'ajax/log_reg/GoogleLogin.php',
                data: userstuff,
                dataType: 'json',
                async: true,
            })
        
            .done(function ajaxDone(data) {
                if(data.redirect !== undefined) {
                    window.location = data.redirect;
        // REDIRECT TO HOMMEPAGE OR DASHBOARD
                } else if(data.error !== undefined){
        // Display Error as alert
                    alert(data.error)
                }else{
                    if(name !== ''){
                        document.getElementById('google-name').value = name
                        document.getElementById('google-email').value = email
                        document.getElementById('google-user-name-text').innerHTML = name
                        document.getElementById('google-input-school').value = email
                        
                        document.getElementById("name-field-hide").style.display = "none"
                        document.getElementById("email-field-hide").style.display = "none"
                        const schoolfield = document.getElementById("school-field-hide")
                        
                        const SchoolArray = [
                            {
                                hd: "umich.edu",
                                school: "University of Michigan",
                                school_spec: "Go Blue!"
                            },
                            {
                                hd: "wisc.edu",
                                school: "Univeristy of Wisconsin-Madison",
                                school_spec: "Go Badgers!"
                            },
                            {
                                hd: "msu.edu",
                                school: "Michigan State University",
                                school_spec: "Go Spartans!"
                            },
                            {
                                hd: "utexas.edu",
                                school: "University of Texas at Austin",
                                school_spec: "Hook 'em!"
                            },{
                                hd: "tulane.edu",
                                school: "Tulane University",
                                school_spec: "Roll Wave!"
                            },{
                                hd: "ufl.edu",
                                school: "University of Florida",
                                school_spec: "The Swamp!"
                            },{
                                hd: "usc.edu",
                                school: "University of Southern California",
                                school_spec: "Fight On!"
                            },{
                                hd: "emory.edu",
                                school: "Emory University",
                                school_spec: "Go Eagles!"
                            },{
                                hd: "virginia.edu",
                                school: "The University of Virginia",
                                school_spec: "Wa-Hoo-Wa!"
                            },{
                                hd: "osu.edu",
                                school: "The Ohio State University",
                                school_spec: "Go Buckeyes!"
                            },{
                                hd: "columbia.edu",
                                school: "Columbia",
                                school_spec: "In Lumine Tuo Videbimus Lumen"
                            },{
                                hd: "u.northwestern.edu",
                                school: "Northwestern University",
                                school_spec: "Go 'Cats"
                            },
                        ];
                        
                        function setSchoolInfo(emaildomain, SchoolArray) {
                            const schoolInfo = SchoolArray.find(school => school.hd === emaildomain);
                            if (schoolInfo) {
                                schoolfield.style.display = "none";
                                document.getElementById('google-input-school').value = schoolInfo.school;
                                document.getElementById('school-specific').innerHTML = schoolInfo.school_spec;
                            } else if (emaildomain === "gmail.com") {
                                document.getElementById('google-input-school').value = "GMAIL";
                                document.getElementById('school-specific').style.display = "none";
                            } else{
                                document.getElementById('google-input-school').value = "";
                                document.getElementById('school-specific').style.display = "none";
                            }
                            // Add more conditions if needed
                        }
                        
                        setSchoolInfo(emaildomain, SchoolArray);

                    }else{
                        location.href="https://mylegup.co/login_reg_system/login_reg.php"
                    }
                }
            })
        
            .fail(function ajaxFailed(e){
                //fail
                console.log('fail');
        
            })
        }
    })
    
    function GoogleLogout(){
        fetch("https://oauth2.googleapis.com/revoke?token="+info['access_token'],{
            method:'POST',
            headers:{
                'Content-type': 'application/x-www-form-urlencoded'
            }
        })
        .then((data) => {
            location.href="https://mylegup.co/login_reg_system/login_reg.php"
        })
    }
</script>
</body>
</html>