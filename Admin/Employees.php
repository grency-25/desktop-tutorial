<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Management - Pharma Admin</title>

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

.container{
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:20px;
    color:#d85050;
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
    padding:8px 15px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:14px;
}

.addBtn{
    background:#4CAF50;
    color:white;
    margin-top:10px;
}

.edit{
    background:#2196F3;
    color:white;
}

.delete{
    background:#f44336;
    color:white;
}

button:hover{
    opacity:0.85;
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
    background:#4CAF50;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f1f1f1;
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

<h2>Employee Management</h2>

<!-- Add Employee Form -->
<form id="employeeForm">

<label>Employee ID</label>
<input type="text" id="empId">
<div class="error" id="idError"></div>

<label>Employee Name</label>
<input type="text" id="empName">
<div class="error" id="nameError"></div>

<label>Role</label>
<input type="text" id="empRole">
<div class="error" id="roleError"></div>

<button type="submit" class="addBtn">Add Employee</button>


</form>

<!-- Employee Table -->
<table id="employeeTable">
<tr>
<th>ID</th>
<th>Name</th>
<th>Role</th>
<th>Action</th>
</tr>
</table>

</div>
</div>

<script>
document.getElementById("employeeForm").addEventListener("submit", function(e){

document.querySelectorAll(".error").forEach(el=>el.innerText="");

let id = document.getElementById("empId").value.trim();
let name = document.getElementById("empName").value.trim();
let role = document.getElementById("empRole").value.trim();

// One by One Validation
if(id === ""){
    document.getElementById("idError").innerText="Employee ID required";
    document.getElementById("empId").focus();
    e.preventDefault();
    return false;
}

if(name === ""){
    document.getElementById("nameError").innerText="Employee name required";
    document.getElementById("empName").focus();
    e.preventDefault();
    return false;
}

if(role === ""){
    document.getElementById("roleError").innerText="Role required";
    document.getElementById("empRole").focus();
    e.preventDefault();
    return false;
}

// Add Row
let table = document.getElementById("employeeTable");
let row = table.insertRow(-1);

row.insertCell(0).innerText = id;
row.insertCell(1).innerText = name;
row.insertCell(2).innerText = role;

let actionCell = row.insertCell(3);
actionCell.innerHTML = `
<button class="edit" onclick="editRow(this)">Edit</button>
<button class="delete" onclick="deleteRow(this)">Delete</button>
`;

document.getElementById("employeeForm").reset();
alert("Employee Added Successfully!");

e.preventDefault();
});

// Delete Function
function deleteRow(btn){
if(confirm("Are you sure you want to delete this employee?")){
    let row = btn.parentNode.parentNode;
    row.remove();
}
}

// Edit Function
function editRow(btn){
let row = btn.parentNode.parentNode;

document.getElementById("empId").value = row.cells[0].innerText;
document.getElementById("empName").value = row.cells[1].innerText;
document.getElementById("empRole").value = row.cells[2].innerText;

row.remove();
}
</script>

</body>
</html>