  <?php 
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
            $myQuery = "SELECT * FROM facultydata where Email='.$myVar.'";
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
                    <div class="col-md-4 p-2">
                        <div class="m-2">
                        <div class="myCard p-3" style="text-align: center;">
                            <img src="uploads/faculty/'.$ph.'" class="img-fluid mb-2" style="height: 250px; width: 250px;" alt="">
                            <h3>'.$name.'</h3>
                            <p>'.$email.'</p>
                            <p>'.$contact.'</p>
                            <p>'.$des.'</p>
                            <p>'.$qua.'</p>
                            <p>'.$exp.'</p>
                            <p>'.$spe.'</p>
                            <p>'.$ach.'</p>
                            <p>'.$address.'</p>
                        </div></div>
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