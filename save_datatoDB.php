<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$dbname = "monitors";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

// Read JSON input from ESP8266
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data && isset($data["soil"], $data["seed"], $data["water"], $data["solar"])) {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO sensor_data (soil_moisture, seed_level, water_level, solar_input, timestamp) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("iiii", $data["soil"], $data["seed"], $data["water"], $data["solar"]);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Data inserted successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid or missing data"]);
}

$conn->close();
?>
