
  <?php 
    include("header.php"); 
    include("sidebar.php");
  ?>

  

  <main id="main" class="main">

    <div class="pagetitle text-center">
      <p class="display-5">Welcome admin</p>
      <hr>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      <div class="col-md-12">
          <h3 class="text-center">Manage Event</h3>
          <p class=" text-end">
          <a href="add-event.php" class="btn btn-primary">Add new</a>
          </p>
          <table class="table table-bordered">
            <tr>
              <th>Sr.No.</th>
              <th>Title</th>
              <th>Description</th>              
              <th>Date</th>   
              <th>Cover</th>   
              <th>View/Update</th>
              <th>Delete</th>
            </tr>
            <?php
              include("connection.php");

              $sql = "SELECT * FROM events";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                  echo '
                  <tr>
                    <td>' . $count++ . '</td>
                    <td>' . $row["eventTitle"] . '</td>
                    <td>' . $row["eventDescription"] . '</td>
                    <td>' . $row["eventDate"] . '</td>
                    <td>' . $row["eventCover"] . '</td>
                    <td><a href="#" class="btn btn-warning">Update</a></td>
                    <td>
                      <button class="btn btn-danger" onclick="deleteEvent(' . $row["event_id"] . ')">Delete</button>
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