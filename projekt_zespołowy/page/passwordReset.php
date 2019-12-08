<!-- formularz logowania-->
<?php
if(isset($_GET['email']) == true){
    $email = $_GET['email'];
    $vkey = $_GET['vkod'];
}

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
            <strong>Zresetuj hasło</strong> 
        </div>
    </div>
            
    <div class="w-75 mx-auto ">
        <?php
            if(isset($email) && isset($vkey)){
              echo "<form action='php/password_help.php?vkod=$vkey&email=$email' method='post' >";  
            }else{
                echo "<form action='php/password_help.php' method='post' >";
            }
        ?>
        
            
            <div class="mt-5 mb-3">
                <label for="newPassword" class="h3">Nowe hasło</label>
            </div>
                    
            <div >
                <input type="password" name="newPassword" id="newPassword" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;"<?php check_input('newPassword'); ?>>
            </div>
                   
            <div>
                <label class="h4 text-danger"><?php check_msg('newPassword'); ?></label>
            </div>
                
            
            <div class="mt-5 mb-3">
                <label for="repeatPassword" class="h3 ">Powtórz hasło</label>
            </div>
                
                    
            <div >
                <input type="password" name="repeatPassword" id="repeatPassword" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;"<?php check_input('repeatPassword'); ?>>
            </div>
                    
                
            <div >
                <label class="h4 text-danger"><?php check_msg('repeatPassword'); ?></label>
            </div>
                
            <div >
                <input type="submit" value="DALEJ" name="submitReset" class="btn btn-success btn-lg btn-block" style="height: 120px; font-size: 50px; margin-top: 150px;">
            </div>
                
        </form>
    </div>
</div>