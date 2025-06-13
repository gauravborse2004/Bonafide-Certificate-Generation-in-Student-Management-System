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
    
include("connection.php");

$title= $_GET["myVar"];

$myQuery= "SELECT * FROM event
WHERE Title='".$title."'";

$result= $conn->query($myQuery);

if($result->num_rows>0)
{
 while($row= $result-> fetch_assoc())
 {
    $title = $row["Title"];
    $des = $row["Description"];
    $date = $row["Date"];
    $form = $row["Form"];
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
                
                <form action="manageEvent-update.php?role=<?php echo urlencode($role); ?>" method="POST" enctype="multipart/form-data">

                    <h3>Fill the Event Details</h3>

                    <label for="">Add Event Title</label>
                    <input type="text" name="title" class="form-control"  value="<?php echo $title; ?>">
                    <br>

                    <label for="">Event Description</label>
                    <textarea name="desc" rows="5" class="form-control"><?php echo htmlspecialchars($des); ?></textarea>
                    <br>

                    <label for="">Event Date</label>
                    <input name="date" type="date" class="form-control" value="<?php echo $date; ?>">
                    <br>

                    <label for="">Add Event Form Link</label>
                    <input type="text" name="regform" class="form-control" value="<?php echo $form; ?>">
                    <br>

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