var name_signup= document.getElementById("name_signup")
var user_signup=document.getElementById("user_signup")
var pass_signup= document.getElementById("pass_signup")
var confirm_pass= document.getElementById("confirm_pass")

var user_login= document.getElementById("user_login")
var pass_login= document.getElementById("pass_login")
var remember= document.getElementById("remember")
var login= document.querySelector(".innerform2")
var signup= document.querySelector(".innerform1")

function login(){



}

function createAcc(){


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "signup.php", true);

    let formData = new FormData(signup);
    xhr.send(formData);

    xhr.onreadystatechange=function(){
        if(this.readyState==4&&this.status==200){
            let response = JSON.parse(this.response);
            console.log(response);

        }
        else if(this.readyState == 4 && this.status != 200){
            console.log("unsuccessfull");
        }
    }

   

}



