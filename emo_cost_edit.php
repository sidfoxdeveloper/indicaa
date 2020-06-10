<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Cost";
    $listpagename = EMO_COST_LIST;
    $table = TB_COST;
    $created_at = date('Y-m-d H:i:s');
   
    if ($_REQUEST['id']) {
        
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        
        $country_id = $data['country_id'];
        $ex_yard_price_currency_id_1 = $data['ex_yard_price_currency_id_1'];
        $ex_yard_price_currency_id_2 = $data['ex_yard_price_currency_id_2'];
        $ex_yard_price_currency_id_3 = $data['ex_yard_price_currency_id_3'];
        $ex_yard_price_currency_id_4 = $data['ex_yard_price_currency_id_4'];
        $ex_yard_price_currency_id_5 = $data['ex_yard_price_currency_id_5'];
        $ex_yard_price_currency_id_6 = $data['ex_yard_price_currency_id_6'];
        $ex_yard_price_currency_id_7 = $data['ex_yard_price_currency_id_7'];
        $ex_yard_price_currency_id_8 = $data['ex_yard_price_currency_id_8'];
        $ex_yard_price_currency_id_9 = $data['ex_yard_price_currency_id_9'];
        $ex_yard_price_currency_id_10 = $data['ex_yard_price_currency_id_10'];
        $ex_yard_price_currency_id_11 = $data['ex_yard_price_currency_id_11'];
        $ex_yard_price_currency_id_12 = $data['ex_yard_price_currency_id_12'];
        $ex_yard_price_currency_id_13 = $data['ex_yard_price_currency_id_13'];
        $ex_yard_price_currency_id_14 = $data['ex_yard_price_currency_id_14'];
        $ex_yard_price_currency_id_15 = $data['ex_yard_price_currency_id_15'];
        $ex_yard_price_currency_id_16 = $data['ex_yard_price_currency_id_16'];
        $ex_yard_price_currency_id_17 = $data['ex_yard_price_currency_id_17'];
        $ex_yard_price_currency_id_18 = $data['ex_yard_price_currency_id_18'];
        $ex_yard_price_currency_id_19 = $data['ex_yard_price_currency_id_19'];
        $ex_yard_price_currency_id_20 = $data['ex_yard_price_currency_id_20'];
        $ex_yard_price_currency_id_21 = $data['ex_yard_price_currency_id_21'];
        $ex_yard_price_currency_id_22 = $data['ex_yard_price_currency_id_22'];
        $ex_yard_price_currency_id_23 = $data['ex_yard_price_currency_id_23'];
        $ex_yard_price_currency_id_24 = $data['ex_yard_price_currency_id_24'];
        $ex_yard_price_currency_id_25 = $data['ex_yard_price_currency_id_25'];
        $fobing_cost_currency_id_1 = $data['fobing_cost_currency_id_1'];
        $fobing_cost_currency_id_2 = $data['fobing_cost_currency_id_2'];
        $fobing_cost_currency_id_3 = $data['fobing_cost_currency_id_3'];
        $fobing_cost_currency_id_4 = $data['fobing_cost_currency_id_4'];
        $fobing_cost_currency_id_5 = $data['fobing_cost_currency_id_5'];
        $fobing_cost_currency_id_6 = $data['fobing_cost_currency_id_6'];
        $fobing_cost_currency_id_7 = $data['fobing_cost_currency_id_7'];
        $fobing_cost_currency_id_8 = $data['fobing_cost_currency_id_8'];
        $fobing_cost_currency_id_9 = $data['fobing_cost_currency_id_9'];
        $fobing_cost_currency_id_10 = $data['fobing_cost_currency_id_10'];
        $fobing_cost_currency_id_11 = $data['fobing_cost_currency_id_11'];
        $fobing_cost_currency_id_12 = $data['fobing_cost_currency_id_12'];
        $fobing_cost_currency_id_13 = $data['fobing_cost_currency_id_13'];
        $fobing_cost_currency_id_14 = $data['fobing_cost_currency_id_14'];
        $fobing_cost_currency_id_15 = $data['fobing_cost_currency_id_15'];
        $fobing_cost_currency_id_16 = $data['fobing_cost_currency_id_16'];
        $fobing_cost_currency_id_17 = $data['fobing_cost_currency_id_17'];
        $fobing_cost_currency_id_18 = $data['fobing_cost_currency_id_18'];
        $fobing_cost_currency_id_19 = $data['fobing_cost_currency_id_19'];
        $fobing_cost_currency_id_20 = $data['fobing_cost_currency_id_20'];
        $fobing_cost_currency_id_21 = $data['fobing_cost_currency_id_21'];
        $fobing_cost_currency_id_22 = $data['fobing_cost_currency_id_22'];
        $fobing_cost_currency_id_23 = $data['fobing_cost_currency_id_23'];
        $fobing_cost_currency_id_24 = $data['fobing_cost_currency_id_24'];
        $fobing_cost_currency_id_25 = $data['fobing_cost_currency_id_25'];
        $status = $data['status'];
        $created_at = date( 'd F, Y', strtotime($data['created_at']) );        
        
    } else {            
        
        $country_id = $_REQUEST['country_id'];        
        $ex_yard_price_currency_id_1 = $_REQUEST['ex_yard_price_currency_id_1'];
        $ex_yard_price_currency_id_2 = $_REQUEST['ex_yard_price_currency_id_2'];
        $ex_yard_price_currency_id_3 = $_REQUEST['ex_yard_price_currency_id_3'];
        $ex_yard_price_currency_id_4 = $_REQUEST['ex_yard_price_currency_id_4'];
        $ex_yard_price_currency_id_5 = $_REQUEST['ex_yard_price_currency_id_5'];
        $ex_yard_price_currency_id_6 = $_REQUEST['ex_yard_price_currency_id_6'];
        $ex_yard_price_currency_id_7 = $_REQUEST['ex_yard_price_currency_id_7'];
        $ex_yard_price_currency_id_8 = $_REQUEST['ex_yard_price_currency_id_8'];
        $ex_yard_price_currency_id_9 = $_REQUEST['ex_yard_price_currency_id_9'];
        $ex_yard_price_currency_id_10 = $_REQUEST['ex_yard_price_currency_id_10'];
        $ex_yard_price_currency_id_11 = $_REQUEST['ex_yard_price_currency_id_11'];
        $ex_yard_price_currency_id_12 = $_REQUEST['ex_yard_price_currency_id_12'];
        $ex_yard_price_currency_id_13 = $_REQUEST['ex_yard_price_currency_id_13'];
        $ex_yard_price_currency_id_14 = $_REQUEST['ex_yard_price_currency_id_14'];
        $ex_yard_price_currency_id_15 = $_REQUEST['ex_yard_price_currency_id_15'];
        $ex_yard_price_currency_id_16 = $_REQUEST['ex_yard_price_currency_id_16'];
        $ex_yard_price_currency_id_17 = $_REQUEST['ex_yard_price_currency_id_17'];
        $ex_yard_price_currency_id_18 = $_REQUEST['ex_yard_price_currency_id_18'];
        $ex_yard_price_currency_id_19 = $_REQUEST['ex_yard_price_currency_id_19'];
        $ex_yard_price_currency_id_20 = $_REQUEST['ex_yard_price_currency_id_20'];
        $ex_yard_price_currency_id_21 = $_REQUEST['ex_yard_price_currency_id_21'];
        $ex_yard_price_currency_id_22 = $_REQUEST['ex_yard_price_currency_id_22'];
        $ex_yard_price_currency_id_23 = $_REQUEST['ex_yard_price_currency_id_23'];
        $ex_yard_price_currency_id_24 = $_REQUEST['ex_yard_price_currency_id_24'];
        $ex_yard_price_currency_id_25 = $_REQUEST['ex_yard_price_currency_id_25'];
        $fobing_cost_currency_id_1 = $_REQUEST['fobing_cost_currency_id_1'];
        $fobing_cost_currency_id_2 = $_REQUEST['fobing_cost_currency_id_2'];
        $fobing_cost_currency_id_3 = $_REQUEST['fobing_cost_currency_id_3'];
        $fobing_cost_currency_id_4 = $_REQUEST['fobing_cost_currency_id_4'];
        $fobing_cost_currency_id_5 = $_REQUEST['fobing_cost_currency_id_5'];
        $fobing_cost_currency_id_6 = $_REQUEST['fobing_cost_currency_id_6'];
        $fobing_cost_currency_id_7 = $_REQUEST['fobing_cost_currency_id_7'];
        $fobing_cost_currency_id_8 = $_REQUEST['fobing_cost_currency_id_8'];
        $fobing_cost_currency_id_9 = $_REQUEST['fobing_cost_currency_id_9'];
        $fobing_cost_currency_id_10 = $_REQUEST['fobing_cost_currency_id_10'];
        $fobing_cost_currency_id_11 = $_REQUEST['fobing_cost_currency_id_11'];
        $fobing_cost_currency_id_12 = $_REQUEST['fobing_cost_currency_id_12'];
        $fobing_cost_currency_id_13 = $_REQUEST['fobing_cost_currency_id_13'];
        $fobing_cost_currency_id_14 = $_REQUEST['fobing_cost_currency_id_14'];
        $fobing_cost_currency_id_15 = $_REQUEST['fobing_cost_currency_id_15'];
        $fobing_cost_currency_id_16 = $_REQUEST['fobing_cost_currency_id_16'];
        $fobing_cost_currency_id_17 = $_REQUEST['fobing_cost_currency_id_17'];
        $fobing_cost_currency_id_18 = $_REQUEST['fobing_cost_currency_id_18'];
        $fobing_cost_currency_id_19 = $_REQUEST['fobing_cost_currency_id_19'];
        $fobing_cost_currency_id_20 = $_REQUEST['fobing_cost_currency_id_20'];
        $fobing_cost_currency_id_21 = $_REQUEST['fobing_cost_currency_id_21'];
        $fobing_cost_currency_id_22 = $_REQUEST['fobing_cost_currency_id_22'];
        $fobing_cost_currency_id_23 = $_REQUEST['fobing_cost_currency_id_23'];
        $fobing_cost_currency_id_24 = $_REQUEST['fobing_cost_currency_id_24'];
        $fobing_cost_currency_id_25 = $_REQUEST['fobing_cost_currency_id_25'];
        $status = $_REQUEST['status'];
        
    }
    if (strpos($_SERVER['REQUEST_URI'], "?true") != 0) {
        
        $temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?true"));
        $backurlfirstpart = substr($temp, strpos($temp, "?true"), strpos($temp, "&id"));
        $temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "&id") + 4);
        if (strpos($temp, "&") != 0)
            $backurllastpart = substr($temp, strpos($temp, "&"));
        $gobackurl = $backurlfirstpart . $backurllastpart;
        
    } else {
        $gobackurl = "?true";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <!-- BEGIN HEAD -->
        <head>
            <?php include('includes/head.php'); ?>              
        </head>

        <body class="customer-add-page invoice-list-page ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> 
            <!-- remove ks-page-header-fixed to unfix header -->
            <?php include('includes/header.php'); ?>
            <div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs"> 
                 <?php include('includes/sidebar.php'); ?>
                <div class="ks-column ks-page">
                    <div class="ks-page-header">
                        <section class="ks-title">
                            <h3><?php echo $pagetype . ' ' . $pagename; ?></h3>
                        </section>
                    </div>

                    <div class="ks-page-content">
                        <div class="ks-page-content-body">
                            <div class="ks-nav-body-wrapper">
                                <div class="container-fluid">                                    
                                    <form action="" name="mainform" id="mainform" method="post" enctype="multipart/form-data" onsubmit="return submitform();">
                                        <div class="row">
                                            <div class="col-lg-10 ks-panels-column-section">
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <h5 class="card-title"><?php echo $pagename; ?></h5>
                                                        <div> 
                                                            <div class="form-group row">
                                                                <label for="country_id" class="col-sm-2 form-control-label">Select Country</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <select name="country_id" id="country_id" class="form-control">
                                                                            <option value="">Select The Country</option>
                                                                            <?php
                                                                            $sel_contries = selectqry('*', TB_COUNTRIES);
                                                                            while ($crow = mysqli_fetch_assoc($sel_contries)):
                                                                                
                                                                                $selected = "";
                                                                                if( $crow['id'] == $country_id ):
                                                                                    $selected = "selected";
                                                                                endif; 
                                                                                
                                                                                echo '<option value="'.$crow['id'].'" '.$selected.' >'.$crow['name'].'</option>';
                                                                                
                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="status" class="col-sm-2 form-control-label">Status</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                         
                                                                        <select name="status" id="status" class="form-control">
                                                                            <option>Select Status</option>
                                                                            <option <?php if($status == 'verified'){ echo 'selected'; } ?> value="verified">Verified</option>
                                                                            <option <?php if($status == 'unverified'){ echo 'selected'; } ?> value="unverified">Unverified</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_1" class="col-sm-2 form-control-label">EX YARD PRICE 1</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_1" id="ex_yard_price_currency_id_1" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                $selected = "";
                                                                                if( $row['id'] == $ex_yard_price_currency_id_1 ):
                                                                                    $selected = "selected";
                                                                                endif;
                                                                                
                                                                                echo '<option value="'.$row['id'].'" '.$selected.' >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                
                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_2" class="col-sm-2 form-control-label">EX YARD PRICE 2</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_2" id="ex_yard_price_currency_id_2" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_2 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_3" class="col-sm-2 form-control-label">EX YARD PRICE 3</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_3" id="ex_yard_price_currency_id_3" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_3 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_4" class="col-sm-2 form-control-label">EX YARD PRICE 4</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_4" id="ex_yard_price_currency_id_4" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_4 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_5" class="col-sm-2 form-control-label">EX YARD PRICE 5</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_5" id="ex_yard_price_currency_id_5" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_5 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_6" class="col-sm-2 form-control-label">EX YARD PRICE 6</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_6" id="ex_yard_price_currency_id_6" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_6 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_7" class="col-sm-2 form-control-label">EX YARD PRICE 7</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_7" id="ex_yard_price_currency_id_7" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_7 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_8" class="col-sm-2 form-control-label">EX YARD PRICE 8</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_8" id="ex_yard_price_currency_id_8" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_8 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_9" class="col-sm-2 form-control-label">EX YARD PRICE 9</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_9" id="ex_yard_price_currency_id_9" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_9 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_10" class="col-sm-2 form-control-label">EX YARD PRICE 10</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_10" id="ex_yard_price_currency_id_10" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_10 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_11" class="col-sm-2 form-control-label">EX YARD PRICE 11</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_11" id="ex_yard_price_currency_id_11" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_11 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_12" class="col-sm-2 form-control-label">EX YARD PRICE 12</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_12" id="ex_yard_price_currency_id_12" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_12 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_13" class="col-sm-2 form-control-label">EX YARD PRICE 13</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_13" id="ex_yard_price_currency_id_13" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_13 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_14" class="col-sm-2 form-control-label">EX YARD PRICE 14</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_14" id="ex_yard_price_currency_id_14" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_14 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_15" class="col-sm-2 form-control-label">EX YARD PRICE 15</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_15" id="ex_yard_price_currency_id_15" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_15 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_16" class="col-sm-2 form-control-label">EX YARD PRICE 16</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_16" id="ex_yard_price_currency_id_16" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_16 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_17" class="col-sm-2 form-control-label">EX YARD PRICE 17</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_17" id="ex_yard_price_currency_id_17" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_17 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_18" class="col-sm-2 form-control-label">EX YARD PRICE 18</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_18" id="ex_yard_price_currency_id_18" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_18 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_19" class="col-sm-2 form-control-label">EX YARD PRICE 19</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_19" id="ex_yard_price_currency_id_19" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_19 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_20" class="col-sm-2 form-control-label">EX YARD PRICE 20</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_20" id="ex_yard_price_currency_id_20" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_20 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_21" class="col-sm-2 form-control-label">EX YARD PRICE 21</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_21" id="ex_yard_price_currency_id_21" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_21 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_22" class="col-sm-2 form-control-label">EX YARD PRICE 22</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_22" id="ex_yard_price_currency_id_22" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_22 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_23" class="col-sm-2 form-control-label">EX YARD PRICE 23</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_23" id="ex_yard_price_currency_id_23" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_23 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_24" class="col-sm-2 form-control-label">EX YARD PRICE 24</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_24" id="ex_yard_price_currency_id_24" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_24 ):
                                                                                    echo '<option value="'.$row['id'].'" selec-ted >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="ex_yard_price_currency_id_25" class="col-sm-2 form-control-label">EX YARD PRICE 25</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="ex_yard_price_currency_id_25" id="ex_yard_price_currency_id_25" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $ex_yard_price_currency_id_25 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_1" class="col-sm-2 form-control-label">FOBING COST 1</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_1" id="fobing_cost_currency_id_1" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_1 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_2" class="col-sm-2 form-control-label">FOBING COST 2</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_2" id="fobing_cost_currency_id_2" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_2 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_3" class="col-sm-2 form-control-label">FOBING COST 3</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_3" id="fobing_cost_currency_id_3" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_3 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_4" class="col-sm-2 form-control-label">FOBING COST 4</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_4" id="fobing_cost_currency_id_4" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_4 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_5" class="col-sm-2 form-control-label">FOBING COST 5</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_5" id="fobing_cost_currency_id_5" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_5 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_6" class="col-sm-2 form-control-label">FOBING COST 6</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_6" id="fobing_cost_currency_id_6" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_6 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_7" class="col-sm-2 form-control-label">FOBING COST 7</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_7" id="fobing_cost_currency_id_7" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_7 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_8" class="col-sm-2 form-control-label">FOBING COST 8</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_8" id="fobing_cost_currency_id_8" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_8 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_9" class="col-sm-2 form-control-label">FOBING COST 9</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_9" id="fobing_cost_currency_id_9" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_9 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_10" class="col-sm-2 form-control-label">FOBING COST 10</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_10" id="fobing_cost_currency_id_10" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_10 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_11" class="col-sm-2 form-control-label">FOBING COST 11</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_11" id="fobing_cost_currency_id_11" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_11 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_12" class="col-sm-2 form-control-label">FOBING COST 12</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_12" id="fobing_cost_currency_id_12" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_12 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_13" class="col-sm-2 form-control-label">FOBING COST 13</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_13" id="fobing_cost_currency_id_13" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_13 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_14" class="col-sm-2 form-control-label">FOBING COST 14</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_14" id="fobing_cost_currency_id_14" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_14 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_15" class="col-sm-2 form-control-label">FOBING COST 15</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_15" id="fobing_cost_currency_id_15" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_15 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_16" class="col-sm-2 form-control-label">FOBING COST 16</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_16" id="fobing_cost_currency_id_16" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_16 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_17" class="col-sm-2 form-control-label">FOBING COST 17</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_17" id="fobing_cost_currency_id_17" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_17 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_18" class="col-sm-2 form-control-label">FOBING COST 18</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_18" id="fobing_cost_currency_id_18" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_18 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_19" class="col-sm-2 form-control-label">FOBING COST 19</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_19" id="fobing_cost_currency_id_19" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_19 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_20" class="col-sm-2 form-control-label">FOBING COST 20</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_20" id="fobing_cost_currency_id_20" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_20 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_21" class="col-sm-2 form-control-label">FOBING COST 21</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_21" id="fobing_cost_currency_id_21" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_21 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_22" class="col-sm-2 form-control-label">FOBING COST 22</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_22" id="fobing_cost_currency_id_22" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_22 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_23" class="col-sm-2 form-control-label">FOBING COST </label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_23" id="fobing_cost_currency_id_23" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_23 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_24" class="col-sm-2 form-control-label">FOBING COST 24</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_24" id="fobing_cost_currency_id_24" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_24 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fobing_cost_currency_id_25" class="col-sm-2 form-control-label">FOBING COST 25</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="fobing_cost_currency_id_25" id="fobing_cost_currency_id_25" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                if( $row['id'] == $fobing_cost_currency_id_25 ):
                                                                                    echo '<option value="'.$row['id'].'" selected >'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                else:
                                                                                    echo '<option value="'.$row['id'].'">'.$row['name']. '(' .$row['symbol'] .')'. '</option>';
                                                                                endif; 

                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                              
                                                            

                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <button class="btn btn-success right" type="button" onclick="return savennew(0);">Save</button>
                                                                </div>
                                                                <div class="col-sm-6 text-right">
                                                                    <a class="btn btn-danger right" href="<?php echo URL_BASEADMIN . $listpagename . $gobackurl; ?>">Back</a>
                                                                </div> 
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="addnew" id="addnew" value="0" />
                                                <input type="submit" style="display:none" name="hidesubmit" />                                
                                            </div>
                                        </div>
                                    </form>
                                                                        
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php include('includes/script_bottom.php'); ?>
            <script>
                function chkrequired() {
                    
                    var chk = new Array();                    
                    chk['s:country_id'] = " Country";
                    chk['s:status'] = " Status";
                    
                    if (check(chk, 1))
                        document.mainform.submit();
                    
                }
            </script>
        </body>
    </html>
    <?php
    /*     * Check Page Authantication * */
} else {
    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);
}
?>

