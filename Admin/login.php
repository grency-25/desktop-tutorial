<?php
session_start();

// ✅ If admin already logged in, redirect to dashboard
if(isset($_SESSION['admin_username'])){
    header("Location: Admin_Dashboard.php");
    exit();
}

// Initialize error message
$error = "";

// ✅ Handle login form submission
if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Backend validation
    if(empty($username) || empty($password)){
        $error = "All fields are required!";
    } else {
        // Example credentials for demo
        // Replace with database check in real project
        $correct_username = "admin";
        $correct_password = "admin123";

        if($username === $correct_username && $password === $correct_password){
            $_SESSION['admin_username'] = $username;
            header("Location: Admin_Dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pharma Admin Login</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#141e30,#243b55);
}

/* Glass Login Card */
.login-card{
    width:350px;
    padding:40px;
    border-radius:20px;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.5);
    text-align:center;
    color:white;
    animation: fadeIn 0.8s ease-in-out;
}

@keyframes fadeIn{
    from{ opacity:0; transform: translateY(-20px); }
    to{ opacity:1; transform: translateY(0); }
}

.login-card h2{
    margin-bottom:20px;
    font-size:28px;
}

.login-card form{
    display:flex;
    flex-direction: column;
}

.login-card input{
    padding:12px;
    margin-bottom:20px;
    border:none;
    border-radius:10px;
    font-size:15px;
    outline:none;
}

.login-card input:focus{
    border: 1px solid #fff;
}

.login-card button{
    padding:12px;
    border:none;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
    background:#0fa958;
    color:white;
    transition:0.3s ease;
}

.login-card button:hover{
    background:#0c7c42;
    transform: scale(1.05);
}

/* Error Message */
.error-msg{
    background: rgba(255,0,0,0.6);
    padding:10px;
    margin-bottom:15px;
    border-radius:8px;
    font-size:14px;
}
</style>
</head>
<body>

<div class="login-card">
    <h2>Pharma Admin Login</h2>

    <!-- Display error -->
    <?php if($error != ""): ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>