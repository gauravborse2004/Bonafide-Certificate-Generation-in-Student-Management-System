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
    <div class="pagetitle text-center">
      <p class="display-5">Welcome admin</p>
      <hr>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center">Manage Notifications</h3>
      <p class=" text-end">
        <a href="add-notification.php" class="btn btn-primary">Add new</a>
        <p id="errorMessage" class="text-danger"></p>
      </p>
      <table class="table table-bordered">
        <tr>
          <th>Sr.No.</th>
          <th>Title</th>
          <th>Attachment</th>
          <th>Link</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
        <?php
        include("connection.php");

        $sql = "SELECT * FROM notification";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $count = 1;
          while ($row = $result->fetch_assoc()) {
            echo '
            <tr>
              <td>' . $count++ . '</td>
              <td>' . $row["notification_title"] . '</td>
              <td>' . $row["notification_doc"] . '</td>
              <td>' . $row["notification_link"] . '</td>
              <td><a href="#" class="btn btn-warning">Update</a></td>
              <td>
                <button class="btn btn-danger" onclick="deleteNotification(' . $row["notification_id"] . ')">Delete</button>
              </td>
            </tr>
            ';
          }
        } else {
          echo '
          <script type="text/javascript">
            document.getElementById("errorMessage").innerHTML = "No Record";
          </script>
          ';
        }
        ?>
      </table>
    </div>
  </div>
</section>

  </main><!-- End #main -->


  <?php
    include("footer.php");
  ?>