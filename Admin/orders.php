<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Orders - Pharma Admin</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

/* Sidebar */
.sidebar{
    position:fixed;
    top:0;
    left:0;
    width:230px;
    height:100vh;
    background:#111827;
    padding-top:20px;
}
.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:20px;
}
.sidebar a{
    display:block;
    color:#ccc;
    padding:12px 20px;
    text-decoration:none;
}
.sidebar a:hover{
    background:#1f2937;
    color:white;
}

/* Main Content */
.main{
    margin-left:230px;
    padding:40px;
    background:#f4f6f8;
    min-height:100vh;
}

h2{
    text-align:center;
    margin-bottom:20px;
    color:#333;
}

form{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
    margin-bottom:30px;
    width:50%;
    margin-left:auto;
    margin-right:auto;
}

label{
    font-weight:bold;
    display:block;
    margin-top:10px;
}

input, select{
    width:100%;
    padding:8px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    margin-top:15px;
    padding:10px 15px;
    background:#007bff;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#0056b3;
}

.error{
    color:red;
    font-size:13px;
}

/* Table */
table{
    width:50%;
    margin:auto;
    border-collapse:collapse;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

th, td{
    padding:12px;
    text-align:center;
    border:1px solid #ccc;
}

th{
    background:#007bff;
    color:white;
}

tr:nth-child(even){
    background:#f2f2f2;
}

.delivered{
    color:green;
    font-weight:bold;
}
.pending{
    color:orange;
    font-weight:bold;
}
.cancelled{
    color:red;
    font-weight:bold;
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

<div class="main">
<div class="container">

<h2>Add Customer Order</h2>

<form id="orderForm">
<label>Order ID</label>
<input type="text" id="orderId">
<div class="error" id="orderIdError"></div>

<label>Medicine Name</label>
<input type="text" id="medicine">
<div class="error" id="medicineError"></div>

<label>Quantity</label>
<input type="number" id="quantity">
<div class="error" id="quantityError"></div>

<label>Status</label>
<select id="status">
    <option value="">Select Status</option>
    <option value="Delivered">Delivered</option>
    <option value="Pending">Pending</option>
    <option value="Cancelled">Cancelled</option>
</select>
<div class="error" id="statusError"></div>

<button type="submit">Add Order</button>
</form>

<!-- Orders Table -->
<h2>Customer Orders</h2>
<table id="ordersTable">
<tr>
    <th>Order ID</th>
    <th>Medicine</th>
    <th>Quantity</th>
    <th>Status</th>
</tr>
</table>

</div>
</div>

<script>
document.getElementById("orderForm").addEventListener("submit", function(e){
    document.querySelectorAll(".error").forEach(el=>el.innerText="");

    let orderId = document.getElementById("orderId").value.trim();
    let medicine = document.getElementById("medicine").value.trim();
    let quantity = document.getElementById("quantity").value;
    let status = document.getElementById("status").value;

    // 1️⃣ Order ID
    if(orderId===""){
        document.getElementById("orderIdError").innerText="Order ID is required";
        document.getElementById("orderId").focus();
        e.preventDefault();
        return false;
    }

    // 2️⃣ Medicine
    if(medicine===""){
        document.getElementById("medicineError").innerText="Medicine name is required";
        document.getElementById("medicine").focus();
        e.preventDefault();
        return false;
    }

    // 3️⃣ Quantity
    if(quantity===""){
        document.getElementById("quantityError").innerText="Quantity is required";
        document.getElementById("quantity").focus();
        e.preventDefault();
        return false;
    }
    if(quantity<=0){
        document.getElementById("quantityError").innerText="Quantity must be greater than 0";
        document.getElementById("quantity").focus();
        e.preventDefault();
        return false;
    }

    // 4️⃣ Status
    if(status===""){
        document.getElementById("statusError").innerText="Select a status";
        document.getElementById("status").focus();
        e.preventDefault();
        return false;
    }

    // Add to table
    let table = document.getElementById("ordersTable");
    let row = table.insertRow(-1);
    row.insertCell(0).innerText = orderId;
    row.insertCell(1).innerText = medicine;
    row.insertCell(2).innerText = quantity;

    let statusCell = row.insertCell(3);
    statusCell.innerText = status;

    // Add status color
    if(status==="Delivered") statusCell.className="delivered";
    else if(status==="Pending") statusCell.className="pending";
    else statusCell.className="cancelled";

    alert("Order added successfully!");
    document.getElementById("orderForm").reset();
    e.preventDefault();
});
</script>

</body>
</html>