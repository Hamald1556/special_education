<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #chat-window {
            border: 1px solid #ccc;
            padding: 10px;
            height: 300px;
            overflow-y: scroll;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="admin.php">Admin Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> User
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">User Profile</a>
              <a class="dropdown-item" href="#">Reset Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
</nav>
<br><br>
<div class="container mt-5">
    <div class="card">
        <div class="card-body" id="chat-window"></div>
        <form id="message-form" class="card-footer">
            <div class="input-group">
                <input type="text" id="message-input" class="form-control" placeholder="Type your message...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#message-form').submit(function(event){
            event.preventDefault();
            var messageInput = $('#message-input').val();
            appendMessage('You', messageInput);
            sendMessage(messageInput);
            $('#message-input').val('');
        });

        function appendMessage(sender, message) {
            var chatWindow = $('#chat-window');
            var messageElement = $('<div>').html('<strong>' + sender + ':</strong> ' + message);
            chatWindow.append(messageElement);
            chatWindow.scrollTop(chatWindow.prop("scrollHeight"));
        }

        function sendMessage(message) {
            $.post('bot.php', { message: message }, function(response){
                appendMessage('Bot', response);
            });
        }
    });
</script>

</body>
</html>
