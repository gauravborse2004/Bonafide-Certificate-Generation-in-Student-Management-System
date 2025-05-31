
  <?php 
    include("header.php"); 
    include("sidebar.php");
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
                  echo '
                  <tr>
                    <td>' . $count++ . '</td>
                    <td>' . $row["Title"] . '</td>
                    <td>' . $row["Description"] . '</td>
                    <td>' . $row["Date"] . '</td>
                    <td>' . $row["Form"] . '</td>
                    <td>' . $row["Template"] . '</td>
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