document.getElementById("profile").addEventListener("click", (e)=>{
    e.preventDefault();
    console.log("clicked button");
   

    // var remember=getCookie("remember");
    // console.log(remember);
    // if(remember=="0"){

    //     console.log("removing");
    //     // document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    //     let time_new=new Date();
    //     document.cookie = "username=; expires="+time_new+"-3600; path=/;";
    //     document.cookie = "password=; expires="+time_new+"-3600; path=/;";

    //     console.log("removed");
    // }

});

// window.onbeforeunload = function(){
//     // return 'Are you sure you want to leave?';

//     var remember=getCookie("remember");
//     console.log(remember);
//     if(remember=="0"){

//         console.log("removing");
//         // document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
//         let time_new=new Date();
//         document.cookie = "username=; expires="+time_new+"-3600; path=/;";
//         document.cookie = "password=; expires="+time_new+"-3600; path=/;";

//         console.log("removed");


//     }
  
// };

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

// function checkCookie() {
//     var username = getCookie("username");
//     if (username != "") {
//      alert("Welcome again " + username);
//     } else {
//       username = prompt("Please enter your name:", "");
//       if (username != "" && username != null) {
//         setCookie("username", username, 365);
//       }
//     }
// }