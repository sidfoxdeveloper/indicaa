<?php
include('includes/script_top.php');

if ($permission['view']) {
   
    $pagename = "LR Report";
    $listpagename = CM_LR_REPORT.'?true&id=1';
    $editpagename = CM_LR_REPORT.'?true&id=1';
    $table = TB_SELECTED_COUNTRY_FOR_LR_REPORT;
    
    /** On Delete Action **/
    if ($delete['id']) {
        //Unlink image
    }
    
    if($_REQUEST['id']){
        
        $data = fetchqry( "*", $table, array("id="=>$_REQUEST['id']) );
        $country_id = explode(',', $data['country_id']);
        
    } else {
        $country_id = explode(',', $_REQUEST['country_id']);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <!-- BEGIN HEAD -->
        <head>
            
            <?php include('includes/head.php'); ?>
            
            <link rel="stylesheet" href="<?php echo URL_BASEADMIN; ?>dropzone/dropzone.css" type="text/css" />
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
                                <h3 class="ks-main-title">LR Report</h3>
                            </div>
                        </section>                        
                    </div>
                    <div class="ks-page-content">
                        <div class="ks-page-content-body">
                            <div class="ks-dashboard-tabbed-sidebar">
                                <div class="ks-dashboard-tabbed-sidebar-widgets">  
                                    
                                    <!-- Filters -->
                                    <form action="" method="get">
                                        <div class="row" >
                                            <div class="col-sm-2">
                                                <h5 class="ks-main-title">REPORTS</h5>
                                            </div>
                                            <div class="col-sm-1">
                                                <h5 class="text-right ks-main-title">Filter By</h5>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="search_text" id="search_text" class="form-control" value="<?php echo $_REQUEST['search_text']; ?>" placeholder="Enter Container No." > 
                                            </div>
                                            <div class="col-sm-2">
                                                <?php 
                                                    if( !isEmpty($_REQUEST['filter_date']) ):
                                                    $filter_date = date( 'Y-m-d', strtotime($_REQUEST['filter_date']) );
                                                endif;
                                                ?>
                                                <input type="text" name="filter_date" id="filter_date" class="form-control" value="<?php echo $filter_date; ?>" placeholder="Date" > 
                                            </div>
                                            <div class="col-sm-2">
                                                <?php
                                                $sel_users = selectqry('*', TB_USERS, array('users_groups_id='=>'6'), " `first_name` ASC ");
                                                ?>
                                                <select name="inspector_id" id="inspector_id" class="form-control">
                                                    <option value="">Select Inspector</option>
                                                    <?php
                                                        while($row = mysqli_fetch_assoc($sel_users)):

                                                            if( $_REQUEST['inspector_id'] == $row['id'] ):
                                                                $selected = "selected";
                                                            else:
                                                                $selected = "";
                                                            endif;

                                                            echo '<option value='.$row['id'].' '.$selected.' >'.$row['first_name'] .' '.$row['last_name'].'</option>';

                                                        endwhile;
                                                    ?>
                                                </select>
                                            </div>                                        
                                            <div class="col-sm-2">
                                                <input type="submit" value="Filter" />
                                                <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal" data-target="#myModal" >
                                                    <span class="ks-icon la la-sliders" style="font-size:30px;"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Filters -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Select Country</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" name="mainform" id="mainform" method="post" onsubmit="return submitform();" >
                                <input type="hidden" name="add_new" value="add_new" />
                                <div class="form-group row">
                                <?php
                                    $qry_con = selectqry('*', TB_COUNTRIES, array(), ' name ASC');       
                                    while ($row = mysqli_fetch_assoc($qry_con)) : 
                                        
                                            if( in_array( $row['id'], $country_id) ):
                                                $checked = "checked";
                                            else:
                                                $checked = "";
                                            endif;
                                            ?>

                                            <div class="col-sm-4">
                                                <input type="checkbox" name="country_id[]" id="country_id_<?php echo $row['id'];?>" value="<?php echo $row['id'];?>" <?php echo $checked; ?> /> 
                                                <label for="country_id_<?php echo $row['id'];?>" class="col-sm-3 form-control-label"><?php echo $row['name'];?></label>
                                            </div>
                                    
                                <?php    
                                    endwhile;
                                ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button class="btn btn-primary" type="clear" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-success right" type="submit"> Submit </button>
                                    </div>
                                </div>
                            </form>                                
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            
            <?php include('includes/script_bottom.php'); ?>            
            <script type="text/javascript" src="<?php echo URL_BASEADMIN; ?>dropzone/dropzone.js"></script>
            <script src="<?php echo URL_BASEADMIN; ?>libs/flatpickr/flatpickr.min.js"></script>
            <script src="<?php echo URL_BASEADMIN; ?>libs/prism/prism.js"></script>
            <script> 
                function chkrequired() {
                    var chk = new Array();
                    if (check(chk, 1))
                        document.mainform.submit();
                }                
                //Date and Time Picker  
                $("#filter_date").flatpickr({ 
                    dateFormat:"Y-m-d",
                });                                
            </script>
            
        </body>
    </html>
    <?php
    /** Check Page Authantication **/
    
    if( $_REQUEST['add_new'] ):
        
        $country = implode( ",", $_REQUEST['country_id']);
        $update = updateqry( array('country_id'=>$country), array( "id="=>$_REQUEST['id'] ), $table );
        
        if ($update || $insert)
            $_SESSION['msg'] = 'Action performed successfully.|alert-success';
        else
            $_SESSION['msg'] = 'Action not performed successfully.|alert-error';

        if ($_POST['addnew'] == 1)
            header("Location:" . $_SERVER['PHP_SELF'] . $gobackurl . '&id=' . $updateid);
        else if ($_POST['addnew'] == 2)
            header("Location:" . $_SERVER['PHP_SELF']);
        else
            header("Location:" . $listpagename . $gobackurl);

        
    endif;
    
}
else {
    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);
}
?>