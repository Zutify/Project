<!-- formularz rejestracji-->
<?php
session_start();
include '../php/form_view.php';
?>
<link rel="stylesheet" type="text/css" href="../style/zutify.css">
<div class="form">

    <form onsubmit="return przedWyslaniem()" action="../php/registration.php" method="post" >


        <h2>Zarejestruj się</h2>
        <p>
            <label for="firstName" class="floatLabel">Login</label>

            <input id="login" type="text" name="login" <?php check_input('login'); ?>>

            <label class="Error" ><?php check_msg('login'); ?></label>
        </p>

        <p>
            <label for="firstName" class="floatLabel">Imię</label>

            <input id="firstName" type="text" name="firstName" <?php check_input('firstName'); ?>>

            <label class="Error" ><?php check_msg('firstName'); ?></label>
        </p>

        <p><label for="lastName" class="floatLabel">Nazwisko</label>
            <input id="lastName" type="text" name="lastName" <?php check_input('lastName'); ?>>

            <label class="Error" ><?php check_msg('lastName'); ?></label>
        </p>

        <p>
            <label for="email" class="floatLabel">Email</label>
            <input id="email" type="email" name="email" <?php check_input('email'); ?>>

            <label class="Error" id="mailError"><?php check_msg('email'); ?></label>

        </p>

        <p><label for="password" class="floatLabel">Hasło</label>
            <input id="password" type="password" name="password" <?php check_input('password'); ?>>

            <label class="Error" id="passwordError"><?php check_msg('password'); ?></label>
        </p>

        <p> <label for="phoneNumber" class="floatLabel">Numer telefonu</label>
            <input id="phoneNumber" type="text" name="phoneNumber" <?php check_input('phoneNumber'); ?>>

            <label class="Error" ><?php check_msg('phoneNumber'); ?></label>
        </p>

            <input type="submit"  value="DALEJ" name="submit">
    </form>
</div>