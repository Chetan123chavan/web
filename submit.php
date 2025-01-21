
<?php
// Database credentials
$servername = "localhost";
$username = "root"; // MySQL username
$password = "root123"; // MySQL password
$dbname = "your_database"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$unit_name = $_POST['unit_name'];
$location = $_POST['location'];
$activity = $_POST['activity'];
$email = $_POST['email'];
$contact_details = $_POST['contact_details'];
$plot_size = $_POST['plot_size'];
$shed_size = $_POST['shed_size'];
$area_required = $_POST['area_required'];
$lease_period = $_POST['lease_period'];
$preferred_option = $_POST['preferred_option'];
$budget = $_POST['budget'];
$location_preference = $_POST['location_preference'];
$power_requirement = $_POST['power_requirement'];
$water_requirement = $_POST['water_requirement'];
$waste_generated = $_POST['waste_generated'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_form (name, phone, unit_name, location, activity, email, contact_details, plot_size, shed_size, area_required, lease_period, preferred_option, budget, location_preference, power_requirement, water_requirement, waste_generated) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssssss", $name, $phone, $unit_name, $location, $activity, $email, $contact_details, $plot_size, $shed_size, $area_required, $lease_period, $preferred_option, $budget, $location_preference, $power_requirement, $water_requirement, $waste_generated);

// Execute the statement
if ($stmt->execute()) {
    echo "Data submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
