  <?php
  $role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
    include("header.php"); 
    include("sidebar.php");
  ?>

  <link rel="stylesheet" href="style.css">

  <main id="main" class="main">

 
    <div class="container">
        <div class="row">
               
        <?php
            include("connection.php");
            $myVar = $_GET["myVar"];
            $myQuery = "SELECT * FROM facultydata where Email='".$myVar."'";
            $result = $conn->query($myQuery);
            if( $result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $name = $row["Name"];
                    $email = $row["Email"];
                    $contact = $row["Contact"];
                    $gender = $row["Gender"];
                    $dob = $row["DOB"];
                    $des = $row["Designation"];
                    $qua = $row["Qualification"];
                    $exp = $row["totalExperience"];
                    $spe = $row["Specialization"];
                    $ach = $row["Achievements"];
                    $address = $row["Address"];
                    $ph = $row["Photo"];
                    
                    echo '
                    <div class="container">
                        <div class="m-1">
                            <div class="row p-2">
                                <div class="myCard p-4 col-md-5" style="text-align: center;">
                                    <img src="uploads/faculty/'.$ph.'" class="img-fluid mb-2" style="height: 100%; width: 100%;" alt="">
                                </div>
                                <div class="col-md-7 p-5">
                                    <h4>
                                        <p>Name: '.$des.' '.$name.'</p>
                                        <p>Email: '.$email.'</p>
                                        <p>Contact: '.$contact.'</p>
                                        <p>Gender: '.$gender.'</p>
                                        <p>DOB: '.$dob.'</p>
                                        <p>Qualification: '.$qua.'</p>
                                        <p>Experience: '.$exp.'</p>
                                        <p>Specialization: '.$spe.'</p>
                                        <p>Achievements: '.$ach.'</p>
                                        <p>Address: '.$address.'</p>
                                    </h4>
                                    <div class="row mt-2">  
                                        <div class="btn col-md-6">
                                            <div class="p-2 bg-secondary-light">
                                                <a href="manageFaculty-edit.php?myVar='.$email.'">Update</a>
                                            </div>
                                        </div>
                                        <div class="btn col-md-6">
                                            <div class="p-2 bg-secondary-light">
                                                <a href="manageFaculty-delete.php?myVar='.$email.'">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    ';
                }
                
            }
            else
            {
                echo "Not found";
            }
        ?>
            
        </div>
    </div>
 </main><!-- End #main -->


  <?php
    include("footer.php");
  ?>