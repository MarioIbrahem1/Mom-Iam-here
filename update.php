<?php
// تعريف المتغيرات المستخدمة في الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "momiam_here";

// جلب بيانات المستخدم من النموذج باستخدام POST
$e = $_POST['email'];
$p = $_POST['phone'];
$nph = $_POST['newphone'];
$s = $_POST['password'];
$ns = $_POST['newpassword'];
$d = $_POST['date'];


// إنشاء اتصال جديد بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من عدم وجود الرقم الجديد مسبقًا في قاعدة البيانات
$sql_check_phone = "SELECT * FROM signup WHERE phone = '$nph'";
$result_check_phone = $conn->query($sql_check_phone);

if ($result_check_phone->num_rows > 0) {
    // إذا وجد الرقم الجديد مسبقًا في قاعدة البيانات، يتم عرض رسالة خطأ للمستخدم وإعادة تحميل الصفحة
    echo "حط رقم جديد متخلكش ناصح 😒.";
    header("Refresh: 4; url=http://localhost/Org/flipx.php"); // إعادة تحميل الصفحة بعد 4 ثوانٍ
} else {
    // التحقق من صحة الباسورد القديم
    $sql_check_password = "SELECT * FROM signup WHERE phone = '$p' AND password = '$s'";
    $result_check_password = $conn->query($sql_check_password);
    
    if ($result_check_password->num_rows == 0) {
        // إذا كان الباسورد القديم غير صحيح، يتم عرض رسالة خطأ للمستخدم وإعادة تحميل الصفحة
        echo "الباسورد القديم غير صحيح 😔.";
        header("Refresh: 4; url=http://localhost/Org/flipx.php"); // إعادة تحميل الصفحة بعد 4 ثوانٍ
    } else {
        // تحديث بيانات المستخدم في قاعدة البيانات باستخدام الرقم القديم والبيانات الجديدة
        $sql_update = "UPDATE signup SET email='$e', phone='$nph', password='$ns', date='$d' WHERE phone='$p'";
        
        if ($conn->query($sql_update) === TRUE) {
            // إذا تم التحديث بنجاح، يتم عرض رسالة تأكيد للمستخدم وإعادة تحميل الصفحة
            echo "Done ya 3m elnas ❤😉.";
            header("Refresh: 4; url=http://localhost/Org/login.php"); // إعادة تحميل الصفحة بعد 4 ثوانٍ
        } else {
            // إذا حدث خطأ في عملية التحديث، يتم عرض رسالة خطأ للمستخدم وإعادة تحميل الصفحة
            echo "يختااااااااي: " . $conn->error;
            header("Refresh: 4; url=http://localhost/Org/login.php"); // إعادة تحميل الصفحة بعد 4 ثوانٍ
        }
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
