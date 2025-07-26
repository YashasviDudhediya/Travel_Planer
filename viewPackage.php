<?php
// db.php
$host = "localhost";
$user = "root";
$password = "";
$database = "travel"; // Replace with your database name

$conn = new mysqli($host, $user, $password,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = intval($_GET['id']);
$sql = "SELECT * FROM package WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Packages</title>
    <link rel="stylesheet" href="stylePackage.css">
</head>
<body>
<nav>
            
                <a href="index.html" id="home">Home</a>
                
            
            
       
        </nav>
        
    <div class="container">
        <h1>Registered Users</h1>
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <tr>
                <th>ID</th>
                <th>packageName</th>
                <th>Descriptions</th>
                <th>Loacations</th>
                <th>Attractions</th>
                <th>Itinerary</th>
                <th>Durations</th>
                <th>Price</th>
                <th>Name</th>
                <th>Email</th>
                
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['packageName']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['locations']; ?></td>
                        <td><?php echo $row['attractions']; ?></td>
                        <td><?php echo $row['itinerary']; ?></td>
                        <td><?php echo $row['duration']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No records found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    
</body>
</html>
<?php
$conn->close();
?>
