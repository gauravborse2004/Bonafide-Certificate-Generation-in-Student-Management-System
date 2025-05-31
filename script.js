function notificationForm() {   
   var notificationData = new FormData(document.getElementById("notificationForm"));

   var xhr = new XMLHttpRequest();
   xhr.open("POST", "insertNotification.php", true);
   xhr.onreadystatechange = function () {
       if (xhr.readyState === XMLHttpRequest.DONE) {
           if (xhr.status === 200) {
               document.getElementById("responseNotification").innerHTML = xhr.responseText;
               // selectData();
           } else {
               console.error('Error occurred.');
           }
       }
   };
   xhr.send(notificationData);
}

function deleteNotification(notification_id) {
    var confirmation = confirm("Are you sure you want to delete this notification?");
    if (confirmation) {
      var formData = new FormData();
      formData.append('notification_id', notification_id);
      formData.append('delete_notification', true);
  
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "deleteNotification.php", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Handle response here if needed
            // For example, you can reload the page after deletion
            location.reload();
          } else {
            console.error('Error occurred.');
          }
        }
      };
      xhr.send(formData);
    } else {
      return false;
    }
  }

  function addEventForm() {
    var formData = new FormData(document.getElementById("addEventForm"));
    
    fetch('insertEvent.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("responseEvent").innerHTML = data;
    })
    .catch(error => {
        console.error('Error occurred:', error);
    });
}

function deleteEvent(event_id) {
  var confirmation = confirm("Are you sure you want to delete this event?");
  if (confirmation) {
      var formData = new FormData();
      formData.append('event_id', event_id);
      formData.append('delete_event', true);

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "deleteEvent.php", true);
      xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  // Handle response here if needed
                  // For example, you can reload the page after deletion
                  location.reload();
              } else {
                  console.error('Error occurred.');
              }
          }
      };
      xhr.send(formData);
  } else {
      return false;
  }
}