<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if(isset($_POST['btnView']))
{
    function test()
    {
        $GLOBALS['z'] =  $_POST['StartDate'];
    }

}
else{
    function test()
    {
        $GLOBALS['z'] =  34;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>MEIS Dashboard</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="../files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="../files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="../files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- radial chart.css -->
    <link rel="stylesheet" href="../files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
</head>

<body>
<?php include('../include/nav.php');?>
                    <div class="pcoded-content">
                       
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                    <form method="post" action="dashboard.php" name="filter" style="margin-top:5px;">
                                    <div class="row"> 
                                

                                        <div class="col">
                                            <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														From
													</div>
												</div><input type="date" name="StartDate" placeholder="StartDate" class="input-append date form_datetime form-control ">
											</div>
                                            <!-- <input type="text" name="StartDate" placeholder="StartDate" class="input-append date form_datetime form-control " readonly /> -->
                                        </div>
                                        <div class="col"> 
                                            <div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														To
													</div>
												</div><input type="date" name="EndDate" placeholder="EndDate" class="input-append date form_datetime form-control ">
											</div>
                                            <!-- <input type="text" name="EndDate" placeholder="EndDate" class="input-append date form_datetime form-control " readonly /> -->
                                        </div>
                            
                                        <div class="col" style=" margin-right: 20px; font-weight: bold;">
                                            <input type="submit" name="btnView" value="Show data" class="btn btn-sm btn-primary " style="height: 38px;">
                                        </div>
                                    </div>
                                    
                                </form>
                                        </div>
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                            <?php 
                   include('../config.php');
                   $query=mysqli_query($link,"select * from clients");
                               $num1 = mysqli_num_rows($query);
                                     {?>
                                     <h4 class="text-c-purple"><?php echo htmlentities($num1);?></h4>
                                       <?php }?>
                                                                
                                                                <h6 class="text-muted m-b-0"> Clients</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-bar-chart f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Total clients</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                            <?php 
                   $query=mysqli_query($link,"select  COUNT(uic)  from visits  where aina_ya_hudhurio in ('mpya')and amepima_na_kupewa_majibu = 'hasi' and MONTH(tarehe_ya_hudhurio) = MONTH(CURRENT_DATE())
                   AND YEAR(tarehe_ya_hudhurio) = YEAR(CURRENT_DATE())  GROUP BY  uic" );
                               $num1 = mysqli_num_rows($query);
                                     {?>
                                     <h4 class="text-c-purple"><?php echo htmlentities($num1);?></h4>
                                       <?php }?>
                                                                <h6 class="text-muted m-b-0">PrEP New</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-file-text-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0"> <?php echo date('F, Y'); ?></p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                            <?php 
                                                            //    $query1=mysqli_query($link,"select  COUNT(uic)  from visits  where aina_ya_hudhurio in ('mpya')and amepima_na_kupewa_majibu = 'hasi' and MONTH(tarehe_ya_hudhurio) = MONTH(CURRENT_DATE())
                                                            //    AND YEAR(tarehe_ya_hudhurio) = YEAR(CURRENT_DATE()) GROUP BY  uic");
                                                            //                $num1 = mysqli_num_rows($query1);
                   $query2=mysqli_query($link,"select  COUNT(uic)  from visits  where MONTH(tarehe_ya_hudhurio) = MONTH(CURRENT_DATE()) GROUP BY  uic");
                               $num2 = mysqli_num_rows($query2);
                            //    $total = $num1 + $num2;
                                     {?>
                                     <h4 class="text-c-purple"><?php echo htmlentities($num2);?></h4>
                                       <?php }?>
                                                                <h6 class="text-muted m-b-0">PrEP CT</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                            <i class="fa fa-file-text-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-blue">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0"><?php echo date('F, Y'); ?></p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      
                                            <!-- <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red">145</h4>
                                                                <h6 class="text-muted m-b-0">Target</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                            <i class="fa fa-hand-o-up f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">PrEP New Target</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        
                                            <!-- task, page, download counter  end -->
                                   
                                        </div>
                                        <?php 
                                        
                                        include('clients/index.php');
                                        include('prep_new/index.php');
                                        include('prep_ct/index.php');?>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Jquery -->
    <script type="text/javascript" src="../files/bower_components/jquery/js/jquery.min.js "></script>
    <script type="text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js "></script>
    <script type="text/javascript" src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="../files/assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="../files/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../files/bower_components/modernizr/js/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="../files/assets/js/SmoothScroll.js"></script>
    <script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="../files/bower_components/chart.js/js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="../files/assets/pages/widget/amchart/gauge.min.js"></script>
    <script src="../files/assets/pages/widget/amchart/serial.min.js"></script>
    <script src="../files/assets/pages/widget/amchart/light.min.js"></script>
    <script src="../files/assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- Google map js -->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="../files/assets/pages/google-maps/gmaps.js"></script>

    <!-- menu js -->
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="../files/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="../files/assets/js/script.js "></script>
</body>

</html>