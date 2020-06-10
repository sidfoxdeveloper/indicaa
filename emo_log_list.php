<?php
include('includes/script_top.php');

if ($permission['view']) { ?>
    <?php
    $pagename = "Logs";
    $listpagename = EMO_LOG_LIST;
    $editpagename = EMO_LOG_LIST;
    $table = TB_USERS_LOGIN_HISTORIES;
    
    /** On Delete Action **/
    if ($delete['id']) {
    }

    $Limit = DEFAULT_LIMIT;
    $qry = "select * from `".$table."` where 1 ";
    if ($swords) {
        $qry .= "and 1 ";
        $paginationback .= "&s=" . $swords;
    }
    /** For Group By **/
    $qry .= "group by `ondatetime` ";
    /** For Ordering **/
    $qry .= " order by `ondatetime` DESC ";

    $page = $_REQUEST['page'];
    $sel = mysqli_query($con, $qry);
    if ($page == "")
        $page = 1;
    $NumberOfResults = mysqli_num_rows($sel);
    $NumberOfPages = ceil($NumberOfResults / $Limit);
    $sel = mysqli_query($con, $qry . " LIMIT " . ($page - 1) * $Limit . ",$Limit");
    $display = mysqli_num_rows($sel);
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <!-- BEGIN HEAD -->
        <head>
             <?php include('includes/head.php'); ?> 
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
                                <h3 class="ks-main-title">List of <?php echo $pagename; ?></h3>
                            </div>
                        </section>
                    </div>
                    <div class="ks-page-content">
                        <div class="ks-page-content-body">
                            <div class="ks-dashboard-tabbed-sidebar">
                                <div class="ks-dashboard-tabbed-sidebar-widgets">                 
                                    <div class="row">
                                       <div class="col-lg-12">
                                            <div class="card ks-card-widget ks-widget-table">
                                                <div class="card-block">
                                                    
                                                    <table class="table ks-payment-table-invoicing">
                                                        <tbody>
                                                            <tr>
                                                                <th>DATE</th>
                                                                <th>USER NAME</th>
                                                                <th>IP ADDRESS</th>
                                                                <th>DATE & TIME</th>
                                                                <th width="5%">Action</th>
                                                            </tr>
                                                            <?php
                                                            if (mysqli_num_rows($sel) > 0) {
                                                                $n = ($page - 1) * $Limit;
                                                                $i = 1;
                                                                while ($row = mysqli_fetch_array($sel)) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php  echo date('d/m/Y', strtotime($row['ondatetime'])); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php 
                                                                            $user = fetchqry( '*', TB_USERS, array('id='=>$row['users_id']) );
                                                                            echo $user['first_name'].' '.$user['last_name'];
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $row['ip']; ?></td>
                                                                        
                                                                        <td><?php echo date('d/m/Y h:i', strtotime($row['ondatetime'])); ?></td>
                                                                        <td class="text-center">
                                                                            <a class="btn btn-default btn-sm" href="javascript:void(0);" >View</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    if ($display <= 0)
                                                        include(DIR_BASEADMIN . DIR_INCLUDES . INC_NORECORD);
                                                    ?>
                                                </div>
                                            </div>
                                            <?php include(DIR_BASEADMIN . DIR_FUNCTIONS . INC_PAGINATION); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('includes/script_bottom.php'); ?>
        </body>
    </html>
    <?php
    /** Check Page Authantication * */
}
else {
    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);
}
?>