<?php
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
include("connection.php");

// Check if delete_event is set
if (isset($_POST['delete_event'])) {
    // Check if event_id is set and is numeric
    if (isset($_POST['event_id']) && is_numeric($_POST['event_id'])) {
        $event_id = $_POST["event_id"];

        // Prepare a delete statement
        $sql = "DELETE FROM events WHERE event_id = ?";

        // Prepare the statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param("i", $event_id_param);

            // Set parameters
            $event_id_param = $event_id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo "Event deleted successfully.";
            } else {
                echo "Error deleting event: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Invalid event ID.";
    }
} else {
    echo "Delete event flag not set.";
}

// Close connection
$conn->close();
?>