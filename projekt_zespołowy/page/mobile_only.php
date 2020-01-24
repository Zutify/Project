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
        <button id="switch-lang" class="btn btn-success"><p lang="pl">Polski</p><p lang="en">English</p></button>
    </div>
    </div>
    <div class='pt-2 mt-2'>
        <div class='display-4 text-center text-white'>
        <p id="mobile_only" lang="pl">Tylko mobilnie</p>
        <p id="mobile_only" lang="en">Mobile Only</p>
        </div>
    </div>
</div>
<div class='desktop_view'></div>   


<script src="js/jquery.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/changeLang.js"></script>