<?php
if (isset($_POST['addnew'])) {
    
    $arr =  array( "country_id"=>$_POST['country_id'], 
                "ex_yard_price_currency_id_1"=>$_POST['ex_yard_price_currency_id_1'], "ex_yard_price_currency_id_2"=>$_POST['ex_yard_price_currency_id_2'],
                "ex_yard_price_currency_id_3"=>$_POST['ex_yard_price_currency_id_3'], "ex_yard_price_currency_id_4"=>$_POST['ex_yard_price_currency_id_4'],
                "ex_yard_price_currency_id_5"=>$_POST['ex_yard_price_currency_id_5'], "ex_yard_price_currency_id_6"=>$_POST['ex_yard_price_currency_id_6'],
                "ex_yard_price_currency_id_7"=>$_POST['ex_yard_price_currency_id_7'], "ex_yard_price_currency_id_8"=>$_POST['ex_yard_price_currency_id_8'],
                "ex_yard_price_currency_id_9"=>$_POST['ex_yard_price_currency_id_9'], "ex_yard_price_currency_id_10"=>$_POST['ex_yard_price_currency_id_10'],
                "ex_yard_price_currency_id_11"=>$_POST['ex_yard_price_currency_id_11'], "ex_yard_price_currency_id_12"=>$_POST['ex_yard_price_currency_id_12'],
                "ex_yard_price_currency_id_13"=>$_POST['ex_yard_price_currency_id_13'], "ex_yard_price_currency_id_14"=>$_POST['ex_yard_price_currency_id_14'],
                "ex_yard_price_currency_id_15"=>$_POST['ex_yard_price_currency_id_15'], "ex_yard_price_currency_id_16"=>$_POST['ex_yard_price_currency_id_16'],
                "ex_yard_price_currency_id_17"=>$_POST['ex_yard_price_currency_id_17'], "ex_yard_price_currency_id_18"=>$_POST['ex_yard_price_currency_id_18'],
                "ex_yard_price_currency_id_19"=>$_POST['ex_yard_price_currency_id_19'], "ex_yard_price_currency_id_20"=>$_POST['ex_yard_price_currency_id_20'],
                "ex_yard_price_currency_id_21"=>$_POST['ex_yard_price_currency_id_21'], "ex_yard_price_currency_id_22"=>$_POST['ex_yard_price_currency_id_22'],
                "ex_yard_price_currency_id_23"=>$_POST['ex_yard_price_currency_id_23'], "ex_yard_price_currency_id_24"=>$_POST['ex_yard_price_currency_id_24'],
                "ex_yard_price_currency_id_25"=>$_POST['ex_yard_price_currency_id_25'],
                "fobing_cost_currency_id_1"=>$_POST['fobing_cost_currency_id_1'], "fobing_cost_currency_id_2"=>$_POST['fobing_cost_currency_id_2'],
                "fobing_cost_currency_id_3"=>$_POST['fobing_cost_currency_id_3'], "fobing_cost_currency_id_4"=>$_POST['fobing_cost_currency_id_4'],
                "fobing_cost_currency_id_5"=>$_POST['fobing_cost_currency_id_5'], "fobing_cost_currency_id_6"=>$_POST['fobing_cost_currency_id_6'],
                "fobing_cost_currency_id_7"=>$_POST['fobing_cost_currency_id_7'], "fobing_cost_currency_id_8"=>$_POST['fobing_cost_currency_id_8'],
                "fobing_cost_currency_id_9"=>$_POST['fobing_cost_currency_id_9'], "fobing_cost_currency_id_10"=>$_POST['fobing_cost_currency_id_10'],
                "fobing_cost_currency_id_11"=>$_POST['fobing_cost_currency_id_11'], "fobing_cost_currency_id_12"=>$_POST['fobing_cost_currency_id_12'],
                "fobing_cost_currency_id_13"=>$_POST['fobing_cost_currency_id_13'], "fobing_cost_currency_id_14"=>$_POST['fobing_cost_currency_id_14'],
                "fobing_cost_currency_id_15"=>$_POST['fobing_cost_currency_id_15'], "fobing_cost_currency_id_16"=>$_POST['fobing_cost_currency_id_16'],
                "fobing_cost_currency_id_17"=>$_POST['fobing_cost_currency_id_17'], "fobing_cost_currency_id_18"=>$_POST['fobing_cost_currency_id_18'],
                "fobing_cost_currency_id_19"=>$_POST['fobing_cost_currency_id_19'], "fobing_cost_currency_id_20"=>$_POST['fobing_cost_currency_id_20'],
                "fobing_cost_currency_id_21"=>$_POST['fobing_cost_currency_id_21'], "fobing_cost_currency_id_22"=>$_POST['fobing_cost_currency_id_22'],
                "fobing_cost_currency_id_23"=>$_POST['fobing_cost_currency_id_23'], "fobing_cost_currency_id_24"=>$_POST['fobing_cost_currency_id_24'],
                "fobing_cost_currency_id_25"=>$_POST['fobing_cost_currency_id_25'], "status"=>$_POST['status'] );
    
    if ($_REQUEST['id']) {
   
        $update = updateqry( $arr, array("id="=>$_REQUEST['id']), $table );        
       
    } else {
        
        $tmp = array("created_at"=>date('Y-m-d h:i:s'));
        $carr = array_merge($arr, $tmp);        
        $insert = insertqry($carr, $table);
        $insertedid = getfieldmaxvalue('id', $table); 
        
    }
    
    $updateid = ($_REQUEST['id']) ? $_REQUEST['id'] : $insertedid;

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
    
}
?>