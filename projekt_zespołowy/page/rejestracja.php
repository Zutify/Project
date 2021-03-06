<!-- formularz rejestracji-->
<?php
?>

<div class="container-fluid" style="min-width: 250px;">
    <div class="mt-5 mb-5 ml-5">
        <a href="index.php" class="h4 text-dark">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            <a lang="pl">Wstecz</a>
            <a lang="en">Back</a>
        </a>
    </div>
    
    <div class="mt-3 mb-3 ml-5">
        <div class="display-1 text-black">
            <strong lang="pl">Rejestracja</strong>
            <strong lang="en">Registration</strong> 
        </div>
    </div>
    
    <div class="w-75 mx-auto ">
        
        <form onsubmit="return przedWyslaniem()" action="php/registration.php" method="post">
            
            <div class="mt-5 mb-3">
                <label for="login" class="h3">Login</label>
            </div>
                    
            <div >
                <input id="login" type="text" name="login" class="form-control form-control-lg" style="height: 80px;"<?php check_input('login'); ?>>
            </div>
                   
            <div>
                <label class="h4 text-danger"><?php check_msg('login'); ?></label>
            </div>
                
            
            <div class="mt-5 mb-3">
                <label for="firstName" class="h3"><a lang="pl">Imię</a><a lang="en">First name</a></label>
            </div>
                
                    
            <div >
                <input id="firstName" type="text" name="firstName" class="form-control form-control-lg" style="height: 80px;" <?php check_input('firstName'); ?>>
            </div>
                    
                
            <div >
                <label class="h4 text-danger"><?php check_msg('firstName'); ?></label>
            </div>
                
	
	    <div class="mt-5 mb-3">
                <label for="lastName" class="h3"><a lang="pl">Nazwisko</a><a lang="en">Last name</a></label>
            </div>
                
                    
            <div >
                <input id="lastName" type="text" name="lastName" class="form-control form-control-lg" style="height: 80px;"<?php check_input('lastName'); ?>>
            </div>
                    
                
            <div >
                <label class="h4 text-danger"><?php check_msg('lastName'); ?></label>
            </div>
            
            <div class="mt-5 mb-3">
                <label for="email" class="h3">E-mail</label>
            </div>
                
                    
            <div >
                <input id="email" type="email" name="email" class="form-control form-control-lg" style="height: 80px;"<?php check_input('email'); ?>>
            </div>
                    
                
            <div >
                <label id="mailError" class="h4 text-danger"><?php check_msg('email'); ?></label>
            </div>


	    <div class="mt-5 mb-3">
                <label for="password" class="h3"><a lang="pl">Hasło</a><a lang="en">Password</a></label>
            </div>
                
                    
            <div >
                <input id="password" type="password" name="password" class="form-control form-control-lg" style="height: 80px;"<?php check_input('password'); ?>>
            </div>
                    
                
            <div >
                <label id="passwordError" class="h4 text-danger"><?php check_msg('password'); ?></label>
            </div>


            <div class="mt-5 mb-3">
                <label for="phoneNumber" class="h3"><a lang="pl">Numer telefonu</a><a lang="en">Phone number</a></label>
            </div>
                
                    
            <div >
                <input id="phoneNumber" type="text" name="phoneNumber" class="form-control form-control-lg" style="height: 80px;" <?php check_input('phoneNumber'); ?>>
            </div>
                    
                
            <div>
                <label class="h4 text-danger"><?php check_msg('phoneNumber'); ?></label>
            </div>
                    
            <div class="mt-5 mb-3">
                <input type="submit" value="DALEJ" name="submit" class="btn btn-success btn-lg btn-block" lang="pl" style="height: 120px; font-size: 50px;">
                <input type="submit" value="NEXT" name="submit" class="btn btn-success btn-lg btn-block" lang="en" style="height: 120px; font-size: 50px;">
            </div>
        </form>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/changeLang.js"></script>