$(document)
.on("submit", "form.js-google-register", function(event){
    event.preventDefault();
    
    var $form = $(this);
    var $accesstoken = accesstoken;
    var $error = $(".js-error");
    var $name = $("input[name='name']", $form).val();
    var $industry = $("select[name='industry']", $form).val();
    var $school = $("input[name='school']", $form).val();
    var $club = $("input[name='club']", $form).val();
    var $grade = $("select[name='grade']", $form).val();
    var $major = $("select[name='major']", $form).val();
    var $google_check = 1;
    var $mcheck = 0;
    var $remember_prop = $("input[name='remember-me']", $form).prop('checked');
    var $remember = ($remember_prop ? 1 : 0);
    
    
    if($school == "University of Michigan"){
        $mcheck = 1;
        $school = "University of Michigan";
    }
    
    console.log($industry);
    
    var userstuff = {
        email: $("input[type='email']", $form).val(),
        name: $name,
        mcheck: $mcheck,
        school: $school,
        industry: $industry,
        club: $club,
        grade: $grade,
        major: $major,
        google_check: $google_check,
        remember: $remember,
        accesstoken: $accesstoken 
    };
    console.log(userstuff)



    $.ajax({
        type: 'POST',
        url: 'ajax/log_reg/GoogleRegister.php',
        data: userstuff,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if(data.redirect !== undefined) {
            window.location = data.redirect;
        } else if(data.error !== undefined) {
            // ALERT
            alert("There is already an account associated with this email. Login through the My Leg Up platform or email support@mylegup.co")
            GoogleLogout()
        }

    })

    .fail(function ajaxFailed(e){
        //fail
        console.log(e);

    })

    .always(function ajaxAlwaysDoThis(data){
        //always run
    })

    return false
})