<?php
   include("connection.php");
  
// Prepare SQL statement using parameterized queries
$stmt = $conn->prepare("INSERT INTO events (eventTitle, eventDescription, eventDate, eventCover) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $eventTitle, $eventDescription, $eventDate, $eventCover);

// Sanitize input data
$eventTitle = $_POST['eventTitle'];
$eventDescription = $_POST['eventDescription'];
$eventDate = $_POST['eventDate'];

// Handle file upload separately
$target_dir = "events/"; // Adjust the target directory
$target_file = $target_dir . basename($_FILES["eventCover"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    exit();
}

// Check file size
if ($_FILES["eventCover"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    exit();
}

// Upload file
if (move_uploaded_file($_FILES["eventCover"]["tmp_name"], $target_file)) {
    // File uploaded successfully, proceed with database insertion
    $eventCover = $_FILES['eventCover']['name'];
    if ($stmt->execute()) {
        echo "Event added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

$stmt->close();
$conn->close();   
?>