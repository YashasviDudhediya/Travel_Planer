<?php $host = "localhost";
$user = "root";
$password = "";
$database = "travel"; // Replace with your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

            
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $mobileNo = $_POST['mobileNo'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $country=$_POST['country'];
        
        $sql = "INSERT INTO registration(name, email, mobileNo, date, gender, country) VALUES ('$name','$email' ,'$mobileNo','$date','$gender','$country')";
        if ($conn->query($sql)) {
            echo "Data inserted successfully. <a href='fetchRegistration.php'>View Records</a>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
        $conn->close();
    ?>
    