<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socket Chat</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="chat-container">
        <div id="messages"></div>
        <form action="post">
            <input type="text" id="message-input" placeholder="Type your message...">
            <button type="submit">Send</button>
        </form>
    </div>

    <script>
        const socket = new WebSocket("ws://127.0.0.1:8088");

        socket.onmessage = function (event) {
            const messagesContainer = document.getElementById("messages");
            const message = document.createElement("div");
            message.textContent = event.data;
            messagesContainer.appendChild(message);
        };

        function sendMessage() {
            const inputElement = document.getElementById("message-input");
            const message = inputElement.value;

            socket.send(message);

            inputElement.value = "";
        }
    </script>
</body>

</html>