<?php

if (isset($_GET['page']) && !empty($_GET['page'])) {
    if ($_GET['page'] !== 'form') {
        unset($_SESSION['response']);
    }
    if($_GET['page'] !== 'login'){
        unset($_SESSION['login_response']);
    }
} else {
    unset($_SESSION['response']);
    unset($_SESSION['login_response']);
}

