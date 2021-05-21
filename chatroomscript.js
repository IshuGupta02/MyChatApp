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



function funct(id){
    // tablename- ishu_chat_username
    document.getElementById("msgs").innerHTML="";
    // username_name="username";
    username=getCookie("username");

    str={
        "user":username,
        "with":id
    }


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
         
          var arrayrec=this.response;
          var objrec= JSON.parse(this.response);
          var arrayrec=objrec['res'];

          for(let i=0;i<arrayrec.length;i++){
              let obj=arrayrec[i];
              if(obj["sent"]==1){

                var node = document.createElement("div");
                var textnode = document.createTextNode(obj["msg"]);
                node.appendChild(textnode); 
                node.setAttribute("class","message to");
                document.getElementById("msgs").appendChild(node);
                                

              }
              else{
                var node = document.createElement("div");
                var textnode = document.createTextNode(obj["msg"]);
                node.appendChild(textnode); 
                node.setAttribute("class","message from");
                document.getElementById("msgs").appendChild(node);

              }
          }

        // console.log(this.response);

        // var node = document.createElement("LI");                 // Create a <li> node
        // var textnode = document.createTextNode("Water");         // Create a text node
        // node.appendChild(textnode);                              // Append the text to <li>
        // document.getElementById("myList").appendChild(node);     // Append <li> to <ul> with id="myList"

               
        
      }
 
    };
    xmlhttp.open("GET", "showchat.php?obj="+JSON.stringify(str), true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send();

    
    
}

function addmsg(){
    

}