<?php
session_start();

// ✅ Check if user is logged in
if (!isset($_SESSION['admin_username'])) {
    // Not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// ✅ Handle logout request
if (isset($_POST['logout'])) {
    // Clear all session data
    session_unset();
    session_destroy();

    // Redirect to login page with message
    header("Location: login.php?message=logout_success");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout - Pharma Admin</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    margin-left:230px; /* For sidebar space */
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#141e30,#243b55);
}

/* Sidebar */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 230px;
    height: 100vh;
    background: #111827;
    padding-top: 20px;
}

.sidebar h2 {
    color: white;
    text-align: center;
    margin-bottom: 20px;
}

.sidebar a {
    display: block;
    color: white;
    padding: 12px 20px;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #1f2937;
}

/* Glass Card */
.logout-card{
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

.logout-card h2{
    margin-bottom:15px;
    font-size:28px;
}

.logout-card p{
    font-size:15px;
    margin-bottom:30px;
    color:#ddd;
}

/* Buttons */
.button-group{
    display:flex;
    justify-content:space-between;
}

.btn{
    width:48%;
    padding:12px;
    border:none;
    border-radius:10px;
    font-size:15px;
    cursor:pointer;
    transition:0.3s ease;
}

/* Logout Button */
.logout-btn{
    background:#ff4b5c;
    color:white;
}

.logout-btn:hover{
    background:#ff1e38;
    transform: scale(1.05);
}

/* Cancel Button */
.cancel-btn{
    background:#ffffff;
    color:#333;
}

.cancel-btn:hover{
    background:#ddd;
    transform: scale(1.05);
}
</style>
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

<div class="logout-card">
    <h2>Hello, <?php echo $_SESSION['admin_username']; ?>!</h2>
    <p>Are you sure you want to logout from your account?</p>

    <form method="post">
        <div class="button-group">
            <button type="submit" name="logout" class="btn logout-btn">Logout</button>
            <button type="button" class="btn cancel-btn" onclick="history.back()">Cancel</button>
        </div>
    </form>
</div>

</body>
</html>