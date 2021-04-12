<?php 

session_start();

require('model/admin_db.php');

switch($action) {
    case "register":
        $username = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING);
        $confirm_password = filter_input(INPUT_POST,'confirm_password', FILTER_SANITIZE_STRING);

        
        include('util/valid_register.php');
            valid_registration($username, $password, $confirm_password);
        if(valid_registration($username, $password, $confirm_password)) {
            $errors = valid_registration($username, $password, $confirm_password);
            foreach($errors as $error) {
                echo '<ul>' . $error . '</ul><br/><br/>';
            }
            include('view/register.php');
        } else {
                add_admin($username,$password);
                $_SESSION['is_valid_admin'] = true;
                echo "hello";
        }
        break;

case "show_register":
    include('view/register.php');

}

?>