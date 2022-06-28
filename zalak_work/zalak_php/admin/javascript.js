function validate() {
  
    var user = document.getElementById("email").value;
    var user2 = document.getElementById("email");
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (re.test(user)) {
        alert("done");
        return true;
    }
    else {
        user2.style.border = "red solid 3px";
        return false;
    }
}