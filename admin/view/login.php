<?php 

// Display $login_message if it exists (page 707)

if($login_message) {
    echo $login_message;
}

// Add form to submit username and password

?>

<form action = "." method="POST">
    <div class="form-group">
        <label>Username:</label>
        <input type="hidden" name="action" value="login">
        <input type="text" name="username" maxlength 20 autofocus required> 
    </div>

    <div class="form-group">
        <label>Password:</label>
        <input type="text" name="password" maxlength 20 autofocus required> 
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

