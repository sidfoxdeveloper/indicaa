<?php 
    include('includes/script_top.php');
    
    $listpagename = EMO_HOME.'#';
    $table = TB_CONTAINERS;

    $containerLoadedYesterday = $containerLoadedThisMonth = $containerUnderLoading = 0;
    $yesterday = date('Y-m-d', strtotime("-1 days"));
    $lastMonth = date('Y-m-d', strtotime("-1 month"));
    
    $qry = "select `id` FROM `".$table."` WHERE `created_at` > '".$yesterday."' ";
    $res = mysqli_query($con, $qry);
    $containerLoadedYesterday = mysqli_num_rows($res);
    
    $qry = "select `id` FROM `".$table."` WHERE `created_at` > '".$lastMonth."' ";
    $res = mysqli_query($con, $qry);
    $containerLoadedThisMonth = mysqli_num_rows($res);
    
    $qryUnder = "select `id` FROM `".$table."` WHERE `status`='verified_by_country_manager' ";
    $qryRes = mysqli_query($con, $qryUnder);
    $containerUnderLoading = mysqli_num_rows($qryRes);
    
?>
<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <?php include('includes/head.php'); ?>    
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/fonts/kosmo/styles.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/fonts/weather/css/weather-icons.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/c3js/c3.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/noty/noty.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/widgets/payment.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/widgets/panels.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/dashboard/tabbed-sidebar.min.css">
    </head>
    <body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> 
        <!-- remove ks-page-header-fixed to unfix header -->
        <?php include('includes/header.php'); ?>
        <div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs">
            <?php include('includes/sidebar.php'); ?>  
            <div class="ks-column ks-page">
                <div class="ks-page-header">
                    <section class="ks-title-and-subtitle">
                        <div class="ks-title-block">
                            <h3 class="ks-main-title">EMO Admin Dashboard</h3>
                        </div>
                    </section>
                </div>
                <div class="ks-page-content">
                    <div class="ks-page-content-body">
                        <div class="ks-dashboard-tabbed-sidebar">
                            <!-- START: ks-dashboard-tabbed -->    
                            <div class="ks-dashboard-tabbed-sidebar-widgets">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <div class="card-block">

                                                <div class="row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="box-div">
                                                            <h4>Containers loaded yesterday</h4>
                                                            <p style="padding-bottom:35px;"><strong class="btn btn-primary btn-sm"><?php echo $containerLoadedYesterday; ?></strong></p>
                                                            <a href="<?php echo URL_BASEADMIN.$listpagename; ?>">Containers</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">                                                            
                                                        <div class="box-div">
                                                            <h4>Containers loaded this month</h4>
                                                            <p style="padding-bottom:35px;"><strong class="btn btn-primary btn-sm"><?php echo $containerLoadedThisMonth; ?></strong></p>
                                                            <a href="<?php echo URL_BASEADMIN.$listpagename; ?>">Containers</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">                          
                                                        <div class="box-div">
                                                            <h4>Containers assigned</h4>
                                                            <p style="padding-bottom:35px;"><strong class="btn btn-primary btn-sm"><?php echo $containerUnderLoading; ?></strong></p>
                                                            <a href="<?php echo URL_BASEADMIN.$listpagename; ?>">Containers</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END: ks-dashboard-tabbed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include('includes/script_bottom.php'); ?>
        <script src="<?php echo URL_BASEADMIN; ?>libs/d3/d3.min.js"></script>
        <script src="<?php echo URL_BASEADMIN; ?>libs/c3js/c3.min.js"></script>
        <script src="<?php echo URL_BASEADMIN; ?>libs/noty/noty.min.js"></script>
        <script src="<?php echo URL_BASEADMIN; ?>libs/maplace/maplace.min.js"></script>
       
    </body>
</html>