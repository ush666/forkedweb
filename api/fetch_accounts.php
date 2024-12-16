<?php
header('Content-Type: application/json');
include '../classes/database.php'; // Adjust the path based on your project structure

// Query to fetch accounts
$query = "SELECT id, username, email, role FROM accounts"; // Replace 'accounts' with your table name
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(['error' => 'Failed to fetch accounts.']);
    exit;
}

$accounts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $accounts[] = $row;
}

echo json_encode($accounts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts Table</title>
    <!-- Optionally include CSS here to style the table -->
</head>
<body>
    <!-- Table to display the accounts data -->
    <table id="accountsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <!-- AJAX Data Will Populate Here -->
        </tbody>
    </table>

    <!-- JavaScript to fetch and populate the table -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Fetch data using AJAX from the API
            fetch('api/fetch_accounts.php')  // Ensure the path is correct to your fetch_accounts.php file
                .then(response => response.json())  // Parse the JSON response
                .then(data => {
                    const tableBody = document.querySelector("#accountsTable tbody");
                    tableBody.innerHTML = "";  // Clear any existing data in the table

                    // Loop through the data and populate the table
                    data.forEach(account => {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${account.id}</td>
                            <td>${account.username}</td>
                            <td>${account.email}</td>
                            <td>${account.role}</td>
                        `;
                        tableBody.appendChild(row);  // Append the new row to the table body
                    });
                })
                .catch(error => console.error('Error fetching accounts:', error));  // Handle errors
        });
    </script>
</body>
</html>
