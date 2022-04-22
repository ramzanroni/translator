<?php 
$conn= new mysqli("localhost", "root", "", "metrosoft");
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>