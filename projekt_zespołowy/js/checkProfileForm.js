var  profileEmail = document.getElementById("profileEmail").value;
var  profileName = document.getElementById("profileName").value;
var  phoneNumber = document.getElementById("phoneNumber").value;


window.onbeforeunload = function(){
    if(phoneNumber != document.getElementById("phoneNumber").value){
        return "";
    }
    
    if(profileEmail != document.getElementById("profileEmail").value){
        return ""
    }
    if(profileName != document.getElementById("profileName").value){
        return ""
    }
    
}