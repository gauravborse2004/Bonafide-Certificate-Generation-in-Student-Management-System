<?php 
include("header.php");

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

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-6 mx-auto bg-white p-5">
                <div id="responseEvent" class="text-success"></div>
                <h3 class="text-center">Add Events</h3>
                <form id="addEventForm" action="insertGallery.php?role=<?php echo urlencode($role); ?>" method="POST" enctype="multipart/form-data">

                    <label for="">Add Event Title</label>
                    <input type="text" name="title" class="form-control" required>
                    <br>

                    <label for="">Event Template</label>
                    <input type="file" name="fileToUpload" class="form-control" required>
                    <br>

                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <a href="manage-gallery.php?role=<?php echo urlencode($role); ?>" class="btn btn-outline-primary">View All</a>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include("footer.php"); ?>
