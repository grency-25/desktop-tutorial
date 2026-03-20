<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Medicines</title>

    <title>Pharma Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 230px;
    height: 100vh;
    background: #111827;
    padding-top: 20px;
}

        .main {
            width: 50%;
            max-width: 1000px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            background-color: #20b725;
            color: white;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #343a40;
            color: white;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            font-size: 15px;
            letter-spacing: 0.5px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e6f4ea;
            transition: 0.3s;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            margin: 2px;
        }

        button:hover {
            opacity: 0.85;
        }

        .edit-btn {
            background-color: #007bff;
            color: white;
        }

        .danger {
            background-color: #dc3545;
            color: white;
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
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

<div class="search-box">
    <input type="text" id="searchInput" placeholder="Search Medicine Name">
    <button id="searchBtn">Search</button>
    <div class="error" id="searchError"></div>
</div>

    <h2>Medicine List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Medicine Name</th>
                <th>Company</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>101</td>
                <td>Paracetamol</td>
                <td>KK Pharma</td>
                <td>₹30</td>
                <td>
                    <button class="edit-btn">Edit</button>
                    <button class="danger">Delete</button>
                </td>
            </tr>

            <tr>
                <td>102</td>
                <td>Ibuprofen</td>
                <td>HealthCorp</td>
                <td>₹50</td>
                <td>
                    <button class="edit-btn">Edit</button>
                    <button class="danger">Delete</button>
                </td>
            </tr>

            <tr>
                <td>103</td>
                <td>Cetirizine</td>
                <td>AllergyFree</td>
                <td>₹25</td>
                <td>
                    <button class="edit-btn">Edit</button>
                    <button class="danger">Delete</button>
                </td>
            </tr>

            <tr>
                <td>104</td>
                <td>Azithromycin</td>
                <td>Antibiotix</td>
                <td>₹80</td>
                <td>
                    <button class="edit-btn">Edit</button>
                    <button class="danger">Delete</button>
                </td>
            </tr>

            <tr>
                <td>105</td>
                <td>Loratadine</td>
                <td>AllergyFree</td>
                <td>₹40</td>
                <td>
                    <button class="edit-btn">Edit</button>
                    <button class="danger">Delete</button>
                </td>
            </tr>

            <tr>
                <td>106</td>
                <td>Metformin</td>
                <td>DiabetoCare</td>
                <td>₹60</td>
                <td>
                    <button class="edit-btn">Edit</button>
                    <button class="danger">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>

</body>
</html>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    // SEARCH VALIDATION
    $("#searchBtn").click(function(){

        let search = $("#searchInput").val().trim();

        $("#searchError").text("");

        if(search === ""){
            $("#searchError").text("Please enter medicine name to search");
            return false;
        }

        // Simple table filter
        $("tbody tr").each(function(){
            let medicine = $(this).find("td:eq(1)").text().toLowerCase();
            if(medicine.includes(search.toLowerCase())){
                $(this).show();
            } else {
                $(this).hide();
            }
        });

    });

    // DELETE CONFIRMATION
    $(".danger").click(function(){
        let row = $(this).closest("tr");
        let medName = row.find("td:eq(1)").text();

        let confirmDelete = confirm("Are you sure you want to delete " + medName + "?");

        if(confirmDelete){
            row.remove();
            alert("Medicine deleted successfully!");
        }
    });

    // EDIT VALIDATION
    $(".edit-btn").click(function(){

        let row = $(this).closest("tr");
        let id = row.find("td:eq(0)").text();
        let name = row.find("td:eq(1)").text();
        let company = row.find("td:eq(2)").text();
        let price = row.find("td:eq(3)").text();

        if(id === "" || name === "" || company === "" || price === ""){
            alert("Invalid data. Cannot edit this row.");
            return false;
        }

        alert("Editing Medicine: " + name);
        // Yaha tum future me modal open kar sakte ho
    });

});
</script>