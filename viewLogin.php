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
$sql = "SELECT * FROM login WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Details</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        
        <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Password:</strong> <?php echo $user['password']; ?></p>
        <a href="fetchLogin.php">Back to Records</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
