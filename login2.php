<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>
    <center>
        <div class="col-md-6 col-lg-4 py-3">
            <div class="login-wrap py-5 card-body text-center">
                <div class="img d-flex align-items-center justify-content-center" ><img src="img/smart.jpg" width="300"></div><br><br>
                
                <form action="" class="login-form" method="post">
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-envelope"></span></div>
                        <input type="text" class="form-control" name="email" placeholder="Email" autofocus required="">
                    </div>
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                        <input type="password" name="pwd" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="form-group d-md-flex">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Submit" class="btn form-control btn-primary rounded submit px-3">Sing In</button>
                    </div>
                </form>
                <div class="w-100 text-center mt-4 text">
                    <p class="mb-0">Don't have an account?</p>
                    <a href="register.php">Sign Up</a>
                </div>
            </div>
        </div>
    </center>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

    <?php
if(isset($_POST['Submit'])){ //มีการกำหนดค่าให้ปุ่ม submit  ชื่อของปุ่มต้องตรงกัน
    include("condb.php");
    $sql = "SELECT * FROM `admin` WHERE `a_email`='{$_POST['email']}' AND `a_password`='".md5($_POST['pwd'])."' LIMIT 1 ";  
    $rs = mysqli_query($conn, $sql) or die ("select ไม่ได้");
    $num = mysqli_num_rows($rs); //ไว้นับว่ามีกี่แถวที่กรอกมา
    //var_dump($num); 
    if($num>0){
        $data = mysqli_fetch_array($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_fullname'];
        echo "<script>";
        echo "window.location='index.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Username หรือ Password ไม่ถูกต้อง');";
        echo "</script>";
        exit;
    }
}
?>
</body>

</html>