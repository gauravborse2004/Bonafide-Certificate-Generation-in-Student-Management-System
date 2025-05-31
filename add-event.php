
  <?php 
    include("header.php"); 
    include("sidebar.php");
  ?>

  

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <div class="col-md-6 mx-auto bg-white p-5">
          <div id="responseEvent" class="text-success"></div>
          <h3 class="text-center">Add Events</h3>
          <form id="addEventForm" action="insertEvent.php" method="POST" enctype="multipart/form-data">

              <label for="">Add Event Title</label>
              <input type="text" name="title" placeholder="" class="form-control">
              <br>

              <label for="">Event Description</label>
              <textarea name="desc" rows="5" cols="10" wrap="soft" class="form-control"> </textarea>
              <br>

              <label for="">Event Date</label>
              <input name="dob" type="date" class="form-control">
              <br>

              <label for="">Add Event Form Link</label>
              <input type="text" name="reg" placeholder="" class="form-control">
              <br>

              <label for="">Event Template</label>
              <input type="file" name="fileToUpload" class="form-control">
              <br>

              <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              
              <a href="manage-event.php" class="btn btn-outline-primary">View All</a>

          </form>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <?php
    include("footer.php");
  ?>