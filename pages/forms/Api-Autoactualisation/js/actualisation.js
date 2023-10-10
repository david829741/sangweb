// Code to update the content of a div
function actualiserContenuDiv() {
  // Get the div element
  var divElement = document.getElementById("yourDivId");
  
  // Make an AJAX request to update the content of the div
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "your-api-endpoint", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      var response = xhr.responseText;
      divElement.innerHTML = response;
    }
  };
  xhr.send();
}

// Call the function to update the div content
actualiserContenuDiv();

// Edit starts here
// Function to handle button click in table row
function handleButtonClick(id) {
  // Retrieve the id from the clicked button
  var clickedId = id;
  // Perform further actions with the id
  console.log(clickedId);
}
// Edit ends here