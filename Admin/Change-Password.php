<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password - Pharma Admin</title>
<title>Pharma Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">


<style>
body {
    margin:0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #0fa958, #0c7c42);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}
.sidebar{
    position:fixed;
    top:0;
    left:0;
    width:230px;
    height:100vh;
    background:#111827;
    padding-top:20px;
}

.container{
    width:400px;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

h2{
    text-align:center;
    color:#0c7c42;
    margin-bottom:20px;
}

label{
    display:block;
    margin-top:10px;
    font-weight:bold;
}

input{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:14px;
}

input.error{
    border:2px solid red;
}

button{
    width:100%;
    padding:12px;
    margin-top:15px;
    background:#0fa958;
    border:none;
    border-radius:6px;
    color:white;
    font-size:15px;
    cursor:pointer;
}

button:hover{
    background:#0c7c42;
}

.message{
    font-size:13px;
    margin-top:5px;
    color:red;
}

.message.success{
    color:green;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="sidebar">
        <h2>Pharma Admin</h2>
        <a href="Admin_Dashboard.php">Dashboard</a>
        <a href="Manage_Medicine.php">Medicines</a>
        <a href="Add_Medicine.php">Add Medicine</a>
        <a href="Stock.php">Stock</a>
        <a href="Employees.php">Employees</a>
        <a href="Orders.php">Orders</a>
        <a href="change-password.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </div>

<div class="container">
    <h2>Change Password</h2>

    <form id="passwordForm" novalidate>
        <label>New Password</label>
        <input type="password" id="password" autocomplete="off">
        <div class="message" id="passwordError"></div>

        <label>Confirm Password</label>
        <input type="password" id="confirm" autocomplete="off">
        <div class="message" id="confirmError"></div>

        <button type="submit">Change Password</button>
        <div class="message" id="msg"></div>
    </form>
</div>

<script>
$(document).ready(function(){

    $("#passwordForm").submit(function(e){
        e.preventDefault(); // Stop form submission

        // Clear previous errors
        $("#passwordError, #confirmError, #msg").text("");
        $("#password, #confirm").removeClass("error");

        let password = $("#password").val().trim();
        let confirm = $("#confirm").val().trim();
        let valid = true;

        // New password min 6 chars
        if(password.length < 6){
            $("#passwordError").text("Password must be at least 6 characters");
            $("#password").addClass("error").focus();
            valid=false;
        }

        // Confirm password match
        if(confirm !== password){
            $("#confirmError").text("Passwords do not match");
            $("#confirm").addClass("error");
            if(valid) $("#confirm").focus();
            valid=false;
        }

        // Success
        if(valid){
            $("#msg").removeClass("error").addClass("success").text("Password changed successfully!");
            $("#password, #confirm").css("border","2px solid #0fa958");
            $("#passwordForm")[0].reset();
        }
    });

});
</script>

</body>
</html>