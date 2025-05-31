
  <?php 
    include("header.php"); 
    include("sidebar.php");
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="add-student.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <main id="main" class="main">
        <section id="auth1" class="auth1">
            <div class="container">
                <div class="row">

                    <div class="col-md-3"></div>
                    
                    <div class="col-md-6 col-sm-12 p-2">

                        <div class="registration mx-auto p-2">
                            <h1><b>Student Registration Form</b></h1>
                        
                            <form action="insertStudent.php" method="POST"  enctype="multipart/form-data">

                                <input type="number" name="prn" placeholder="Enter Your PRN" class="form-control mt-2" required >

                                <input type="text" name="fname" placeholder="Enter Your Fullname" class="form-control mt-2" reduired>

                                <div class="form-control mt-2">
                                    Class&nbsp;&nbsp;:&nbsp;&nbsp;
                                    <select name="class" class="p-1" placeholder="Select Class">
                                        <option value="First Year - A">FE-(A)</option>
                                        <option value="First Year - B">FE-(B)</option>
                                        <option value="First Year - C">FE-(C)</option>
                                        <option value="Second Year">SY</option>
                                        <option value="Third Year">TY</option>
                                        <option value="B.Tech">B.Tech</option>
                                    </select>
                                </div>

                                <div class="form-control mt-2">
                                    Gender&nbsp;&nbsp;
                                    <input type="radio" name="gender" value="Male">Male&nbsp;&nbsp;
                                    <input type="radio" name="gender" value="Female">Female
                                </div>

                                <div class="form-control mt-2">
                                    DOB&nbsp;&nbsp;:&nbsp;&nbsp;
                                    <input type="date" name="dob">
                                </div>

                                <div class="form-control mt-2">
                                    Category&nbsp;&nbsp;:&nbsp;&nbsp;
                                    <select name="category" class="p-1"  placeholder="Select Class">
                                        <option value="GENERAL/OPEN">OPEN</option>
                                        <option value="OBC">OBC</option>
                                        <option value="SC/ST">SC/ST</option>
                                        <option value="VJNT">VJNT</option>
                                        <option value="NTD">NTD</option>
                                        <option value="OTHER">OTHER</option>
                                    </select>
                                </div>

                                <input type="text" name="contact" placeholder="Enter Your contact" class="form-control mt-2">

                                <input type="email" name="email" placeholder="Enter Your Email" class="form-control mt-2" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">

                                <div class="form-control mt-2">
                                    College Hostel&nbsp;&nbsp;:&nbsp;&nbsp;
                                    <input type="radio" name="hostel" value="Yes">Yes&nbsp;&nbsp;
                                    <input type="radio" name="hostel" value="No">No
                                </div>

                                <div class="form-control mt-2">
                                    College Bus&nbsp;&nbsp;:&nbsp;&nbsp;
                                    <input type="radio" name="bus" value="Yes">Yes&nbsp;&nbsp;
                                    <input type="radio" name="bus" value="No">No
                                </div>

                                <input type="text" name="address" placeholder="Enter your Address" class="form-control mt-2">   
                                
                                <input type="text" name="password" placeholder="Enter your password" class="form-control mt-2">  <!--pattern=".{8,}" title="Eight or more characters"-->

                                <input type="file" name="fileToUpload" class="form-control mt-2">

                                <div class="row">
                                    <div class="col-md-6 col-6 mt-4">
                                        <input type="submit" class="btn-register" name="submit" value="Submit">
                                    </div>

                                    <!-- <div class="col-md-6 col-6 text-end mt-4">
                                        <a href="login.html" class="btn-login">Sign In</a>
                                    </div> -->
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="col-md-3"></div>

                </div>
            </div>
        </section>
    </main>
</body>
</html>


  <?php
    include("footer.php");
  ?>