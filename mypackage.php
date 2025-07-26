<?php 
$host = "localhost";
$user = "root";
$password = "";
$database = "travel"; // Replace with your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   
    $packageName= $_POST['packageName'];
    $description = $_POST['description'];
    $locations = $_POST['locations'];
    $attractions = $_POST['attractions'];
    $itinerary = $_POST['itinerary'];
    $duration=$_POST['duration'];
    $price=$_POST['price'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $media = "";
    if (isset($_FILES['media']) && $_FILES['media']['error'] == 0) {
        $targetDir = "uploads/";
        $media = $targetDir . basename($_FILES['media']['name']);
        move_uploaded_file($_FILES['media']['tmp_name'], $media);
    }

    $sql="INSERT INTO package(packageName, description, locations, attractions, itinerary, duration, price, media, name, email) VALUES ('$packageName','$description' ,'$locations','$attractions','$itinerary','$duration','$price','$media','$name','$email')";
    if ($conn->query($sql)) {
    echo "Data inserted successfully. <a href='fetchPackage.php'>View Records</a>";
    } else {
    echo "<p>Error: " . $conn->error . "</p>";
    }
    $conn->close();
?>
    