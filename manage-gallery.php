<?php 
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";

if ($role == "faculty") {
    include("header_faculty.php");
    include("sidebar_faculty.php");
} elseif ($role == "student") {
    include("header_student.php");
    include("sidebar_student.php");
} else {
    include("header.php");
    include("sidebar.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gallery</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .gallery-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        overflow: hidden;
        transition: transform 0.2s;
        background-color: #fff;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
    }

    .gallery-card img {
        width: 100%;
        height: 250px;
        object-fit: contain;
        background-color: #f9f9f9;
        padding: 10px;
        cursor: pointer;
    }

    .gallery-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-top: 10px;
        margin-bottom: 5px;
    }

    .btn-sm {
        margin-bottom: 10px;
    }

    .modal-img {
        width: 100%;
        max-height: 80vh;
        object-fit: contain;
    }
  </style>
</head>
<body>

<main id="main" class="main">
  <div class="container mt-4">
    <div class="row">
      <?php
        include("connection.php");
        $myQuery = "SELECT * FROM gallery";
        $result = $conn->query($myQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = $row["Title"];
                $photo = $row["Photos"];
                $imgPath = "uploads/gallery/" . $photo;

                echo '
                <div class="col-md-3 mb-4">
                    <div class="gallery-card text-center p-3">
                        <img src="'.$imgPath.'" alt="'.$title.'" onclick="openModal(\''.$imgPath.'\')">
                        <div class="gallery-title">'.$title.'</div>
                        <a href="manageGallery-delete.php?myVar='.$title.'&role='.$role.'" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="text-center">No gallery items found.</p>';
        }
      ?>
    </div>
  </div>
</main>

<!-- Bootstrap Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-white">
      <div class="modal-header">
        <h5 class="modal-title">Full View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" class="modal-img" src="" alt="Full Size">
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to open modal -->
<script>
  function openModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
    myModal.show();
  }
</script>

</body>
</html>

<?php include("footer.php"); ?>
