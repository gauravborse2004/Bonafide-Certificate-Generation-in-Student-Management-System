
  <?php 
    include("header.php"); 

    if($_GET["role"] == "faculty")
    {
       include("sidebar_faculty.php");
    }
    elseif($_GET["role"] == "student")
    {
       include("sidebar_student.php");
    }
    else
    {
      include("sidebar.php");
    }
  ?>

  

  <main id="main" class="main">

    <!-- <div class="pagetitle text-center">
      <p class="display-5">Welcome admin</p>
      <hr>
    </div>End Page Title -->

    <section class="section dashboard">
      <div class="row">

       <img src="images/image.png" alt="" height="600px">
      </div>
    </section>

  </main><!-- End #main -->


  <?php
    include("footer.php");
  ?>