<?php 
include_once 'sql/connectdb.php';


	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}

	//$strDate = "2008-08-14 13:42:44";
	//echo "ThaiCreate.Com Time now : ".DateThai($strDate);
    function calculateTimeDifference($strDate1, $strDate2) {
        // แปลง string เป็น DateTime
        $date1 = new DateTime($strDate1);
        $date2 = new DateTime($strDate2);
   
        // คำนวณความต่าง
        $interval = $date1->diff($date2);
    
        // แปลงความต่างเป็นชั่วโมงและนาที
        $hours = $interval->days * 24 + $interval->h;  // คำนวณชั่วโมงจาก days และ hours
        $minutes = $interval->i;  // นาที
    
        // ใช้ sprintf เพื่อเติม 0 ข้างหน้า ถ้าชั่วโมงหรือนาทีเป็นหลักเดียว
        $hours = sprintf('%02d', $hours);
        $minutes = sprintf('%02d', $minutes);
    
        return [
            'hours' => $hours,
            'minutes' => $minutes
        ];
    }


$db = new Database();
$connection = $db->connect();
$data = $db->selectAllFromABC();

// แสดงผลข้อมูล
// echo "<pre>";
// print_r($data);
// echo "</pre>";

// ลูปแสดงผลข้อมูล
// foreach ($data as $row) {
//     // สมมุติว่าตาราง abc มีคอลัมน์ชื่อ id และ name
//     echo "ID: " . $row['id'] . "<br>";
//     echo "car_id: " . $row['car_id'] . "<br><br>";
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ระบบลานจอดรถอัจฉริยะ</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>รายงานรวม</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link " href="service.php" >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>รายงานการเข้าใช้บริการ</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="pay.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>รายงานการเงิน</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login2.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    ออกจากระบบ
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->         
              <!-- Begin Page Content -->
              <div class="container-fluid">
                <?php 
                $countdata = count($data);
                ?>
         <!-- DataTales Example -->
         <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">แสดงข้อมูลการเข้าใช้บริการ (<?php echo $countdata;?>)</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>รหัสลูกค้า</th>
                                            <th>ป้ายทะเบียน</th>
                                            <th>เวลาเข้า</th>
                                            <th>เวลาออก</th>
                                            <th>ระยะเวลา</th>
                                            <th>สถานะการชำระเงิน</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $countdata = count($data);
                                    //print_r($data);
                                    if ($countdata > 0) { 
                                        ?><tbody>
                                    
                                        <?php      
                                        // ลูปแสดงผลข้อมูล
                                        foreach ($data as $row) { 
                                            //print_r($row);
                                            ?> <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['plate_text']; ?></td>
                                            <td><?php echo DateThai($row['time_in']); ?></td>
                                            <td><?php echo DateThai($row['time_out']); ?></td>
                                            <?php 
                                            $gettime_time = calculateTimeDifference($row['time_out'],$row['time_in']); 
                                            ?>
                                            <td><?php echo  $gettime_time['hours'].":".$gettime_time['minutes'] ?></td>
                                            <?php 
                                            if ($row['pay_status']){
                                                ?><td>a</td><?php
                                            }else {
                                                ?><td>b</td><?php
                                            }
                                            ?>
                                            </tr>
                                            <?php
                                        // สมมุติว่าตาราง abc มีคอลัมน์ชื่อ id และ name
                                        //echo "ID: " . $row['id'] . "<br>";
                                        // echo "car_id: " . $row['car_id'] . "<br><br>";
                                    }
                                       ?>
                                        </tbody>
                                       <?php

                                    }
                                    ?>
                                 
                                </table>
                            </div>
                        </div>
                        
                    

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>ติดต่อปัญหาแจ้งแอดมินได้เลย</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>


   <!-- Core plugin JavaScript-->
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

 
</body>

</html>