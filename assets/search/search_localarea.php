<?php
// DB config
$host = 'localhost';
$username = 'innova_cab';
$password = 'Tiger@12811281';
$database = 'innovacabrental_db';

// Connect to DB
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all entries
$sql = "SELECT * FROM localarea";
$result = $conn->query($sql);

// Initialize XML structure
$xmlContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$xmlContent .= '<localareas>' . PHP_EOL;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $place = $row['place'];
        $city = $row['city'];
        $lowercity = strtolower($city);
        $title = htmlspecialchars($place . " " . $city);
        $search = htmlspecialchars($city . "-localarea");

        // Create slug for URL
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $place . '-' . $city), '-'));
        $url = "https://www.tempotravellerinncr.in/tempo-traveller-in-" . $slug . ".html";

        // Example placeholders
        $image = "https://www.tempotravellerinncr.in/assets/images/services/tempo-traveller-in-$city.jpg"; // You can adjust this path
        $description = "Book a tempo traveller in $place $city at the best price.";

        // Build each entry
        $xmlContent .= "  <localarea>\n";
        $xmlContent .= "    <id>$id</id>\n";
        $xmlContent .= "    <search>$search</search>\n";
        $xmlContent .= "    <image>$image</image>\n";
        $xmlContent .= "    <title>Tempo Traveller in $title</title>\n";
        $xmlContent .= "    <url>$url</url>\n";
        $xmlContent .= "    <description>$description</description>\n";
        $xmlContent .= "  </localarea>\n";
    }
} else {
    echo "No data found.";
}

$xmlContent .= '</localareas>';

// Save to local.xml
if (file_put_contents('local.xml', $xmlContent)) {
    echo "<a href='local.xml'>local.xml</a> has been created successfully.";
} else {
    echo "Failed to create local.xml.";
}

$conn->close();
?>
