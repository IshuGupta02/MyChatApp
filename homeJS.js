var name_signup= document.getElementById("name_signup")
var user_signup=document.getElementById("user_signup")
var pass_signup= document.getElementById("pass_signup")
var confirm_pass= document.getElementById("confirm_pass")

var user_login= document.getElementById("user_login")
var pass_login= document.getElementById("pass_login")
var remember= document.getElementById("remember")
var login= document.querySelector(".innerform2")
var signup= document.querySelector(".innerform1")

var signupbtn=document.getElementById("createAccount")
var loginbtn=document.getElementById("loginUser")


loginbtn.addEventListener("click", (e)=>{
    e.preventDefault();
    console.log("hi");


});

signupbtn.addEventListener("click", (e)=>{
    e.preventDefault();
    console.log("hi");

    let data={
        "name":name_signup.value,
        "user": user_signup.value,
        "password":pass_signup.value
    }
    
    // let data=`name=${name_signup}&user=${user_signup}&password=${pass_signup}`;
    console.log(data);
    console.log(JSON.stringify(data));
    
    let xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange=function(){
        if(this.readyState==4&&this.status==200){
            // let response = JSON.parse(this.response);
            // console.log(response);
            console.log("successfull");

        }
        else if(this.readyState == 4 && this.status != 200){
            console.log("unsuccessfull");
        }
    }
    xhr.open("POST", "./signup.php", true);
    xhr.send(JSON.stringify(data));

   


});



