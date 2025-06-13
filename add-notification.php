
  <?php 
  $role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
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

    <div class="pagetitle text-center">
      <p class="display-5">Welcome admin</p>
      <hr>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">       
       <div class="col-md-6  bg-white p-5 mx-auto">
          <h3 class="text-center">Add Notifications</h3>
          <div id="responseNotification" class="text-success"></div>
          <!-- <div class="alert alert-success alert-dismissible fade show" role="alert" id="responseNotification">
          
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> -->
          <form id="notificationForm" enctype="multipart/form-data">
              <label for="">Notification Title</label>
              <textarea rows="3" cols="10" wrap="soft" class="form-control" name="notification_title"></textarea>
              <br>
              <label for="">Document (Optional)</label><br>            
              <input type="file" id="file" class="form-control" name="notification_doc">
              <br>
              <label for="">Web link (Optional)</label>
              <input type="text" class="form-control" placeholder="Enter link here" id="link" name="notification_link">
              <br>
              <button type="button" class="btn btn-primary" onclick="notificationForm()">Submit</button>
              <a href="manage-notification.php" class="btn btn-outline-primary">View All</a>
          </form>
       </div>
      </div>
    </section>    
  </main><!-- End #main -->
  

  <?php
    include("footer.php");
  ?>