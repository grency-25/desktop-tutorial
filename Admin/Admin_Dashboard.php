<!DOCTYPE html>
<html>

<head>
    <title>Pharma Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">



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
        <h1 style="color: white; background-color: rgb(229, 29, 22); padding: 20px;">Welcome Admin</h1>

        <div class="cards">
            <div class="card">Total Medicines: 250</div>
            <div class="card">Low Stock: 18</div>
            <div class="card">Orders Today: 32</div>
            <div class="card">Employees: 12</div>
        </div>
    </div>


    <h2 style="color: white; background-color: rgb(229, 42, 42); padding: 20px;">
    Recent Orders
</h2>

<div class="search-box">
    <form id="searchForm">
        <input type="text" id="searchInput" placeholder="Search by Customer Name">
        <select id="statusFilter">
            <option value="">Select Status</option>
            <option value="Delivered">Delivered</option>
            <option value="Pending">Pending</option>
        </select>
        <button type="submit">Search</button>
        <div class="error" id="searchError"></div>
    </form>
</div>



    <div class="main">
        <div class="cards">
            <h2 style="color: white; background-color: rgb(229, 42, 42); padding: 20px;">Recent Orders</h2>

            <table border="20" style="width: 90%; margin-left: 14px;">
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Medicine</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>ORD101</td>
                    <td>John Doe</td>
                    <td>Paracetamol</td>
                    <td>2</td>
                    <td>Delivered</td>
                </tr>
                <tr>
                    <td>ORD102</td>
                    <td>Jane Smith</td>
                    <td>Ibuprofen</td>
                    <td>1</td>
                    <td>Pending</td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    $("#searchForm").submit(function(e){

        let search = $("#searchInput").val().trim();
        let status = $("#statusFilter").val();
        let valid = true;

        $("#searchError").text("");

        if(search === "" && status === ""){
            $("#searchError").text("Please enter customer name or select status");
            valid = false;
        }

        if(!valid){
            e.preventDefault();
        }

    });

});
</script>