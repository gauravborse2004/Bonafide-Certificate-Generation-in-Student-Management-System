<?php
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
include("header.php"); 
include("sidebar.php");
include("connection.php");

$f_email= $_GET["myVar"];

$myQuery= "SELECT * FROM facultydata
WHERE Email='".$f_email."'";

$result= $conn->query($myQuery);

if($result->num_rows>0)
{
 while($row= $result-> fetch_assoc())
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
    $photo = $row["Photo"];
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
                
                <form action="manageFaculty-update.php?role=<?php echo urlencode($role); ?>" method="POST" enctype="multipart/form-data">

                    <h3>Fill the Details Below</h3>

                    <input type="text" name="fname" placeholder="Enter Your Fullname" class="form-control mt-2" value="<?php echo $name; ?>">

                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control mt-2" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"  value="<?php echo $email; ?>">

                    <input type="text" name="contact" placeholder="Enter Your contact" class="form-control mt-2"  value="<?php echo $contact; ?>">

                    <div class="form-control mt-2">
                        Gender&nbsp;&nbsp;
                        <input type="radio" name="gender" value="male" <?php if($gender=="Male") echo 'checked="checked"'; ?>>Male&nbsp;&nbsp;
                        <input type="radio" name="gender" value="female" <?php if($gender=="Female") echo 'checked="checked"'; ?>>Female
                    </div>

                    <div class="form-control mt-2">
                        Designation&nbsp;&nbsp;:&nbsp;&nbsp;
                        <select name="designation" class="p-1" placeholder="Select Your Designation">
                            <option value="Head." <?php if($des=="Head") echo 'selected="selected"'; ?>>Head</option>
                            <option value="Prof." <?php if($des=="Prof.") echo 'selected="selected"'; ?>>Professor</option>
                            <option value="Assistant Prof." <?php if($des=="Assistant Prof.") echo 'selected="selected"'; ?>>Assitant Professor</option>
                            <option value="Lecturer" <?php if($des=="Lecturer") echo 'selected="selected"'; ?>>Lecturer</option>
                        </select>
                    </div>

                    <input type="text" name="qualification" placeholder="Enter your Qualification" class="form-control mt-2" value="<?php echo $qua; ?>">  

                    <input type="text" name="experience" placeholder="Enter your Total Experience" class="form-control mt-2" value="<?php echo $exp; ?>">  

                    <input type="text" name="specialization" placeholder="Enter your Specialization" class="form-control mt-2" value="<?php echo $spe; ?>"> 
                    
                    <input type="text" name="achievement" placeholder="Enter your Achievement" class="form-control mt-2" value="<?php echo $ach; ?>">  

                    <input type="text" name="address" placeholder="Enter your Address" class="form-control mt-2"  value="<?php echo $address; ?>">   
                
                    <div class="row">
                        <div class="col-md-6 col-6 mt-4">
                            <input type="submit" class="btn-register" name="submit" value="Submit">
                        </div>

                    </div>
                    
                </form>
            </div>

            <div class="col-md-3"></div>

        </div>
    </div>
</main>
</body>
</html>