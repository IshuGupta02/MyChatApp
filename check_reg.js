function check(){

  console.log("checking signup");

  // console.log(checkpass());
  // console.log(confirmpass());
  // console.log(checkuser1());
  

  if(checkpass() && confirmpass()==true){
    console.log("checked signup");
    console.log("correct");
    document.getElementById("login_error").innerText="CREATING YOUR ACCOUNT";
    document.getElementById("signupform").setAttribute("onsubmit", "");
    document.getElementById("signupform").submit();
    document.getElementById("signupuser").click();

  }
  else{
    console.log("signup failed");
    // document.getElementById("login_error").innerText="PLEASE PROVIDE VALID SIGNUP DETAILS...";

  }

  
    
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

function checkuser1(){


  var str1=document.getElementById("user_signup").value;

  if(str1.length==0){
    document.getElementById("login_error").innerText="USERNAME CANNOT BE EMPTY";
    return false;

  }
    console.log(str1);
    str={
        user:str1
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText=="true"){

            document.getElementById("login_error").innerText="CONGRATULATIONS! VALID USERNAME";
            
            console.log("entered");
            
            return true;

        }
        else{

            document.getElementById("login_error").innerText="USERNAME ALREADY EXISTS!";

            console.log("not entered");
            return false;
                
        }
      }
 
    };
    xmlhttp.open("POST", "checkduplicate.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(JSON.stringify(str));
       

}

function checkpass(){
  console.log("validated");
  return true;

}

function confirmpass(){
  var str1=document.getElementById("pass_signup").value;
  var str2=document.getElementById("pass_signup2").value;
  if(str1==str2){
    console.log("validated");

    return true;

  }
  else{
    console.log("not validated");

    document.getElementById("login_error").innerText="CONFIRM PASSWORD DOES NOT MATCH WITH PASSWORD";
    return false;

  }



}

function checkuser2(){


  var str1=document.getElementById("user_signup").value;

  if(str1.length==0){
    document.getElementById("login_error").innerText="USERNAME CANNOT BE EMPTY";
    return false;

  }
    console.log(str1);
    str={
        user:str1
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText=="true"){

            document.getElementById("login_error").innerText="CONGRATULATIONS! VALID USERNAME";
            
            console.log("entered");
            check();
            
            return true;

        }
        else{

            document.getElementById("login_error").innerText="USERNAME ALREADY EXISTS!";

            console.log("not entered");
            return false;
                
        }
      }
 
    };
    xmlhttp.open("POST", "checkduplicate.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(JSON.stringify(str));
       

}



