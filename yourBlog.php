<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "travel"; // Replace with your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, packageName, description, locations, attractions, itinerary, duration, price, media, name, email FROM package";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .nav-item {
            display: flex;
            flex-direction: row;
        }
        .card {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .card img {
            width: 100%;
            max-height: 70vh;
            border-radius: 10px;
        }
        .card-content {
            margin-top: 15px;
        }
        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">YourBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    <a class="nav-link" href="explore.html">Explore</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h1 class="text-center">User Packages</h1>
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card">
                    <img src="<?php echo $row['media']; ?>" alt="Package Image" class="card-img">
                        <div class="card-content">
                            <h2><?php echo $row['packageName']; ?></h2>
                            <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                            <p><strong>Locations:</strong> <?php echo $row['locations']; ?></p>
                            <p><strong>Attractions:</strong> <?php echo $row['attractions']; ?></p>
                            <p><strong>Itinerary:</strong> <?php echo $row['itinerary']; ?></p>
                            <p><strong>Duration:</strong> <?php echo $row['duration']; ?></p>
                            <p><strong>Price:</strong> $<?php echo $row['price']; ?></p>
                            <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                            
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No packages found.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php $conn->close(); ?>
