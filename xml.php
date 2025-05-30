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
$xmlContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $place = $row['place'];
        $city = $row['city'];

        // Create slug for URL
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $place . '-' . $city), '-'));
        $url = "https://www.tempotravellerinncr.in/tempo-traveller-in-" . $slug . ".html";

        // Add URL entry to XML
        $xmlContent .= "  <url>\n";
        $xmlContent .= "    <loc>$url</loc>\n";
        $xmlContent .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
        $xmlContent .= "  </url>\n";
    }
} else {
    echo "No data found.";
}

$xmlContent .= '</urlset>';

// Save to localarea_tempo_traveller.xml
if (file_put_contents('localarea_tempo_traveller.xml', $xmlContent)) {
    echo "<a href='localarea_tempo_traveller.xml'>localarea_tempo_traveller.xml</a> has been created successfully.";
} else {
    echo "Failed to create localarea_tempo_traveller.xml.";
}

$conn->close();
?>
