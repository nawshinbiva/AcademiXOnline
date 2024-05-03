function redirectTocngPass() {
  window.location.href = 'changePassword.php';
}
function redirectToeditPro() {
  window.location.href = 'editProfile.php';
}
function redirectToDash() {
  window.location.href = 'tDashboard.php';
}

function fetchImage(){
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', '../controller/getDetails.php?get=pic', true);

  // Set the responseType to 'blob' to handle binary data
  xhttp.responseType = 'blob';

  xhttp.onreadystatechange = function () {
      if (this.readyState == 4) {
          if (this.status == 200) {
              // Assuming you have an <img> element with the id 'img' in your HTML
              let imgElement = document.getElementById('img');
              let blob = this.response;

              // Create an object URL from the blob
              let objectURL = URL.createObjectURL(blob);

              // Set the object URL as the image source
              imgElement.src = objectURL;
          } else {
              console.error('Error: ' + this.status);
          }
      }
  };

  xhttp.send();
}

function showUserProfile(){
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', '../controller/userProfileCtrl.php', true);

  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        // Check if the response is not empty
        if (this.responseText.trim() !== "") {
          try {
            let user = JSON.parse(this.responseText);
            document.getElementById("fname").innerHTML = user['fname'];
            document.getElementById("lname").innerHTML=user['lname'];
            document.getElementById("birthdate").innerHTML=user['birthdate'];
            document.getElementById("gender").innerHTML=user['gender'];
            document.getElementById("city").innerHTML=user['city'];
            document.getElementById("country").innerHTML=user['country'];
            document.getElementById("religion").innerHTML=user['religion'];
            document.getElementById("phone").innerHTML=user['phone'];
            document.getElementById("email").innerHTML=user['email'];
          } catch (e) {
            console.error('Error parsing JSON: ' + e.message);
          }
        } else {
          console.error('Error: Empty JSON response');
        }
      } else {
        console.error('Error: ' + this.status);
      }
    }
  }
}
