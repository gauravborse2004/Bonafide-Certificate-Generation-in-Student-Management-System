
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
              <th>Name</th>
              <th>Class</th>              
              <th>DOB</th>   
              <th>Reason</th>
              <th>Application</th> 
              <th>Approved</th>
              <th>Reject</th>
            </tr>
            <?php
              include("connection.php");

              $sql = "SELECT * FROM requestBonafide";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                  echo '
                  <tr>
                    <td>' . $count++ . '</td>
                    <td>' . $row["Name"] . '</td>
                    <td>' . $row["Class"] . '</td>
                    <td>' . $row["DOB"] . '</td>
                    <td>' . $row["Reason"] . '</td>
                    <td>' . $row["Photo"] . '</td>
                    <td><a href="#" class="btn btn-warning">Approve</a></td>
                    <td><a href="#" class="btn btn-danger">Reject</a></td>
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