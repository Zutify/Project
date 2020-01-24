<!-- formularz logowania-->
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
    
    <div class="mt-5 mb-5 ml-5">
        <div class="display-1 text-black">
            <strong lang="pl">Logowanie</strong>
            <strong lang="en">Log in</strong> 
        </div>
    </div>
            
    <div class="w-75 mx-auto ">
        
        <form action="php/login.php" method="post" >
            
            <div class="mt-5 mb-3">
                <label for="email" class="h3">Login</label>
            </div>
                    
            <div >
                <input type="text" name="email" id="email" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;"<?php check_input('email'); ?>>
            </div>
                   
            <div>
                <label class="h4 text-danger"><?php check_msg('email'); ?></label>
            </div>
                
            
            <div class="mt-5 mb-3">
                <label for="password" class="h3 "><a lang="pl">Hasło</a><a lang="en">Password</a></label>
            </div>
                
                    
            <div >
                <input type="password" name="password" id="password" class="form-control form-control-lg" style="height: 80px; font-size: 20pt;"<?php check_input('password'); ?>>
            </div>
                    
                
            <div >
                <label class="h4 text-danger"><?php check_msg('password'); ?></label>
            </div>
                
            <div class=" mt-3 mb-5 d-flex justify-content-end">
                <ul  class="list-group">
                    <li class="list-group-item" style="border: none;">
                        <div class="h5">
                            <a href="../index.php?page=passwordForget" class="text-dark" lang="pl">
                                Przypomnij hasło
                            </a>
                            <a href="../index.php?page=passwordForget" class="text-dark" lang="en">
                                Remind password
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
                
            <div >
                <input type="submit" value="DALEJ" name="submit" class="btn btn-success btn-lg btn-block" lang="pl" style="height: 120px; font-size: 50px;">
                <input type="submit" value="NEXT" name="submit" class="btn btn-success btn-lg btn-block" lang="en" style="height: 120px; font-size: 50px;">
            </div>
                
        </form>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/changeLang.js"></script>