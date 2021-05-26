var next = true;
function showCustomer(str,type) {
    var xhttp;  
    if (str == "") {
       document.getElementById("txtHint").innerHTML = "";
       return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var test = this.responseText;
        document.getElementById("txtHint").innerHTML = test;
      }
    };
    if(type=='c'){
        xhttp.open("POST", "checkCasefile.php?q="+str, true);
        xhttp.send();
    }else if(type == 'u'){
        xhttp.open("POST", "checkUser.php?q="+str, true);
        xhttp.send();
    }else{
        xhttp.open("POST", "checkInvestigator.php?q="+str, true);
        xhttp.send();
    }
}
function goOn(){
    if(next==true)
        return true;
    else{
        next=true;
        return false;
    }
}