<?php
include('includes/script_top.php');

if ($permission['view']) {
   
    $pagename = "Exchange Rate";
    $listpagename = SA_EXCHANGE_RATE_LIST;
    $editpagename = SA_EXCHANGE_RATE_EDIT;
    $table = TB_EXCHANGE_RATES;
    
    /** On Delete Action **/
    if ($delete['id']) {
         //Unlink image       
        $data = fetchqry("*", $table, array("id="=>$delete['id']));
    }

    $Limit = DEFAULT_LIMIT;
    $qry = "select c.* from " . $table . " as c ";
    $qry .= " where 1 ";
    
    /** For Group By **/
    $qry .= " group by c.id ";

    /** For Ordering **/
    $qry .= " order by c.id DESC ";

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
            
            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/prism/prism.css"> <!-- original -->
            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/flatpickr/flatpickr.min.css"> <!-- original -->
            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/libs/flatpickr/flatpickr.min.css"> <!-- customization -->
            <!--  jQuery -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

            <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
            <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

            <!-- Bootstrap Date-Picker Plugin -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>  
            
            <style>
                body.ks-page-header-fixed .ks-page-content .ks-page-content-body{ padding-top:0px !important;  }
            </style>
            
        </head>
        <body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> 
            <!-- remove ks-page-header-fixed to unfix header -->
            <?php include('includes/header.php'); ?>
            <div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs"> 
                <?php include('includes/sidebar.php'); ?>  
                <div class="ks-column ks-page">
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
                                                                <th>Date</th>
                                                                <th>BASE CURRENCY[AED]</th>
                                                                <th>OTHER CURRENCY</th>
                                                                <th>COUNTRY</th>
                                                                <th width="5%">Action</th>
                                                            </tr>
                                                            <?php
                                                            if (mysqli_num_rows($sel) > 0) {
                                                                $n = ($page - 1) * $Limit;
                                                                while ($row = mysqli_fetch_assoc($sel)) { ?>
                                                                    <tr>
                                                                        <td><?php echo date( 'Y/m/d', strtotime($row['created_at']) ); ?></td>
                                                                        <td>
                                                                            <?php 
                                                                            $b_cur = fetchqry( '*', TB_CURRENCY, array('id='=>$row['base_currency_id']) );
                                                                            echo $b_cur['name'].'('.$b_cur['symbol'].')';
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            $tmp = fetchqry( '*', TB_CURRENCY, array('id='=>$row['other_currency_id']) );
                                                                            $oc = $tmp['symbol'];
                                                                            echo $row['other_currency_price'].'('.$oc.')';
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            $srow = fetchqry('*', TB_COUNTRIES, array('id='=>$row['country_id']) );
                                                                            echo $srow['name'];
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?php if($permission['edit']) { ?><a href="<?php echo URL_BASEADMIN . $editpagename . $paginationback . '&id=' . $row['id'] . '&page=' . $page; ?>" class="btn btn-primary btn-sm" title="Edit" >Edit</a><?php } ?>
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
            <script src="<?php echo URL_BASEADMIN; ?>libs/flatpickr/flatpickr.min.js"></script>
            <script src="<?php echo URL_BASEADMIN; ?>libs/prism/prism.js"></script>
            <script>
                //Date and Time Picker  
                $(".calendar").flatpickr();
            </script>
        </body>
    </html>
    <?php
    /** Check Page Authantication **/
}
else {
    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);
}
?>