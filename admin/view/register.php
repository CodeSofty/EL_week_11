<?php 
include('view/header.php');
?>


<h2>Register a new admin user</h2>

<form action ="." method="POST">
<label>Username:</label>
<input type="hidden" name="action" value="register">
<input type="text" name="username" required> 
<label>Password:</label>
<input type="hidden" name="action" value="register">
<input type="text" name="password" required>
<label>Confirm Password:</label>
<input type="hidden" name="action" value="register">
<input type="text" name="confirm_password" required>
<button type="submit">Submit</button>


</form>
<!-- <div class="container">
    <form action = "." method="POST">
        <div class="form-group">
            <label>Username:</label>
            <input type="hidden" name="action" value="register">
            <input type="text" name="username" maxlength 20 autofocus required> 
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="text" name="password" maxlength 20 autofocus required> 
        </div>

        <div class="form-group">
            <label>Confirm Password:</label>
            <input type="text" name="confirm_password" maxlength 20 autofocus required> 
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div> -->

<?php 


include('view/footer.php');

?>