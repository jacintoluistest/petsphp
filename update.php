<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pets WHERE id = $id";
    $result = $conn->query($sql);
    $pet = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $species = $_POST['species'];
    $age = $_POST['age'];

    $sql = "UPDATE pets SET name='$name', species='$species', age=$age WHERE id=$id";

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
    <title>Edit Pet</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Pet</h1>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $pet['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $pet['name']; ?>" required><br>
        Species: <input type="text" name="species" value="<?php echo $pet['species']; ?>" required><br>
        Age: <input type="number" name="age" value="<?php echo $pet['age']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Pet List</a>
</body>
</html>
