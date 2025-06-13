
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

      <div class="col-md-12">
          <h3 class="text-center">Manage Event</h3>
          
          <table class="table table-bordered">
            <tr>
              <th>Sr.No.</th>
              <th>Title</th>
              <th>Description</th>              
              <th>Date</th>   
              <th>Link</th>
              <th>Template</th> 
              <th>Update</th>
              <th>Delete</th>
            </tr>
            <?php
              include("connection.php");

              $sql = "SELECT * FROM event";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                  $title = $row["Title"];
                  $des = $row["Description"];
                  $date = $row["Date"];
                  $form = $row["Form"];
                  echo '
                  <tr>
                    <td>' . $count++ . '</td>
                    <td>'.$title.'</td>
                    <td>'.$des.'</td>
                    <td>'.$date.'</td>
                    <td><a href="'.$form.'">Click Here!</a></td>
                    <td>' . $row["Template"] .'</td>
                    <td><a href="manageEvent-edit.php?myVar='.$title.'&role='.$role.'" class="btn btn-warning">Update</a></td>
                    <td><a href="manageEvent-delete.php?myVar='.$title.'&role='.$role.'" class="btn btn-danger">Delete</a></td>
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