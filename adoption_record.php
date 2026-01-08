<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_adoption";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch adoption records
$sql = "SELECT a.id, ad.name AS adopter_name, p.name AS pet_name, p.type AS pet_type, a.adoption_date
        FROM adoption a
        JOIN adopter ad ON a.adopter_id = ad.id
        JOIN pets p ON a.pet_id = p.id
        ORDER BY a.adoption_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adoption Records</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #888;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Adoption Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Adopter Name</th>
            <th>Pet Name</th>
            <th>Pet Type</th>
            <th>Adoption Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['adopter_name']."</td>
                        <td>".$row['pet_name']."</td>
                        <td>".$row['pet_type']."</td>
                        <td>".$row['adoption_date']."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
