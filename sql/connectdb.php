<?php 
class Database {
    private $host = 'localhost';
    private $db_name = 'data_license';
    private $username = 'root';
    private $password = '12345678';
    private $conn;

    // สร้างฟังก์ชั่นสำหรับเชื่อมต่อฐานข้อมูล
    public function connect() {
        $this->conn = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }

    // ฟังก์ชัน select ข้อมูลจากตาราง abc
    public function selectAllFromABC() { 
        $plate_text = "12345";
        $sql = "SELECT * FROM `license_plates`";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bindParam(':car_id', $car_id, PDO::PARAM_STR);  // ผูกค่า car_id ให้กับ parameter :car_id
        $stmt->execute();

// ดึงข้อมูลทั้งหมดออกมา
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $result;
    }
}
?>