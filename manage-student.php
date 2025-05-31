 <?php 
    include("header.php"); 
    include("sidebar.php");
  ?>

<body>

  <main id="main" class="main">

<table class="table table-bordered container mt-5">
    <tr>
        <th>PRN</th>
        <th>FullName</th>
        <th>Class</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Category</th>
        <th>Contact</th>
        <th>Email</th>
        <th>CollegeHostel</th>
        <th>BusFacility</th>
        <th>Address</th>
        <th>View</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    
<?php
    include("connection.php");
    $myQuery = "SELECT * FROM studentdata";
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
             
            echo "
            <tr>
                <td>$prn</td>
                <td>$fullname</td>
                <td>$class</td>
                <td>$gender</td>
                <td>$dob</td>
                <td>$category</td>
                <td>$contact</td>
                <td>$email</td>
                <td>$ch</td>
                <td>$bf</td>
                <td>$address</td>

                <td>
                    <a href='manageView-student.php?myVar=$prn'>View</a>
                </td>
                
                <td>
                    <a href='manageStudent-edit.php?myVar=$prn'>Update</a>
                </td>
                <td>
                    <a href='manageStudent-delete.php?myVar=$prn'>Delete</a>
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
</main>
</body>


 <?php
    include("footer.php");
?>