<?php
include("include/visitorheader.php");
?>

<script>
    function validateLogin(){
        
    
    var name= document.forms["myForm"]["name"].value;
    var pass= document.forms["myForm"]["pass"].value;
    if (name !='system' || pass !='1234')
    {
        alert("Invalid Server Name and Password Combination");
        return false;
    }

    }    
    
</script>

<h1 style="text-align: center">Login</h1>
<form class="custom-form" action="admin.php" name="myForm"  onsubmit="return validateLogin()">
    Server Name:
    <input type="text" id="name" name="name" placeholder="Server Name" required>
    Password:
    <input type="password" id="pass" name="pass" required>
    <input type="submit" name="submit" class="btn btn-primary"> </br> </br>
    <a href="index.php" class="btn btn-inverse">Back</a> 
</form>

<?php
include("include/visitorfooter.php");
?>