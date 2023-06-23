<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "momiam_here";

// Set ID variable

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $e = $_POST['email'];
    $p = $_POST['phone'];
    $s = $_POST['password'];
    $d = $_POST['date'];
    header('Location: http://localhost/Org/flipx.php');
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
  $sql = "DELETE FROM signup WHERE phone=$p";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
