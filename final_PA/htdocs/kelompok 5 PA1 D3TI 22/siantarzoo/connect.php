<?php
$mysqli= new mysqli("localhost:3307","root","","siantarzoo");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

?> 