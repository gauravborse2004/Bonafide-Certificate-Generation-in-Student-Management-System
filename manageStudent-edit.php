<?php
include("header.php"); 
include("sidebar.php");
include("connection.php");

$s_prn= $_GET["myVar"];

$myQuery= "SELECT * FROM studentdata
WHERE PRN='".$s_prn."'";

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
                <form action="manageStudent-update.php" method="POST" enctype="multipart/form-data">

                    <h3>Fill the Details Below</h3>

                    <input type="number" name="prn" placeholder="Enter Your PRN" class="form-control mt-2" value="<?php echo $prn; ?>">

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

                    <div class="form-control mt-2">
                        Gender&nbsp;&nbsp;
                        <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo 'checked="checked"'; ?>>Male&nbsp;&nbsp;
                        <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo 'checked="checked"'; ?>>Female
                    </div>

                    <div class="form-control mt-2">
                        Select Category&nbsp;&nbsp;:&nbsp;&nbsp;
                        <select name="category" class="p-1"  placeholder="Select Class">
                            <option value="GENERAL/OPEN" <?php if($category=="GENERAL/OPEN") echo 'selected="selected"'; ?>>GENERAL/OPEN</option>
                            <option value="OBC" <?php if($category=="OBC") echo 'selected="selected"'; ?>>OBC</option>
                            <option value="SC/ST" <?php if($category=="SC/ST") echo 'selected="selected"'; ?>>SC/ST</option>
                            <option value="VJNT" <?php if($category=="VJNT") echo 'selected="selected"'; ?>>VJNT</option>
                            <option value="NTD" <?php if($category=="NTD") echo 'selected="selected"'; ?>>NTD</option>
                            <option value="OTHER" <?php if($category=="OTHER") echo 'selected="selected"'; ?>>OTHER</option>
                        </select>
                    </div>

                    <input type="text" name="contact" placeholder="Enter Your contact" class="form-control mt-2" value="<?php echo $contact; ?>">

                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control mt-2" value="<?php echo $email; ?>">

                    <div class="form-control mt-2">
                        College Hostel&nbsp;&nbsp;:&nbsp;&nbsp;
                        <input type="radio" name="hostel" value="Yes" <?php if($ch=="Yes") echo 'checked="checked"'; ?>>Yes&nbsp;&nbsp;
                        <input type="radio" name="hostel" value="No" <?php if($ch=="No") echo 'checked="checked"'; ?>>No
                    </div>

                    <div class="form-control mt-2">
                        College Bus&nbsp;&nbsp;:&nbsp;&nbsp;
                        <input type="radio" name="bus" value="Yes" <?php if($bf=="Yes") echo 'checked="checked"'; ?>>Yes&nbsp;&nbsp;
                        <input type="radio" name="bus" value="No" <?php if($bf=="No") echo 'checked="checked"'; ?>>No
                    </div>

                    <input type="text" name="address" placeholder="Enter your Address" class="form-control mt-2" value="<?php echo $address; ?>">   

                    <!-- <input type="file" name="fileToUpload" class="form-control mt-2" value="<?php echo $photo; ?>"> -->

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