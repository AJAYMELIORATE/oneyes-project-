// Function to send a message
function sendMessage() {
  var messageInput = document.getElementById("input_msg");
  var message = messageInput.value.trim();

  if (message !== "") {
      // Create an AJAX request to send the message
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "add_message.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // Handle the response here (e.g., display a confirmation message)
              var response = xhr.responseText;
              console.log(response);
              // Clear the message input
              messageInput.value = "";
          }
      };
      xhr.send("message=" + message);
  }
}

// Function to update the chat messages
function updateChat() 
{
  // Fetch chat messages from the server and display them in the chat area
  var msgDiv = document.querySelector(".msg");

  fetch("get_messages.php") // Create get_messages.php to fetch messages from the database
      .then(function (response) {
          return response.text();
      })
      .then(function (data) {
          msgDiv.innerHTML = data;
      });

  // Automatically update the chat every few seconds
  setTimeout(updateChat, 5000); // Adjust the interval as needed
}

// Call the initial chat update
updateChat();
