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

function createprompt(message, id){

    document.getElementById(id).innerText=message;

}

function btn(){
    console.log("clicked");
}

const check=async()=>{

// function check(){
    console.log("checking");
    console.log("checkname ",checkname());
    const result= await checkusername();
    console.log("checkusername: ",result);
    console.log("checkusername ",checkusername());
    console.log("checkgender ",checkgender());
    console.log("checkemail ",checkemail());
    console.log("checkphone ",checkphone());
    console.log("checkabout ",checkabout());
    
 
    // if((checkname()&&checkusername()&&checkgender()&&checkemail()&&checkphone()&&checkabout())==true){

    //     console.log(document.getElementById("updateform").getAttribute("onsubmit"));

    //     document.getElementById("updateform").setAttribute("onsubmit", "");

    //     console.log(document.getElementById("updateform").getAttribute("onsubmit"));

    //     let form=document.getElementById("updateform");

    //     form.submit();

    //     document.getElementById("updatebtn").click();


    // }
    // else{
    //     createprompt("PROFILE COULD NOT BE UPDATED","submitSuccess");
    //     console.log("unsuccessfull");

    // }

}

function checkname(){

    let name1=document.getElementById("name").value;
    let name=name1.trim();

    if(name.length==0){
        createprompt("This field cannot be empty","err_name");
        return false;
    }

    if(!name.match(/^[a-zA-Z\s\']+$/)){
        createprompt("Invalid name","err_name");
        return false;
    }

    createprompt("valid!","err_name");
    return true;


}

const checkusername= async () =>{


// function checkusername(){
    //console.log(document.getElementById("username"));
    var str2=document.getElementById("username").value;
    var str1=str2.trim();
    if(str1.length==0){
        console.log("checkusername() returning false");
        
        createprompt("please enter a valid username","err_username");
        return false;
        
    }

    if(str1==getCookie("username")){
        console.log("checkusername() returning true");
        createprompt("valid!","err_username");
        return true;
    }

    console.log(str1);
    str={
        user:str1
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText=="true"){
            
            console.log("entered");
            console.log("checkusername() returning true");
            createprompt("valid!","err_username");
            return true;

        }
        else{

            console.log("not entered");
            console.log("checkusername() returning false");
            createprompt("username already exists","err_username");
            return false;
                
        }
      }
 
    };
    xmlhttp.open("POST", "checkduplicate.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(JSON.stringify(str));


}
function checkgender(){

    return true;

}

function checkemail(){
    var email=document.getElementById("mail").value;

    if(email.length==0){
        createprompt("This field cannot be empty","err_mail");
        return false;

    }

    if(!email.match(/[^\s@\W]+\.?_?\.?[a-z0-9A-Z]*@[^\s@\W]+\.?[^\s@\W]*?\.?[^\s@\W]*?\.[a-zA-Z]+$/)){

    
        createprompt("Invalid email","err_mail");
        return false;

    }

    createprompt("valid!","err_mail");
    return true;


}

function checkphone(){

    let phone1=document.getElementById("phone").value;
    let phone=phone1.trim();

    if(phone.length==0){
        createprompt("This field cannot be empty","err_phone");
        return false;
    }
    if(!phone.match(/^(((\+91)?\s*(-)?\s*)|(0?)|((91)?\s*(-)\s*))[6789][0-9]{9}$/)){
        createprompt("invalid indian phone number","err_phone");
        return false;
        
        // /^(\+91)?\s*(-)?\s*[6789][0-9]{9}$/

    }
    createprompt("valid!","err_phone");
    return true;

}

function checkabout(){

    //createprompt("invalid indian phone number","err_phone");
    return true;

}