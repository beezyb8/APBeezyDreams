function signIn(){
    let oauth2Endpoint = "https://accounts.google.com/o/oauth2/v2/auth";
    
    let form = document.createElement('form');
    form.setAttribute('method','GET');
    form.setAttribute('action',oauth2Endpoint)
    
    let params={
        "client_id":"20414067060-s0se3vauuu9jl0l3hvmp1am8256o3qfj.apps.googleusercontent.com",
        "redirect_uri":"https://mylegup.co/login_reg_system/profile.php",
        "response_type":"token",
        "scope":"https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email",
        "include_granted_scopes":'true',
        'state': "pass-through-value"
    }
    
    for(var p in params){
        let input = document.createElement('input')
        input.setAttribute('type','hidden')
        input.setAttribute('name',p)
        input.setAttribute('value',params[p])
        form.appendChild(input)
    }
    
    document.body.appendChild(form);
    form.submit()
}