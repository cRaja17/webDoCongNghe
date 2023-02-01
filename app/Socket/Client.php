<?php
$host = "127.0.0.1";
$port = 80811;
$socket = socket_create(AF_INET,SOCK_STREAM,0) or die('Not Created');
socket_connect($socket,$host,$port) or die('Not connect');
$msg = "Hello Admin";
socket_write($socket,$msg,strlen($msg));