<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar bg-light shadow-sm" style="min-height: 100vh;">

  <ul class="sidebar-nav list-unstyled pt-3" id="sidebar-nav">

    <li class="nav-item mb-2">
      <a class="nav-link text-dark fw-semibold d-flex align-items-center gap-2" href="home.php">
        <i class="bi bi-grid"></i><span>Dashboard</span>
      </a>
    </li>

    <!-- Faculty -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#faculty-nav">
        <i class="bi bi-person-lines-fill"></i><span>Faculty</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="faculty-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li><a href="add-faculty.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Add Faculty</a></li>
        <li><a href="manage-faculty.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Manage Faculty</a></li>
      </ul>
    </li>

    <!-- Student -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#student-nav">
        <i class="bi bi-people"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="student-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li><a href="add-student.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Add Student</a></li>
        <li><a href="manage-student.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Manage Student</a></li>
      </ul>
    </li>

    <!-- Events -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#event-nav">
        <i class="bi bi-calendar-event"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="event-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li><a href="add-event.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Add Events</a></li>
        <li><a href="manage-event.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Manage Events</a></li>
      </ul>
    </li>

    <!-- Gallery -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#gallery-nav">
        <i class="bi bi-images"></i><span>Gallery</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="gallery-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li><a href="add-gallery.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Add Gallery</a></li>
        <li><a href="manage-gallery.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Manage Gallery</a></li>
      </ul>
    </li>

    <!-- Bonafide -->
    <li class="nav-item mb-2">
      <a class="nav-link collapsed text-dark d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#bonafide-nav">
        <i class="bi bi-file-earmark-text"></i><span>Bonafide</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="bonafide-nav" class="nav-content collapse ps-4" data-bs-parent="#sidebar-nav">
        <li><a href="request-bonafide.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Request Bonafide</a></li>
        <li><a href="manageViewRequest-bonafide.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> View Request</a></li>
        <li><a href="generate-bonafide.php" class="text-decoration-none d-block py-1"><i class="bi bi-circle"></i> Download</a></li>
      </ul>
    </li>

  </ul>
</aside>
<!-- End Sidebar -->
