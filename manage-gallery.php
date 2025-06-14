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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Latest compiled and minified CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Latest compiled JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="style.css">
</head>
<body>
  <main id="main" class="main">
 
    <div class="container">
        <div class="row">
               
        <?php
            include("connection.php");
            $myQuery = "SELECT * FROM gallery";
            $result = $conn->query($myQuery);
            if( $result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $title = $row["Title"];
                    $photo = $row["Photos"];
                    
                    echo '
                    <div class="col-md-4 p-3">
                        <div class="myCard text-center d-flex flex-column align-items-center">
                            <img src="uploads/gallery/'.$photo.'" class="img-fluid" style="height: 85%; width: 100%;" alt="">
                            <h3>'.$title.'</h3>
                            <div class="p-2 bg-secondary-light">
                                <a href="manageGallery-delete.php?myVar='.$title.'&role=' . $role . '" class="btn btn-danger btn-sm">Delete</a>
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
    </main>
</body>
</html>


  <?php
    include("footer.php");
  ?>