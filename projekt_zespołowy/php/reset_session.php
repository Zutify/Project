<?php

if (isset($_GET['page']) && !empty($_GET['page'])) {
    if ($_GET['page'] !== 'register') {
        unset($_SESSION['register_response']);
    }
    if($_GET['page'] !== 'login'){
        unset($_SESSION['login_response']);
    }
} else {
    unset($_SESSION['register_response']);
    unset($_SESSION['login_response']);
}

