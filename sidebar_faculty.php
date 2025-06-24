<?php $role = "faculty"; ?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar bg-light shadow-sm" style="min-height: 100vh;">

  <ul class="sidebar-nav list-unstyled pt-3" id="sidebar-nav">

    <!-- Dashboard -->
    <li class="nav-item mb-2">
      <a class="nav-link text-dark fw-semibold d-flex align-items-center gap-2" href="home.php?role=<?php echo $role ?>">
        <i class="bi bi-grid"></i><span>Dashboard</span>
      </a>
    </li>

    <!-- Students -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#student-nav">
        <i class="bi bi-people"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="student-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-student.php?role=<?php echo $role ?>" class="text-decoration-none d-block py-1">
            <i class="bi bi-circle"></i> Add Student
          </a>
        </li>
        <li>
          <a href="manage-student.php?role=<?php echo $role ?>" class="text-decoration-none d-block py-1">
            <i class="bi bi-circle"></i> Manage Student
          </a>
        </li>
      </ul>
    </li>

    <!-- Events -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#event-nav">
        <i class="bi bi-calendar-event"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="event-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-event.php?role=<?php echo $role ?>" class="text-decoration-none d-block py-1">
            <i class="bi bi-circle"></i> Add Events
          </a>
        </li>
        <li>
          <a href="manage-event.php?role=<?php echo $role ?>" class="text-decoration-none d-block py-1">
            <i class="bi bi-circle"></i> Manage Events
          </a>
        </li>
      </ul>
    </li>

    <!-- Gallery -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#gallery-nav">
        <i class="bi bi-image"></i><span>Gallery</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="gallery-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li>
          <a href="add-gallery.php?role=<?php echo $role ?>" class="text-decoration-none d-block py-1">
            <i class="bi bi-circle"></i> Add Gallery
          </a>
        </li>
        <li>
          <a href="manage-gallery.php?role=<?php echo $role ?>" class="text-decoration-none d-block py-1">
            <i class="bi bi-circle"></i> Manage Gallery
          </a>
        </li>
      </ul>
    </li>

    <!-- Bonafide -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#bonafide-nav">
        <i class="bi bi-file-earmark-text"></i><span>Bonafide</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="bonafide-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li>
          <a href="manageViewRequest-bonafide.php?role=<?php echo $role ?>" class="text-decoration-none d-block py-1">
            <i class="bi bi-circle"></i> View Request
          </a>
        </li>
      </ul>
    </li>

  </ul>
</aside>
<!-- End Sidebar -->
