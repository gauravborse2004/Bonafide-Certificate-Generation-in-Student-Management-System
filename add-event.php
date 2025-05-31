
  <?php 
    include("header.php"); 
    include("sidebar.php");
  ?>

  

  <main id="main" class="main">

    <div class="pagetitle text-center">
      <p class="display-5">Welcome admin</p>
      <hr>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-md-6 mx-auto bg-white p-5">
          <div id="responseEvent" class="text-success"></div>
          <h3 class="text-center">Add Events</h3>
          <form id="addEventForm" enctype="multipart/form-data">
              <label for="">Add Event Title</label>
              <input type="text" name="eventTitle" placeholder="" class="form-control">
              <br>
              <label for="">Event Description</label>
              <textarea name="eventDescription" rows="10" cols="10" wrap="soft" class="form-control"> </textarea>
              <br>
              <label for="">Event Date</label>
              <input name="eventDate" type="date" class="form-control">
              <br>
              <label for="">Cover Image</label>
              <input type="file" name="eventCover" class="form-control">
              <br>
              
              <button type="button" class="btn btn-primary" onclick="addEventForm()">Submit</button>
              <a href="manage-event.php" class="btn btn-outline-primary">View All</a>
          </form>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <?php
    include("footer.php");
  ?>