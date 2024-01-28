<?php
// Set the IP address and port
$ip = "127.0.0.1";
$port = 8088;

// Create a TCP/IP socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socket, $ip, $port);

// Start listening for connections
socket_listen($socket);

echo "Server listening on $ip:$port\n";

while (true) {
    // Accept incoming connections
    $clientSocket = socket_accept($socket);
    // Read the input from the client
    $input = socket_read($clientSocket, 1024);

    // Process the input (in this example, just echo it back)
    $output = "Server received: $input";

    // Send the output back to the client
    socket_write($clientSocket, $output, strlen($output));

    // Close the client socket
    socket_close($clientSocket);
}
