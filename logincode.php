<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "momiam_here";

// Set ID variable

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $p = $_POST['phone'];
    $s = $_POST['password'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
    }

    // sql to check if username and phone number are correct
    $sql = "SELECT * FROM signup WHERE password ='$s' AND phone='$p'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Hello Again 🥱❤";
        header("Refresh: 4; url=http://localhost/Org/login.php");
    } else {
        // login failed
        echo "Invalid username or phone number";
        header("Refresh: 4; url=http://localhost/Org/login.php"); // إعادة تحميل الصفحة بعد 2 ثانية
    }

    $conn->close();

}
?>
