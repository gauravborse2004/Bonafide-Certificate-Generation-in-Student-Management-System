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
include("connection.php");

$user = $_SESSION["userLogin"];

$myQuery= "SELECT * FROM studentdata
WHERE Email='".$user."'";

$result= $conn->query($myQuery);

if($result->num_rows>0)
{
 while($row= $result-> fetch_assoc())
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
    $photo = $row["photo"];
 }
}
else{
    echo "Data not found";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <main id="main" class="main">
    
    <div class="container">
        <div class="row mt-4">

            <div class="col-md-3"></div>

            <div class="col-md-6 col-sm-12 p-2 registration">
                <form action="InsertBonafideRequest.php?role=<?php echo urlencode($role); ?>" method="POST" enctype="multipart/form-data">

                    <h3>Fill the Details Below</h3>

                    <input type="number" name="prn" placeholder="Enter Your PRN" class="form-control mt-2" value="<?php echo $prn; ?>" required>

                    <input type="text" name="fname" placeholder="Enter Your Fullname" class="form-control mt-2" value="<?php echo $fullname; ?>">

                    <div class="form-control mt-2">
                        Select Class&nbsp;&nbsp;:&nbsp;&nbsp;
                        <select name="class" class="p-1" placeholder="Select Class">
                            <option value="First Year - A" <?php if($class=="First Year - A") echo 'selected="selected"'; ?>>FE-(A)</option>
                            <option value="First Year - B" <?php if($class=="First Year - B") echo 'selected="selected"'; ?>>FE-(B)</option>
                            <option value="First Year - C" <?php if($class=="First Year - C") echo 'selected="selected"'; ?>>FE-(C)</option>
                            <option value="Second Year" <?php if($class=="Second Year") echo 'selected="selected"'; ?>>SY</option>
                            <option value="Third Year" <?php if($class=="Third Year") echo 'selected="selected"'; ?>>TY</option>
                            <option value="B.Tech" <?php if($class=="B.Tech") echo 'selected="selected"'; ?>>B.Tech</option>
                        </select>
                    </div>

                    <input type="text" name="email" placeholder="Enter Your Email" class="form-control mt-2" value="<?php echo $email; ?>">

                    <div class="form-control mt-2">
                        Enter Your DOB: 
                        <input type="date" name="dob" required>
                    </div>

                    <div class="form-control mt-2">
                        Reason for Bonafide
                         <textarea placeholder="Reason for bonafide" name="reason" rows="5" cols="10" wrap="soft" class="form-control mt-2" required>Type here</textarea>
                    </div>

                    <div class="form-control mt-2">
                        Submit Written Application Here
                        <input type="file" name="fileToUpload" class="form-control mt-2" required>
                    </div>

                    <input type="submit" class="btn btn-success mt-2" name="submit">

                </form>
            </div>

            <div class="col-md-3"></div>

        </div>
    </div>

    </main><!-- End #main -->
</body>
</html>

 <?php
    include("footer.php");
  ?>