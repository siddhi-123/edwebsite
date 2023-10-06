function myfun(){
    var a = document.getElementById("password").value;
    var b = document.getElementById("passwords").value;

    if(a==""){
        document.getElementById("messages").innerHTML="**Please Fill Password";
        return false;
    }
    if(a.length < 5){
        document.getElementById("messages").innerHTML="**Password length must be greater than 5 characters**";
        return false;
    }
}