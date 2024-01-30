function getParams(formC){
    var bodyStruct = "";
    var collUp = document.querySelectorAll(formC)
    collUp.forEach(element => {
        bodyStruct += element.name + "=" + element.value + "&";
    });
    if(bodyStruct.endsWith("&")){bodyStruct = bodyStruct.substring(0, bodyStruct.length - 1)}
    return bodyStruct;
}

function uploadBody(formC){
    const bodyStruct = {};
    var collUp = document.querySelectorAll(formC)
    collUp.forEach(element => {
        bodyStruct[element.name] = element.value;
    });
    return JSON.stringify(bodyStruct);
}

function success(a){
    console.log(a);
}

function login(){
    var params = getParams(".logInp");
    fetch("REST/users?" + params, {credentials: "include"}).then(response => response.json())
    .then(success);
}

function register(){
    var postBody = uploadBody(".regInp");
    
    fetch("REST/users", {
        credentials: 'include',
        method: 'POST',
        headers: {"Content-type": "application/x-www-form-urlencoded"},
        body: postBody
    }).then(response => response.json())
    .then(success);
}

function newPost(){
    var postBody = uploadBody(".uploadF");
    
    fetch("REST/posts", {
        credentials: 'include',
        method: 'POST',
        headers: {"Content-type": "application/x-www-form-urlencoded"},
        body: postBody
    }).then(response => response.json())
    .then(success);
}
