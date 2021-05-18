function check(){
    var str1=document.getElementById("user_signup").value;
    console.log(str1);
    str={
        user:str1
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText=="true"){
            
            console.log("entered");
            document.getElementById("signupform").setAttribute("onsubmit", "");
            document.getElementById("signupuser").click();
            return true;

        }
        else{

            console.log("not entered");
            return false;
                
        }
      }
 
    };
    xmlhttp.open("POST", "checkduplicate.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(JSON.stringify(str));
       
}

function prev(){
        


}

function checklogin(){
    document.getElementById("login_error").innerText="Checking credentials...";
    var str1=document.getElementById("user_login").value;
    var str2=document.getElementById("pass_login").value;

    // console.log(str1);

    str={
        user:str1,
        pass:str2
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText=="true"){

            document.getElementById("login_error").innerText="LOGGING IN...";
            
            console.log("entered");
            document.getElementById("loginform").setAttribute("onsubmit", "");
            document.getElementById("loginUser").click();
            return true;

        }
        else{

            document.getElementById("login_error").innerText="OOPS! WRONG CREDENTIALS FOR LOGIN! TRY AGAIN";

            console.log("not entered");
            return false;
                
        }
      }
 
    };
    xmlhttp.open("POST", "checkcred.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(JSON.stringify(str));
    

}



