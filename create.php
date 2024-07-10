<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $species = $_POST['species'];
    $age = $_POST['age'];

    $sql = "INSERT INTO pets (name, species, age) VALUES ('$name', '$species', $age)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Pet</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Add New Pet</h1>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br>
        Species: <input type="text" name="species" required><br>
        Age: <input type="number" name="age" required><br>
        <input type="submit" value="Add">
    </form>
    <a href="index.php">Back to Pet List</a>
</body>
</html>
