<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Stock Management - Pharma Admin</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
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
    transition:0.3s;
}

.sidebar a:hover{
    background:#1f2937;
    color:white;
}

/* Main Content */
.main{
    margin-left:230px;
    padding:40px;
    background:linear-gradient(135deg,#1e3c72,#2a5298);
    min-height:100vh;
}

/* Card Container */
.container{
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

h2{
    text-align:center;
    margin-bottom:20px;
    color:#2a5298;
}

/* Form */
label{
    font-weight:bold;
}

input{
    width:100%;
    padding:8px;
    margin-top:5px;
    margin-bottom:5px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    margin-top:10px;
    padding:10px;
    background:#2a5298;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#1e3c72;
}

.error{
    color:red;
    font-size:13px;
}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
    margin-top:25px;
}

th{
    background:#2a5298;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f2f2f2;
}

.low{ color:#e63946; font-weight:bold; }
.medium{ color:#ff9800; font-weight:bold; }
.high{ color:#2ecc71; font-weight:bold; }

@media(max-width:768px){
    .main{ padding:20px; }
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

<h2>Medicine Stock Management</h2>

<!-- Update Form -->
<form id="stockForm">

<label>Medicine Name</label>
<input type="text" id="medicine">
<div class="error" id="medicineError"></div>

<label>Quantity</label>
<input type="number" id="quantity">
<div class="error" id="quantityError"></div>

<button type="submit">Update Stock</button>

</form>

<!-- Stock Table -->
<table id="stockTable">
<tr>
    <th>Medicine</th>
    <th>Available Quantity</th>
    <th>Status</th>
</tr>

<tr>
    <td>Amoxicillin</td>
    <td>15</td>
    <td class="low">Low Stock</td>
</tr>

<tr>
    <td>Paracetamol</td>
    <td>50</td>
    <td class="medium">Medium Stock</td>
</tr>

<tr>
    <td>Vitamin C</td>
    <td>120</td>
    <td class="high">In Stock</td>
</tr>

</table>

</div>
</div>

<script>
document.getElementById("stockForm").addEventListener("submit", function(e){

document.querySelectorAll(".error").forEach(el=>el.innerText="");

let medicine = document.getElementById("medicine").value.trim();
let quantity = document.getElementById("quantity").value;

// Validation One by One
if(medicine === ""){
    document.getElementById("medicineError").innerText="Medicine name is required";
    document.getElementById("medicine").focus();
    e.preventDefault();
    return false;
}

if(quantity === ""){
    document.getElementById("quantityError").innerText="Quantity is required";
    document.getElementById("quantity").focus();
    e.preventDefault();
    return false;
}

if(quantity <= 0){
    document.getElementById("quantityError").innerText="Quantity must be greater than 0";
    document.getElementById("quantity").focus();
    e.preventDefault();
    return false;
}

// Auto Status Logic
let statusText="";
let statusClass="";

if(quantity <= 20){
    statusText="Low Stock";
    statusClass="low";
}
else if(quantity <= 80){
    statusText="Medium Stock";
    statusClass="medium";
}
else{
    statusText="In Stock";
    statusClass="high";
}

// Add Row to Table
let table = document.getElementById("stockTable");

let newRow = table.insertRow(-1);

newRow.insertCell(0).innerText = medicine;
newRow.insertCell(1).innerText = quantity;

let statusCell = newRow.insertCell(2);
statusCell.innerText = statusText;
statusCell.className = statusClass;

alert("Stock Updated Successfully!");

document.getElementById("stockForm").reset();

e.preventDefault();
});
</script>

</body>
</html>