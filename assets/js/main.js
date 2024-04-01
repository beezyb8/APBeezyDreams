$(document)
.on("submit", "form.js-register", function(event){
    event.preventDefault();
    
    var $form = $(this);
    var $error = $(".js-error")
    
    var $name = $("input[name='name']", $form).val();
    var $mcheck = $("select[name='michigan']", $form).val();
    var $school = $("input[name='school']", $form).val();
    var $grade = $("select[name='grade']", $form).val();
    var $major = $("select[name='major']", $form).val();
    
    if($mcheck == "yes"){
        $mcheck = 1;
        $school = "University of Michigan";
    }else if($mcheck == "bc"){
        $mcheck = 2;
        $school = "Boston College"
    }else if($mcheck == "uva"){
        $mcheck = 3;
        $school = "The University of Virginia"
    }else if($mcheck == "harvard"){
        $mcheck = 4;
        $school = "Harvard University"
    }else if($mcheck == "texas"){
        $mcheck = 5;
        $school = "The University of Texas at Austin"
    }else if($mcheck == "indiana"){
        $mcheck = 6;
        $school = "Indiana University Bloomington";
    }else if($mcheck == "cornell"){
        $mcheck = 7;
        $school = "Cornell University"
    }else if($mcheck == "penn"){
        $mcheck = 8;
        $school = "The University of Pennsylvania"
    }else if($mcheck == "wisco"){
        $mcheck = 9;
        $school = "The University of Wisconsin–Madison"
    }else if($mcheck == "usc"){
        $mcheck = 10;
        $school = "The University of Southern California"
    }else if($mcheck == "vandy"){
        $mcheck = 11;
        $school = "Vanderbilt University"
    }else if($mcheck == "duke"){
        $mcheck = 12;
        $school = "Duke University"
    }else if($mcheck == "gwu"){
        $mcheck = 13;
        $school = "George Washington University"
    }else if($mcheck == "tulane"){
        $mcheck = 14;
        $school = "Tulane University"
    }else if($mcheck == "northwestern"){
        $mcheck = 15;
        $school = "Northwestern University"
    }else if($mcheck == "umass"){
        $mcheck = 16;
        $school = "University of Massachusetts Amherst"
    }else if($mcheck == "babson"){
        $mcheck = 17;
        $school = "Babson College"
    }else if($mcheck == "northeastern"){
        $mcheck = 18;
        $school = "Northeastern University"
    }else if($mcheck == "notredame"){
        $mcheck = 19;
        $school = "University of Notre Dame"
    }else if($mcheck == "washu"){
        $mcheck = 20;
        $school = "Washington University in St. Louis"
    }else if($mcheck == "maryland"){
        $mcheck = 21;
        $school = "University of Maryland"
    }else{
        $mcheck = 0
    }
    
    var userstuff = {
        email: $("input[type='email']", $form).val(),
        password: $("input[type='password']", $form).val(),
        name: $name,
        mcheck: $mcheck,
        school: $school,
        grade: $grade,
        major: $major
    };

    if(userstuff.email.length < 6) {
        $error
            .text("Please enter a valid email address")
            .show()
        return false
    } else if (userstuff.password.length < 6){
        $error
        .text("Password must be greater then 6 characters")
        .show()
    return false
    }

    //Begin AJAX process

    $error.hide();

    $.ajax({
        type: 'POST',
        url: '../ajax/register.php',
        data: userstuff,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if(data.redirect !== undefined) {
            window.location = data.redirect;
        } else if(data.error !== undefined) {
            $error
            .html(data.error)
            .show();
        }

    })

    .fail(function ajaxFailed(e){
        //fail
        console.log(e);

    })

    .always(function ajaxAlwaysDoThis(data){
        //always run
        console.log('always')

    })

    return false
})

$(document)
.on("submit", "form.js-login", function(event) {
    event.preventDefault();

    var $form = $(this);
    var $error =$(".js-error", $form)

    var userstuff = {
        email: $("input[type='email']", $form).val(),
        password: $("input[type='password']", $form).val()
    };

    if(userstuff.email.length < 6) {
        $error
            .text("Please enter a valid email address")
            .show();
        return false;
    } else if (userstuff.password.length < 6){
        $error
            .text("Password must be greater then 6 characters")
            .show();
    return false;
    }

    //Begin AJAX process

    $error.hide();

    $.ajax({
        type: 'POST',
        url: '../ajax/login.php',
        data: userstuff,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if(data.redirect !== undefined) {
            window.location = data.redirect;
// REDIRECT TO HOMMEPAGE OR DASHBOARD
        } else if(data.error !== undefined) {
            $error
            .html(data.error)
            .show();
        }

    })

    .fail(function ajaxFailed(e){
        //fail
        console.log(e);

    })

    .always(function ajaxAlwaysDoThis(data){
        //always run
        console.log('always');

    })

    return false;
})