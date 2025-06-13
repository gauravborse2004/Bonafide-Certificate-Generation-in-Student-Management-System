<?php
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
if (isset($_POST['delete_notification'])) {
    include("connection.php");

    // Check if notification_id is set and is numeric
    if(isset($_POST['notification_id']) && is_numeric($_POST['notification_id'])) {
        $notification_id = $_POST["notification_id"];

        // Prepare a delete statement
        $sql = "DELETE FROM notification WHERE notification_id = ?";

        // Prepare the statement
        if($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param("i", $notification_id_param);

            // Set parameters
            $notification_id_param = $notification_id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "Invalid notification ID.";
    }
}
?>