var user= document.getElementById("user_login");
var pass= document.getElementById("pass_login");

console.log(user);

setCookie(user,pass);

function setCookie(userId, pass) {
    // var d = new Date();
    document.cookie = "username" + "=" + userId + ";" ;
    document.cookie = "password" + "=" + pass + ";" ;

   console.log("cookies set");

}

location.href='chatroom.php';


// function getCookie(cname) {
//     var name = cname + "=";
//     var decodedCookie = decodeURIComponent(document.cookie);
//     var ca = decodedCookie.split(';');
//     for(var i = 0; i <ca.length; i++) {
//         var c = ca[i];
//         while (c.charAt(0) == ' ') {
//         c = c.substring(1);
//         }
//         if (c.indexOf(name) == 0) {
//         return c.substring(name.length, c.length);
//         }
//     }
//     return "";
// }


// function checkCookie() {

//     var no_of_visits=getCookie("visit");
//     var time1=getCookie("time");

//     if(no_of_visits!=""){
//         let visit_new=parseInt(no_of_visits)+1;
//         alert("number of visits = "+visit_new+" at"+time1);

//         setCookie("visit", visit_new);
//         let time_new=new Date();
//         setCookie("time", time_new);
        

//     }
//     else{
//         let time_new=new Date();
//         setCookie("time", time_new);
//         setCookie("visit", 1);
//         alert("Number of visits=0");

//     }

    // var username = getCookie("username");
    // if (username != "") {
    // alert("Welcome again " + username);
    // } else {
    //     username = prompt("Please enter your name:", "");
    //     if (username != "" && username != null) {
    //     setCookie("username", username, 365);
    //     }
    // }

