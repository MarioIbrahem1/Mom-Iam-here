<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "momiam_here";
 $e = $_POST['email'];
$p = $_POST['phone'];
$s = $_POST['password'];
$d = $_POST['date'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(*) as count FROM signup WHERE phone='$p'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            echo "This number is already registered, please enter another number.";
            header("Refresh: 4; url=http://localhost/Org/login.php"); // إعادة تحميل الصفحة بعد 4 ثانية

        } else {
            $sql = "INSERT INTO signup (email,phone,password,date) VALUES ('$e','$p','$s', '$d')";

            if ($conn->query($sql) === TRUE) {
                echo "Done 🥱❤";
            header("Refresh: 4; url=http://localhost/Org/"); // إعادة تحميل الصفحة بعد 4 ثانية

            } else {
                echo " 😒 لا لا كده غلط بقا ف ادخال البيانات : " . $conn->error;
            }
        }
    } else {
        echo "لاست اوردر مينمم تشارج قفلوا يا زينب مفيش بيانات يا زينب";
    }

    $conn->close();

?>
