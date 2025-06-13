
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
            $myQuery = "SELECT * FROM studentdata  where PRN='".$myVar."'";
            $result = $conn->query($myQuery);
            if( $result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $prn = $row["PRN"];
                    $fullname = $row["fullName"];
                    $class = $row["Class"];
                    $gender = $row["Gender"];
                    $dob = $row["DOB"];
                    $category = $row["Category"];
                    $contact = $row["Contact"];
                    $email = $row["Email"];
                    $ch = $row["collegeHostel"];
                    $bf = $row["busFacility"];
                    $address = $row["Address"];
                    $ph = $row["photo"];
                    
                    echo '
                    <div class="container">
                        <div class="m-1">
                            <div class="row p-2">
                                <div class="myCard p-2 col-md-5" style="text-align: center;">
                                    <img src="uploads/student/'.$ph.'" class="img-fluid mb-2" style="height: 100%; width: 100%;" alt="">
                                </div>
                                <div class="col-md-7 p-5">
                                    <h3>
                                        <p>Name: '.$fullname.'</p>
                                        <p>PRN: '.$prn.'</p>
                                        <p>Class: '.$class.'</p>
                                        <p>Gender: '.$gender.'</p>
                                        <p>DOB: '.$dob.'</p>
                                        <p>Category: '.$category.'</p>
                                        <p>Contact: '.$contact.'</p>
                                        <p>Email: '.$email.'</p>
                                        <p>Address: '.$address.'</p>
                                    </h3>
                                    <div class="row mt-2">  
                                        <div class="btn col-md-6">
                                            <div class="p-2 bg-secondary-light">
                                                <a href="manageStudent-edit.php?myVar='.$prn.'">Update</a>
                                            </div>
                                        </div>
                                        <div class="btn col-md-6">
                                            <div class="p-2 bg-secondary-light">
                                                <a href="manageStudent-delete.php?myVar='.$prn.'">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                    ';
                    break;
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