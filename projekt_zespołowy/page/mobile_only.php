<!--
<div style="margin-top: 200px; text-align: center;">
<b><h1>Error</h1></b>
<h2>This site is only for mobile devices.</h2>
</div>
-->
<style>
.btn{
    position:relative;
    top:53%; 
    left:47%;
}
</style>

<link rel='stylesheet' type='text/css' href='../projekt_zespołowy//style/zutify.css'>
<link rel='stylesheet' type='text/css' href='../projekt_zespołowy//style/bootstrap.min.css'>
<div class='w-100 h-50 '>
    <div class='pt-1 mt-1'>
        <div class='display-2 text-center text-white'>ZUTify</div>
        <div class='pt-3 mt-3'>
        <button type="button" class="btn btn-success" onclick="langChangePl()">PL</button>
        <button type="button" class="btn btn-success" onclick="langChangeEng()">ENG</button>
    </div>
    </div>
    <div class='pt-2 mt-2'>
        <div class='display-4 text-center text-white'>
        <p id="mobile_only"></p>
        </div>
    </div>
</div>
<div class='desktop_view'></div>   

<script>
//definiuje zawartość dla id
var eng = {
    mobile_only: "Mobile Only"
}
var pl = {
    mobile_only: "Tylko mobilnie"
}

//default
var lang = pl;
document.getElementById("mobile_only").innerHTML = lang.mobile_only;

//zmiana języka
function langChangePl() {
    var lang = pl;  
    document.getElementById("mobile_only").innerHTML = lang.mobile_only;
}
function langChangeEng() {
    var lang = eng; 
    document.getElementById("mobile_only").innerHTML = lang.mobile_only;
}
</script>