<?php 


// Use Page 703

function is_valid_login($username, $password) {
    global $db;
    $query = 'SELECT password FROM administrators
        WHERE username = :username';

        $statement->$db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = (!empty($row['password'])) ? $row['password'] : NULL; 
        return password_verify($password, $hash);

}

function add_admin($username, $password)
{
    global $db;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO administrators (username, password)
 VALUES (:username, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hash);
    $statement->execute();
    $statement->closeCursor();
}

function username_exists($username){
    global $db;
    $query = 'SELECT COUNT(*) FROM administrators
    WHERE username = :username';
    $statement->$db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $result = $statement->fetchColumn();
    $statement->closeCursor();
    return $result;
}

?>