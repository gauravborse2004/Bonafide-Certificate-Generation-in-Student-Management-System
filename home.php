
  <?php 
  
  $role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
    
    if ($role == "faculty") 
    {
        include("header_faculty.php");
        include("sidebar_faculty.php");
    } 
    elseif ($role == "student") 
    {
        include("header_student.php");
        include("sidebar_student.php");
    } 
    else 
    {
        include("header.php");
        include("sidebar.php");
    }
    
  ?>

  

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">

       <img src="images/image.png" alt="" height="600px">
      </div>
    </section>

  </main><!-- End #main -->


  <?php
    include("footer.php");
  ?>