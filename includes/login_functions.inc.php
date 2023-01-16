<?php 

function redirect_user($page = 'index.php') {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');
    $url .= '/' . $page;

    header("Location: $url");
    exit();
}

function check_login($dbc, $email = '', $pass = '') {
    $errors = [];
    if(empty($email)) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($email));
    }

    if(empty($pass)) {
        $errors[] = 'You forgot to enter your password.';
    } else {
        $p = trim($pass);
    }

    if(empty($errors)) {
        $q = "SELECT user_id, first_name, pass FROM users WHERE email='$e'";
        $r = @mysqli_query($dbc, $q);

        if(mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

            if(password_verify($p, $row['pass'])) {
                unset($row['pass']);
                return [true, $row];
            } else {
                $errors[] = 'The email address and password do not match.';
            }
            
        } else {
            $errors[] = 'The email address and password do not match.';
        }
    }
    return [false, $errors];
}

?>