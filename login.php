<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('includes/login_functions.inc.php');
    require('../mysqli_connect.php');

    list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
    
    if($check) {
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

        redirect_user('loggedin.php');
    } else {
        $errors = $data;
    }

    mysqli_close($dbc);
}

include('includes/login_page.inc.php');
?>