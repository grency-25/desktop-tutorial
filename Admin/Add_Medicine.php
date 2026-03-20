<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Medicine - Pharma Admin</title>

<title>Pharma Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">

<style>



body{
    margin:0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#0fa958,#0c7c42);
}



.container{
    width:450px;
    margin:60px auto;
    background:white;
    padding:30px;
    border-radius:8px;
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
}



h2{
    text-align:center;
    margin-bottom:20px;
    color:#0c7c42;
}



label{
    font-weight:bold;
    display:block;
    margin-top:10px;
}

input{
    width:100%;
    padding:8px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:4px;
}

input:focus{
    border-color:#0fa958;
    outline:none;
}



button{
    width:100%;
    padding:10px;
    margin-top:20px;
    background:#0fa958;
    color:white;
    border:none;
    border-radius:4px;
    cursor:pointer;
    font-size:15px;
}

button:hover{
    background:#0c7c42;
}

.error{
    color:red;
    font-size:13px;
    margin-top:3px;
}

    .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 230px;
    height: 100vh;
    background: #111827;
    padding-top: 20px;
    
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

<div class="container">
    <h2>Add Medicine</h2>

    <form id="medicineForm">

        <label>Medicine Name</label>
        <input type="text" id="name">
        <div class="error" id="nameError"></div>

        <label>Company</label>
        <input type="text" id="company">
        <div class="error" id="companyError"></div>

        <label>Price</label>
        <input type="number" id="price">
        <div class="error" id="priceError"></div>

        <label>Quantity</label>
        <input type="number" id="qty">
        <div class="error" id="qtyError"></div>

        <label>Expiry Date</label>
        <input type="date" id="expiry">
        <div class="error" id="expiryError"></div>

        <button type="submit">Add Medicine</button>

    </form>
</div>

<script>
document.getElementById("medicineForm").addEventListener("submit", function(e){

    document.querySelectorAll(".error").forEach(function(el){
        el.innerText = "";
    });

    let name = document.getElementById("name").value.trim();
    let company = document.getElementById("company").value.trim();
    let price = document.getElementById("price").value;
    let qty = document.getElementById("qty").value;
    let expiry = document.getElementById("expiry").value;

    if(name === ""){
        document.getElementById("nameError").innerText = "Medicine name is required";
        document.getElementById("name").focus();
        e.preventDefault();
        return false;
    }

    if(company === ""){
        document.getElementById("companyError").innerText = "Company name is required";
        document.getElementById("company").focus();
        e.preventDefault();
        return false;
    }

    if(price === ""){
        document.getElementById("priceError").innerText = "Price is required";
        document.getElementById("price").focus();
        e.preventDefault();
        return false;
    }

    if(price <= 0){
        document.getElementById("priceError").innerText = "Price must be greater than 0";
        document.getElementById("price").focus();
        e.preventDefault();
        return false;
    }

    if(qty === ""){
        document.getElementById("qtyError").innerText = "Quantity is required";
        document.getElementById("qty").focus();
        e.preventDefault();
        return false;
    }

    if(qty <= 0){
        document.getElementById("qtyError").innerText = "Quantity must be greater than 0";
        document.getElementById("qty").focus();
        e.preventDefault();
        return false;
    }

    if(expiry === ""){
        document.getElementById("expiryError").innerText = "Expiry date is required";
        document.getElementById("expiry").focus();
        e.preventDefault();
        return false;
    }

    alert("Medicine Added Successfully!");
});
</script>

</body>
</html>