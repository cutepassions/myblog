<?php

function checkToken( $user_token, $session_token) {  # Validate the given (CSRF) token
    if( ($user_token != $session_token) or (!($session_token) )) {
    ErrorMessage3("토큰이 유효하지 않습니다.");
    }
}

function generateSessionToken() {  # Generate a brand new (CSRF) token
if( isset( $_SESSION[ 'session_token' ] ) ) {
destroySessionToken();
}
session_start();
$_SESSION['session_token'] = md5( uniqid() );
}

function destroySessionToken() {  # Destroy any session with the name 'session_token'
unset( $_SESSION[ 'session_token' ] );
}

function tokenField() {  # Return a field for the (CSRF) token
return "<input type='hidden' name='user_token' value='{$_SESSION[ 'session_token' ]}' />";
}

function ErrorMessage3($message, $type = "on"){
        echo "<script> alert('$message'); ";
        if ($type == "on") echo " history.back(); ";
        echo "</script>";
        exit;
    }

?>