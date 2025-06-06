
  <?php 
    include("header.php"); 
    include("sidebar.php");
  ?>

  <main id="main" class="main">

    <section id="auth1" class="auth1">
        <div class="container">
            <div class="row">

                <div class="col-md-3"></div>
                
                <div class="col-md-6 col-sm-12 p-2">

                    <div class="registration mx-auto p-2 m-2">
                        <h1><b>Faculty Registration Form</b></h1>
                    
                        <form action="insertFaculty.php" method="POST"  enctype="multipart/form-data">

                            <input type="text" name="fname" placeholder="Enter Your Fullname" class="form-control mt-2" required>

                            <input type="email" name="email" placeholder="Enter Your Email" class="form-control mt-2" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">

                            <input type="text" name="contact" placeholder="Enter Your contact" class="form-control mt-2">

                            <div class="form-control mt-2">
                                Gender&nbsp;&nbsp;
                                <input type="radio" name="gender" value="male">Male&nbsp;&nbsp;
                                <input type="radio" name="gender" value="female">Female
                            </div>

                            <div class="form-control mt-2">
                                DOB&nbsp;&nbsp;:&nbsp;&nbsp;
                                <input type="date" name="dob">
                            </div>

                            <div class="form-control mt-2">
                                Designation&nbsp;&nbsp;:&nbsp;&nbsp;
                                <select name="designation" class="p-1" placeholder="Select Your Designation">
                                    <option value="Head.">Head</option>
                                    <option value="Prof.">Professor</option>
                                    <option value="Assistant Prof.">Assitant Professor</option>
                                    <option value="Lecturer">Lecturer</option>
                                </select>
                            </div>

                            <input type="text" name="qualification" placeholder="Enter your Qualification" class="form-control mt-2">  

                            <input type="text" name="experience" placeholder="Enter your Total Experience" class="form-control mt-2">  

                            <input type="text" name="specialization" placeholder="Enter your Specialization" class="form-control mt-2"> 
                            
                            <input type="text" name="achievement" placeholder="Enter your Achievement" class="form-control mt-2">  

                            <input type="text" name="address" placeholder="Enter your Address" class="form-control mt-2">   
                            
                            <input type="text" name="password" placeholder="Enter your password" class="form-control mt-2">  <!--pattern=".{8,}" title="Eight or more characters"-->

                            <input type="file" name="fileToUpload" class="form-control mt-2">

                            <div class="row">
                                <div class="col-md-6 col-6 mt-4">
                                    <input type="submit" class="btn-register" name="submit" value="Submit">
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-md-3"></div>

            </div>
        </div>
    </section>

  </main><!-- End #main -->


  <?php
    include("footer.php");
  ?>