<?php session_start();
        
?>
<?php
    require'../../../libs/function.php';
    $CustomID = $_GET['id'];
    function info_order($CustomID){
        global $conn;
        connect_db();
        $sql = "SELECT * FROM orders JOIN customer ON orders.CustomID = customer.CustomID WHERE orders.CustomID = '$CustomID'";
            $query = mysqli_query($conn, $sql);
            $result = array();
            if($query) {
                while($row = mysqli_fetch_assoc($query)){
                    $result[] = $row;
                }
            }
        return $result;
    }
    $detail = info_order($CustomID);
    disconnect_db();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Thông tin đơn hàng - Admin</title>
        <link href="../../../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css" media="screen">
            .table td{
                vertical-align: middle;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Bảng Điều Khiển</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="../../index.php">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Trang Chủ</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bảng Điều Khiển
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div> -->
                                <!-- </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                            <a class="nav-link" href="orders.php">
                                <div class="sb-nav-link-icon" style="display: flex">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 4h14v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm7-2.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z"/>
                                    </svg>
                                </div>
                               Orders
                            </a>
                        </div> -->
                    <!-- </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Đăng nhập bởi:</div>  
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thông Tin Đơn Hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thông tin đơn hàng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Danh sách đơn hàng
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <th>Khách Hàng</th>
                                            <th>Số ĐT</th>
                                            <th>Địa Chỉ</th>
                                            <th>Ghi Chú</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày Đặt</th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($detail as $data) {?>
                                            <td><?php echo $data['FullName']; ?></td>
                                            <td>0<?php echo $data['PhoneNumber']; ?></td>
                                            <td><?php echo $data['Address']; ?></td>
                                            <td><?php echo $data['NoteCart']; ?></td>
                                            <td><?php if($data['Status']==0){ echo "<div class='text-danger'>Chưa giao hàng</div>";}else echo "<div class='text-success'>Đã giao hàng</div>"; ?></td>
                                            <td><?php echo $data['CreateTime']; ?></td>
                                        </tr><?php break; }?>
                                    </table>
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sản Phẩm</th>
                                                <th>Hình Ảnh</th>
                                                <th>Giá Niêm Yết</th>
                                                <th>Giá Giảm</th>
                                                <th>Màu Sắc</th>
                                                <th>Số Lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($detail as $data) {?>
                                                <td><?php echo $data['Product']; ?></td>
                                                <td><img src="../../../<?php echo $data['Image']; ?>" height=100></td>
                                                <td><?php echo number_format($data['PriceUnit']); ?>đ</td>
                                                <td><?php echo number_format($data['PricePromote']); ?>đ</td>
                                                <td><?php echo $data['Color'] ?></td>
                                                <td><?php echo $data['Quantity']; ?></td>
                                            </tr>
                                                <?php } ?>
                                            <tr>
                                                <th colspan="5" style="text-align: right;">Ngày Đặt Hàng : </th>
                                                <td class="text-success"><?php echo $data['EstimatedDeliveryTime']; ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="5" style="text-align: right;">Tổng Giá : </th>
                                                <td class="text-danger"><?php echo number_format($data['TotalPay']); ?>đ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($data['Status'] == 0){ ?>
                                <div class="form_confirm">
                                    <form action="delivery_confirm.php" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="CustomID" value="<?php echo $data['CustomID']; ?>">
                                        <button type="submit"class="btn btn-success">Xác nhận giao hàng</button> 
                                    </form>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Phát triển bởi &copy; Nguyễn Hữu Khang CNTT HG18V7A2 </div>
                            <div>
                                <a href="#">Chính sách riêng tư</a>
                                &middot;
                                <a href="#">Điều kiển &amp; Phát triển</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
