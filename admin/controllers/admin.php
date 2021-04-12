<?php 
session_start();
// Use pages 706-707, it has extended view of this controller

//Actions needed to code: 


switch($action) {

    case "login":
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        is_valid_login($username, $password);
        if(is_valid_login($username, $password)) {
            $_SESSION['is_valid_login'] = true;
            header("Location: .?action=list_vehicles");
        } else {
            $login_message = "You must login to view this page.";
            include('view/login.php');
        }
    break;

    case "show_login":
        include('view/login.php');
    break;


    case 'register':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING); 

        include('util/valid_register.php');
        valid_registration($username, $password, $confirm_password);
        if(valid_registration($username, $password, $confirm_password))
        {
            foreach ($errors as $error)
            {
                echo $error;
            }
            include('view/register.php');
        } else{
            add_admin($username,$password);
            $_SESSION['is_valid_admin'] = true;
            include('../admin/controllers/vehicles.php');
        }
        break;

    case "show_register":
        include('view/register.php');
    break;

    // // case "logout":
    //     //empty session array
    //     unset($_SESSION['username']);
    //     unset($_SESSION['password']);
    //     unset($_SESSION['confirm_password']);
    //     // destroy session
    //     $session_destroy();
    //     // provide $login_message to display
    //     $login_message = "<h3>Thank you for logging out</h3>" ;
    //     include('view/login.php');


}


?>