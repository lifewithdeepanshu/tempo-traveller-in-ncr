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
$sql = "SELECT * FROM destination";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start XML structure
    $xml = new SimpleXMLElement('<destinations/>');

    $locations = [
        'Delhi',
        'Ghaziabad',
        'Faridabad',
        'Noida',
        'Gurgaon'
    ];

    while ($row = $result->fetch_assoc()) {
        $id = $row['ID'];
        $destination = htmlspecialchars($row['Destination']);

        foreach ($locations as $from) {
            // Create slug for filenames
            $slugFrom = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $from), '-'));
            $slugTo = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $destination), '-'));
            $filename = "https://www.tempotravellerinncr.in/{$slugFrom}-to-{$slugTo}-tempo-traveller.html";

            // Add destination entry
            $dest = $xml->addChild('destination');
            $dest->addChild('id', $id);
            $dest->addChild('search', "$from-to-destination");
			$dest->addChild('image', 'https://www.tempotravellerinncr.in/assets/images/services/tempo-traveller-in-' . $slugFrom . '.jpg'); // You can update image links later if you want
            $dest->addChild('title', "$from to $destination Tempo Traveller");
            $dest->addChild('description', "Book a comfortable tempo traveller from $from to $destination. Best service guaranteed!"); // or keep blank
            $dest->addChild('url', $filename);
        }
    }

    // Save XML file
    $xmlFile = 'destination.xml';
    if ($xml->asXML($xmlFile)) {
        echo "XML file <a href='destination.xml'>destination.xml</a> created successfully.";
    } else {
        echo "Failed to create XML file.";
    }
} else {
    echo "No data found.";
}

$conn->close();
?>
