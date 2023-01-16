<?php

session_start();

if(!isset($_SESSION['user_id'])) {
    require('includes/login_functions.php');
    redirect_user();
} else {
    $_SESSION = [];
    session_destroy();
    setcookies('PHPSESSID', '', time()-3600, '/', '', 0, 0);
}

$page_title = 'Logged Out!';
include('includes/header.html');
echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";
include('includes/footer.html');

?>