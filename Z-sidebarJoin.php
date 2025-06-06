<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<?php
include("connection.php"); // This must be at the very top of your file, before any output

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
  exit();
}
// Assuming you have the user's ID stored in a session variable
$userId = $_SESSION['user_id']; // Adjust this based on your session variable

// Query to join all three tables and get the user's role
$query = "SELECT 
            COALESCE(a.Role, s.Role, f.Role) AS Role 
          FROM 
            (SELECT '$userId' AS id) AS user
          LEFT JOIN admin a ON user.id = a.id
          LEFT JOIN studentdata s ON user.id = s.id
          LEFT JOIN facultydata f ON user.id = f.id
          LIMIT 1";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if($row["Role"] == "Admin") {
  echo '
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="home.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#table-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="table-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-student.php">
            <i class="bi bi-circle"></i><span>Add Student</span>
          </a>
        </li>
        <li>
          <a href="manage-student.php">
            <i class="bi bi-circle"></i><span>Manage Student</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Faculty</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-faculty.php">
            <i class="bi bi-circle"></i><span>Add faculty</span>
          </a>
        </li>
        <li>
          <a href="manage-faculty.php">
            <i class="bi bi-circle"></i><span>Manage faculty</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-event.php">
            <i class="bi bi-circle"></i><span>Add-events</span>
          </a>
        </li>
        <li>
          <a href="manage-event.php">
            <i class="bi bi-circle"></i><span>Manage-events</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#gallery-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Gallery</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="gallery-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-gallery.php">
            <i class="bi bi-circle"></i><span>Add gallery</span>
          </a>
        </li>
        <li>
          <a href="manage-gallery.php">
            <i class="bi bi-circle"></i><span>Manage gallery</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Notification</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-notification.php">
            <i class="bi bi-circle"></i><span>Add notification</span>
          </a>
        </li>
        <li>
          <a href="manage-notification.php">
            <i class="bi bi-circle"></i><span>Manage notification</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#component-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Bonafide</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="component-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="request-bonafide.php">
            <i class="bi bi-circle"></i><span>Request Bonafide</span>
          </a>
        </li>
        <li>
          <a href="manageViewRequest-bonafide.php">
            <i class="bi bi-circle"></i><span>View Request</span>
          </a>
        </li>
        <li>
          <a href="generate-bonafide.php">
            <i class="bi bi-circle"></i><span>Download</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>';
}
elseif($row["Role"] == "Faculty") {
  echo '
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="home.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#table-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="table-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-student.php">
            <i class="bi bi-circle"></i><span>Add Student</span>
          </a>
        </li>
        <li>
          <a href="manage-student.php">
            <i class="bi bi-circle"></i><span>Manage Student</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-event.php">
            <i class="bi bi-circle"></i><span>Add-events</span>
          </a>
        </li>
        <li>
          <a href="manage-event.php">
            <i class="bi bi-circle"></i><span>Manage-events</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#gallery-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Gallery</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="gallery-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-gallery.php">
            <i class="bi bi-circle"></i><span>Add gallery</span>
          </a>
        </li>
        <li>
          <a href="manage-gallery.php">
            <i class="bi bi-circle"></i><span>Manage gallery</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Notification</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-notification.php">
            <i class="bi bi-circle"></i><span>Add notification</span>
          </a>
        </li>
        <li>
          <a href="manage-notification.php">
            <i class="bi bi-circle"></i><span>Manage notification</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#component-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Bonafide</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="component-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="manageViewRequest-bonafide.php">
            <i class="bi bi-circle"></i><span>View Request</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>';
}
else {
  // Default to student view
  echo '
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="home.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-event.php">
            <i class="bi bi-circle"></i><span>Add-events</span>
          </a>
        </li>
        <li>
          <a href="manage-event.php">
            <i class="bi bi-circle"></i><span>Manage-events</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#gallery-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Gallery</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="gallery-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-gallery.php">
            <i class="bi bi-circle"></i><span>Add gallery</span>
          </a>
        </li>
        <li>
          <a href="manage-gallery.php">
            <i class="bi bi-circle"></i><span>Manage gallery</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Notification</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-notification.php">
            <i class="bi bi-circle"></i><span>Add notification</span>
          </a>
        </li>
        <li>
          <a href="manage-notification.php">
            <i class="bi bi-circle"></i><span>Manage notification</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#component-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Bonafide</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="component-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="request-bonafide.php">
            <i class="bi bi-circle"></i><span>Request Bonafide</span>
          </a>
        </li>
        <li>
          <a href="generate-bonafide.php">
            <i class="bi bi-circle"></i><span>Download</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>';
}
?>

</aside><!-- End Sidebar-->