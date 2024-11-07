<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Data</title>
</head>
<body>
    <h1>Parking Data</h1>

    <?php
    // ข้อมูลการเชื่อมต่อฐานข้อมูล
    $host = 'localhost';
    $db = 'parking_db';
    $user = 'root';  // เปลี่ยนให้ตรงกับชื่อผู้ใช้ฐานข้อมูลของคุณ
    $pass = '12345678';      // รหัสผ่านของฐานข้อมูล (ถ้ามี)

    try {
        // สร้างการเชื่อมต่อ PDO
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        // ตั้งค่า PDO ให้แสดงข้อผิดพลาดเป็นแบบ exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // คำสั่ง SQL
        $sql = "SELECT * FROM parking_data";
        // เตรียม statement
        $stmt = $pdo->prepare($sql);
        // Execute คำสั่ง SQL
        $stmt->execute();

        // ดึงข้อมูลออกมาแสดง
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Car Number</th><th>Entry Time</th><th>Exit Time</th></tr>";

        // แสดงผลลัพธ์ที่ได้จากการ query
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['car_number'] . "</td>";
            echo "<td>" . $row['entry_time'] . "</td>";
            echo "<td>" . $row['exit_time'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

    } catch (PDOException $e) {
        // แสดงข้อผิดพลาดในกรณีที่ไม่สามารถเชื่อมต่อฐานข้อมูลได้
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

</body>
</html>
