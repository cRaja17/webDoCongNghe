<?php
$host = "127.0.0.1";
$port = 80811;
$socket = socket_create(AF_INET,SOCK_STREAM,0) or die('Not Created');
$result = socket_bind($socket,$host,$port) or die("Not Bind");
$result = socket_listen($socket,3) or die('Not Listen');
$accept = socket_accept($socket) or die('Not accept');
$msg = socket_read($accept,1024);
$msg = trim($msg);
echo $msg;
socket_close($accept,$socket);
?>