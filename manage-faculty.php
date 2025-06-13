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

<table class="table table-bordered container mt-5">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Qualification</th>
        <th>totalExperience</th>
        <th>Specialization</th>
        <th>Achievements</th>
        <th>Address</th>
        <th>View</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    
<?php
    include("connection.php");
    $myQuery = "SELECT * FROM facultydata";
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
             
            echo "
            <tr>
                <td>$des $name</td>
                <td>$email</td>
                <td>$contact</td>
                <td>$gender</td>
                <td>$dob</td>
                <td>$qua</td>
                <td>$exp</td>
                <td>$spe</td>
                <td>$ach</td>
                <td>$address</td>
                
                <td>
                    <a href='manageView-faculty.php?myVar=$email'>View</a>
                </td>
                <td>
                    <a href='manageFaculty-edit.php?myVar=$email'>Update</a>
                </td>
                <td>
                    <a href='manageFaculty-delete.php?myVar=$email'>Delete</a>
                </td>
            </tr> 
            ";
        }
        
    }
    else
    {
        echo "Not found";
    }
?>
    </table>

  </main><!-- End #main -->


  <?php
    include("footer.php");
  ?>