<?php

function get_response() {
    if (isset($_SESSION['login_response']) && !empty($_SESSION['login_response'])) {
        return $_SESSION['login_response']; 
    }elseif(isset($_SESSION['register_response']) && !empty($_SESSION['register_response'])){
        return $_SESSION['register_response'];
    }else{
        return 0;
    }
}


//fills form with used values
function check_input($name) {
    if ($r = get_response()) {
        $val = $r->$name['field'];
        printf('value="%s"', $val);
    }
}

//sets radio to state before submit was pushed
function check_radio($name, $val) {
    if ($r = get_response()) {
        $checked = $r->$name['field'];
        if ($checked === $val) {
            echo "checked";
        }
    }
}

//prints error
function check_msg($name) {
    if ($r = get_response()) {
        if (isset($r->$name['msg'])) {
            printf('%s', $r->$name['msg']);
        }
    }
}