<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "travel"; // Replace with your database name

$conn = new mysqli($host, $user, $password,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, email, password FROM login";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered users</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<nav>
            
                <a href="index.html" id="home">Home</a>
                
            
            
       
        </nav>
    <div class="container">
        <h1>Login Users</h1>
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <tr>
                <th>Email</th>
                <th>Password</th>
                
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><a href="viewLogin.php?id=<?php echo $row['id']; ?>">View</a></td>
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