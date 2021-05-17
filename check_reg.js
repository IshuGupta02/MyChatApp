function check(){
   
    var str=document.getElementById("user_signup").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // document.getElementById("txtHint").innerHTML = this.responseText;
        console.log(this.responseText);
        if(this.responseText=="true"){
            return true;
            // console.log("entered");
        }
        else{
            return false;
            // console.log("not entered");
        }
      }
    };
    xmlhttp.open("GET", "checkduplicate.php?q=" + str, true);
    xmlhttp.send();
       
}

