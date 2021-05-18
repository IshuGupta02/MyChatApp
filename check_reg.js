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



