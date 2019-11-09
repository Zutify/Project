<!-- formularz logowania-->
<?php
session_start();
include '../php/form_view.php';
?>
<link rel="stylesheet" type="text/css" href="../style/zutify.css">
<div class="form">

    <form action="../php/login.php" method="post">


        <h2>Zaloguj mnie</h2>


        <p>
            <label for="email" class="floatLabel">Email</label>
            <input id="email" type="text" name="email" <?php check_input('email'); ?>>

            <label class="Error" id="mailError" ><?php check_msg('email'); ?></label>

        </p>

        <p><label for="password" class="floatLabel">Hasło</label>
            <input id="password" type="password" name="password" <?php check_input('password'); ?>>

            <label class="Error" id="passwordError"><?php check_msg('password'); ?></label>
        </p>



        <input type="submit" value="Log in" name="submit">
    </form>
</div>