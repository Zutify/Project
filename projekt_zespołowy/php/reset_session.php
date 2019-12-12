<?php


if (isset($_GET['page']) && !empty($_GET['page'])) {
    if ($_GET['page'] !== 'rejestracja') {
        unset($_SESSION['register_response']);
    }
    if($_GET['page'] !== 'login'){
        unset($_SESSION['login_response']);
    }
    if($_GET['page'] !== 'passwordForget'){
        unset($_SESSION['forgot_password']);
    }
    if($_GET['page'] !== 'passwordReset'){
        unset($_SESSION['reset_password']);
    }
    if($_GET['page'] !== 'editProfile'){
        unset($_SESSION['edit_profile']);
    }
} else {
    unset($_SESSION['forgot_password']);
    unset($_SESSION['register_response']);
    unset($_SESSION['login_response']);
    unset($_SESSION['reset_password']);
    unset($_SESSION['edit_profile']);
}




// if (isset($_GET['page']) && !empty($_GET['page'])) {
//     if ($_GET['page'] !== 'rejestracja') {
//         unset($_SESSION['register_response']);
//     }
//     if($_GET['page'] !== 'login'){
//         unset($_SESSION['login_response']);
//     }
// } else {
//     unset($_SESSION['register_response']);
//     unset($_SESSION['login_response']);
// }

