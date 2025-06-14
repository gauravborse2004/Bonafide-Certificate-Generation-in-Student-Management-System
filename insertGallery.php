<?php
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
include("connection.php");

if (isset($_POST["submit"])) {
    $target_dir = "uploads/gallery/";
    $uniqueName = uniqid() . "_" . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $uniqueName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 5000000) { // 500 KB limit
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $photo = $uniqueName;
            $title = $_POST["title"];

            $myQuery = $conn->prepare("INSERT INTO gallery (Title, Photos) VALUES (?, ?)");
            $myQuery->bind_param("ss", $title, $photo);

            if ($myQuery->execute()) {
                echo "
                <script>
                    alert('Gallery/Photo Added Successfully');
                    window.location.href='manage-gallery.php?role=" . urlencode($role) . "';
                </script>";
            } else {
                echo "
                <script>
                    alert('Something went wrong');
                    window.location.href='add-gallery.php?role=" . urlencode($role) . "';
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Error uploading file.');
                window.location.href='add-gallery.php?role=" . urlencode($role) . "';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Please fill the form properly.');
            window.location.href='add-gallery.php?role=" . urlencode($role) . "';
        </script>";
    }
}
?>
