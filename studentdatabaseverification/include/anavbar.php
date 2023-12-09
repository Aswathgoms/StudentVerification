<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Student Database Verification</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="student.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Student</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Actions:</h6>
                        <a class="collapse-item" href="studenttable.php">Student Table</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Officer</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Actions:</h6>
                        <a class="collapse-item" href="aofficer.php">Officer Table</a>
                    </div>
                </div>
            </li>

            
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
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
<?php
   /* if(isset($_REQUEST['eview'])){
        $eid=test_input($_GET["empid"]);
        $stmt=$conn->prepare("SELECT emp_id FROM employee_details WHERE emp_id='$eid' LIMIT 1");
        $stmt->execute();
        $empid=$stmt->fetch();
        if($empid){
            $_SESSION['eid']=$empid['emp_id'];
            echo "<script>window.location.href='viewemployee.php'</script>";
        }
        else{
            $_SESSION['message']="<div class='alert alert-danger alert-dismissible' role='alert'>
            Invalid Employee Id!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";

        }
    
    }*/
    if(isset($_REQUEST['lcancel'])){
        $orderid=test_input($_GET["orderid"]);
        $stmt=$conn->prepare("SELECT order_id FROM booking WHERE order_id='$orderid' LIMIT 1");
        $stmt->execute();
        $torderid=$stmt->fetch();
        if($torderid){
        $stmt=$conn->prepare("SELECT booking.delivery_status as d_status FROM booking WHERE booking.order_id='$orderid'");
        $stmt->execute();
        $dstatus=$stmt->fetch();
        if($dstatus['d_status']!="delivered"){
          $stmt=$conn->prepare("SELECT payment.payment_status as p_status FROM payment WHERE payment.order_id='$orderid'");
        $stmt->execute();
        $pstatus=$stmt->fetch();
          if($pstatus!="paid")
          {
            $stmt=$conn->prepare("SET FOREIGN_KEY_CHECKS = 0;");
            $stmt->execute();
            $stmt=$conn->prepare("DELETE FROM load_vehicle_rent WHERE order_id='$orderid';");
            $stmt->execute();
            $stmt=$conn->prepare("SET FOREIGN_KEY_CHECKS = 0;");
            $stmt->execute();
            $stmt=$conn->prepare("DELETE FROM payment WHERE order_id='$orderid';");
            $stmt->execute();
            $stmt=$conn->prepare("SET FOREIGN_KEY_CHECKS = 0;");
            $stmt->execute();
            $stmt=$conn->prepare("DELETE FROM booking WHERE order_id='$orderid';");
            $stmt->execute();
            $stmt=$conn->prepare("SET FOREIGN_KEY_CHECKS = 1;");
            $stmt->execute();
            $stmt=$conn->prepare("SET FOREIGN_KEY_CHECKS = 1;");
            $stmt->execute();
            $stmt=$conn->prepare("SET FOREIGN_KEY_CHECKS = 1;");
            $stmt->execute();
            $_SESSION['message']="<div class='alert alert-warning alert-dismissible' role='alert'>
            Successfully order canceled!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          }
          else{
            $_SESSION['message']="<div class='alert alert-warning alert-dismissible' role='alert'>
            Confirmed  Order!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          }
        }
    }
    else{
        $_SESSION['message']="<div class='alert alert-danger alert-dismissible' role='alert'>
        Invalid Order Id!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    }
?>
