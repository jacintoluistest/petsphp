<?php
include 'config.php';
$sql = "SELECT * FROM pets";
$result = $conn->query($sql);
// Define the path to the build number file
$buildNumberFile = __DIR__ . '/build_number.txt';
// Read the build number from the file
$buildNumber = 'Unknown';
if (file_exists($buildNumberFile)) {
    $buildNumber = file_get_contents($buildNumberFile);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet List from Jenkins</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Pet List from Jenkins cambio Luis Jacinto</h1>
    <a href="create.php">Add New Pet</a>

    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
    Open Contact Form
</button>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Acerca de</h4>
        </div>
        <div class="modal-body">
          <p>Sistema de Catálogo de Mascotas</p>
          <p>Version<?php echo htmlspecialchars($buildNumber); ?></p>
          <p></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  



    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Species</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['species']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
