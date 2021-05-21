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

function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue + ";" ;

}



function funct(id){
    setCookie("id", id);
    // var myVar = setInterval(funct(getCookie("id")), 10000);
    console.log(getCookie("id"));
    // setInterval(funct(id), 1000000);
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

      if (this.readyState == 4 && this.status == 200){

        document.getElementById("msgs").innerHTML="";
    
        //   var arrayrec=this.response;
          var objrec= JSON.parse(this.response);
          var arrayrec=objrec['res'];

          console.log(arrayrec);
        //   var node=new node[arrayrec.length];

        // var node=[];
        // for(let j=0;j<arrayrec.length;j++){
        //     node[j]=document.createElement("div");
        // }

        // var outernode=document.createElement("div");


        for(let i=0;i<arrayrec.length;i++){
            let obj1=arrayrec[i];
            let obj=JSON.parse(obj1);

            if(obj["sent"]==1){

                let node = document.createElement("div");
                // node.className="to";
                let textnode = document.createTextNode(obj["msg"]);
                console.log(obj["msg"]);
                
                node.appendChild(textnode); 
                node.setAttribute("id", i);
                
                node.setAttribute("class","message to");
                document.getElementById("msgs").appendChild(node);
                // outernode.appendChild(node[i]);
                            

            }
            else{
                let node = document.createElement("div");
                let textnode = document.createTextNode(obj["msg"]);
                console.log(obj["msg"]);
                
                node.appendChild(textnode); 
                node.setAttribute("id", i);
                node.setAttribute("class","message from");
                document.getElementById("msgs").appendChild(node);
                // outernode.appendChild(node[i]);

            }
        }

        // document.getElementById("msgs").appendChild(outernode);
               
        
      }
 
    };
    xmlhttp.open("GET", "showchat.php?obj="+JSON.stringify(str), true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send();

    
    
}

function addmsg(){

    var msg=document.getElementById("entermsg").value;


    let node=document.createElement("div");
    let textnode = document.createTextNode(msg);
    node.appendChild(textnode); 
    // node.setAttribute("id", i);
    node.setAttribute("class","message to");
    document.getElementById("msgs").appendChild(node);

    document.getElementById("entermsg").value="";



    var from=getCookie("username");
    var to=getCookie("id");

   

    str={
        "from":from,
        "to":to,
        "msg":msg
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
        var res=this.response;

         
          
               
        
    }
 
    };

    xmlhttp.open("POST", "addchat.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(JSON.stringify(str));


}