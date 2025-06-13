
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
              <th>PRN</th> 
              <th>Name</th>
              <th>Class</th>
              <th>Email</th>           
              <th>DOB</th>   
              <th>Reason</th>
              <th>Application</th> 
              <th>Approved</th>
              <th>Reject</th>
            </tr>
            <?php
              include("connection.php");

              $sql = "SELECT * FROM requestbonafide";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                  echo '
                  <tr>
                    <td>' . $count++ . '</td>
                    <td>' . $row["PRN"] . '</td>
                    <td>' . $row["Name"] . '</td>
                    <td>' . $row["Class"] . '</td>
                    <td>' . $row["Email"] . '</td>
                    <td>' . $row["DOB"] . '</td>
                    <td>' . $row["Reason"] . '</td>
                    <td>' . $row["Photo"] . '</td>
                    ';

                    if($row["Request"]=="Approved")
                    {
                       echo'
                      <td><a href="#"  class="btn btn-success disabled">Approved</a></td>
                      <td><a href="#"  class="btn btn-success disabled">Reject</a></td>
                    ';     
                    }
                    elseif($row["Request"]=="Rejected")
                    {
                       echo'
                      <td><a href="#"  class="btn btn-danger disabled">Approve</a></td>
                      <td><a href="#"  class="btn btn-danger disabled">Rejected</a></td>
                    ';     
                    }
                    else{
                    echo'
                    <td><a href="manageBonafide-update.php?myVar='. $row["Name"] .'" class="btn btn-warning">Approve</a></td>
                    <td><a href="manageBonafide-reject.php?myVar='. $row["Name"] .'" class="btn btn-danger">Reject</a></td>';
                    }

                    echo'
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