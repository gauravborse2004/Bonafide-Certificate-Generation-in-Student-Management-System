<!-- ======= Sidebar ======= -->
<?php
$role = "student";
?>

<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="home.php?role=<?php echo $role ?>">
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
          <a href="add-event.php?role=<?php echo $role ?>">
            <i class="bi bi-circle"></i><span>Add-events</span>
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
          <a href="add-gallery.php?role=<?php echo $role ?>">
            <i class="bi bi-circle"></i><span>Add gallery</span>
          </a>
        </li>
        <li>
          <a href="manage-gallery.php?role=<?php echo $role ?>">
            <i class="bi bi-circle"></i><span>Manage gallery</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- <li class="nav-item">
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
    </li> -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#component-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Bonafide</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="component-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="request-bonafide.php?role=<?php echo $role ?>">
            <i class="bi bi-circle"></i><span>Request Bonafide</span>
          </a>
        </li>
        <li>
          <a href="generate-bonafide.php?role=<?php echo $role ?>">
            <i class="bi bi-circle"></i><span>Download</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside><!-- End Sidebar-->