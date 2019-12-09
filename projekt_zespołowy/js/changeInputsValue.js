function changeInputsValue(){
    var start = document.getElementById("start").value;
    var dest = document.getElementById("dest").value;
    if(start.length > 0 && dest.length > 0){
        document.getElementById("start").value = dest;
        document.getElementById("dest").value = start;
    }
}

