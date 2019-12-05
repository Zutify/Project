<!-- formularz logowania-->
<?php
?>

<div class="container-fluid" style="min-width: 250px;">
    <div class="mt-5 mb-5 ml-5">
        <a href="index.php?page=login" class="h4 text-dark">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Wstecz
        </a>
    </div>
    
    <div class="mt-5 mb-5 ml-5">
        <div class="display-1 text-black">
            <strong>Przypomnij hasło</strong> 
        </div>
    </div>
            
    <div class="w-75 mx-auto ">
        
        <form action="php/password_help.php" method="post" >
            
            <div class="mt-5 mb-3">
                <label for="email" class="h3">E-mail</label>
            </div>
                    
            <div >
                <input type="email" name="email" id="email" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;"<?php check_input('email'); ?>>
            </div>
                   
            <div>
                <label class="h4 text-danger"><?php check_msg('email'); ?></label>
            </div>
                
            <div >
                <input type="submit" value="DALEJ" name="submitForget" class="btn btn-success btn-lg btn-block" style="height: 120px; font-size: 50px; margin-top: 150px;">
            </div>
                
        </form>
    </div>
</div>