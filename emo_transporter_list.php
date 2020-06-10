<?php
include('includes/script_top.php');

if ($permission['view']) { ?>
    <?php
    $pagename = "Transporter";
    $listpagename = EMO_TRANSPORTER_LIST;
    $editpagename = EMO_TRANSPORTER_EDIT;
    $table = TB_TRANSPORTER;
    
    /** On Delete Action **/
    if ($delete['id']) {     
    }

    $Limit = DEFAULT_LIMIT;
    $qry = "select p.* from " . $table . " p where 1 ";
    if ($swords) {
        $qry .= "and 1 ";
        $paginationback .= "&s=" . $swords;
    }
    /** For Group By **/
    $qry .= "group by p.id ";
    /** For Ordering **/
    $qry .= " order by p.id DESC ";

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
                                            <a href="<?php echo URL_BASEADMIN . $editpagename; ?>" class="btn btn-success btn-sm float-right" title="Add">Add</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-12">
                                            <div class="card ks-card-widget ks-widget-table">
                                                <div class="card-block">
                                                    
                                                    <table class="table ks-payment-table-invoicing">
                                                        <tbody>
                                                            <tr>
                                                                <th>DATE</th>
                                                                <th>TRANSPORTER NAME</th>
                                                                <th width="5%">STATUS</th>
                                                                <th>COUNTRY NAME</th>
                                                                <th width="5%">Action</th>
                                                            </tr>
                                                            <?php
                                                            if (mysqli_num_rows($sel) > 0) {
                                                                $n = ($page - 1) * $Limit;
                                                                $i = 1;
                                                                while ($row = mysqli_fetch_array($sel)) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php  echo date('d/m/Y', strtotime($row['created_at'])); ?>
                                                                        </td>
                                                                        <td><?php echo $row['name']; ?></td>
                                                                        <td>
                                                                        <?php 
                                                                            $status = $row['status'];
                                                                            if($status == 'unverified'):    
                                                                                echo '<button class="btn btn-danger btn-sm col-sm-12" >Not verified</button>';
                                                                            elseif($status == 'verified'):        
                                                                                echo '<button class="btn btn-success btn-sm col-sm-12" >Verified</button>';
                                                                            endif;
                                                                        ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php 
                                                                            $country = fetchqry( 'name', TB_COUNTRIES, array('id='=>$row['country_id']) );
                                                                            echo $country['name'];
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?php if($permission['edit']) { ?><a href="<?php echo URL_BASEADMIN . $editpagename . $paginationback . '&id=' . $row['id'] . '&page=' . $page; ?>" class="btn btn-primary btn-sm" title="Edit">Edit</a><?php } ?>
                                                                            <?php if($permission['del']) { ?><a class="btn btn-danger btn-sm" href="javascript:" onclick="return deletesure('<?php echo $row['id'];?>', '<?php echo $table; ?>', '');">Delete</a><?php } ?>
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