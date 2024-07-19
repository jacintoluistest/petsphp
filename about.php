<?php
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
    <title>About</title>
</head>
<body>
    <div class="about-box">
        <h2>Pet Catalog</h2>
        <p>This application was built using Jenkins.</p>
        <p>Build Number: <?php echo htmlspecialchars($buildNumber); ?></p>
    </div>
</body>
</html>