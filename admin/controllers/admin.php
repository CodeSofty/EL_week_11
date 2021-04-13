<?php
switch($action) {

    case "show_login":
        include('view/login.php');
    break;

    case "login":
        $username = filter_input(INPUT_POST,'username');
        $password = filter_input(INPUT_POST,'password');
        is_valid_login($username, $password);
        if(is_valid_login($username, $password, $confirm_password)){
            $_SESSION['is_valid_admin'] = true;
        } else {
            echo $login_message="You must be logged in to view this page.";
            include('view/login.php');
        }
        break;

    case "register":
        include('util/valid_register.php');
        $errors = valid_registration($username, $password, $confirm_password);
        if($errors) {
            include('view/register.php');
        } else {
        $username = filter_input(INPUT_POST,'username');
        $password = filter_input(INPUT_POST,'password');
        $confirm_password = filter_input(INPUT_POST,'confirm_password');
                add_admin($username,$password);
                $_SESSION['is_valid_admin'] = true;
                header('Location: .?action=list_vehicles');
        }
        break;

case "show_register":
    include('view/register.php');
    break;

}


?>