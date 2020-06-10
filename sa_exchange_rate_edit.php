<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Exchange Rate";
    $listpagename = SA_EXCHANGE_RATE_LIST;
    $table = TB_EXCHANGE_RATES;
    $created_at = date('Y-m-d H:i:s');
   
    if ($_REQUEST['id']) {
        
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        $country_id = $data['country_id'];
        $base_currency_id = $data['base_currency_id'];
        $other_currency_id = $data['other_currency_id'];
        $other_currency_price = $data['other_currency_price'];
        $created_at = date( 'd F, Y', strtotime($data['created_at']) );        
        
    } else {
        
        $country_id = $_REQUEST['country_id'];
        $base_currency_id = $_REQUEST['base_currency_id'];
        $other_currency_id = $_REQUEST['other_currency_id'];
        $other_currency_price = $_REQUEST['other_currency_price'];
        
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
                                                                <div class="col-sm-5">
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
                                                                <label for="base_currency_id" class="col-sm-2 form-control-label">Base Currency</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="base_currency_id" id="base_currency_id" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                $selected = "";
                                                                                if( $row['id'] == $base_currency_id ):
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
                                                                <label for="other_currency_id" class="col-sm-2 form-control-label">Other Currency</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group">                         
                                                                        <select name="other_currency_id" id="other_currency_id" class="form-control">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $sel_currency = selectqry('*', TB_CURRENCY);
                                                                            while ($row = mysqli_fetch_assoc($sel_currency)):

                                                                                $selected = "";
                                                                                if( $row['id'] == $other_currency_id ):
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
                                                                <label for="other_currency_price" class="col-sm-2 form-control-label">Other Currency Price</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="other_currency_price" id="other_currency_price" class="form-control" value="<?php echo $other_currency_price; ?>" > 
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
                    chk['s:base_currency_id'] = " Base Currency";
                    chk['s:other_currency_id'] = " Other Currency";
                    
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
    
    $arr =  array( "country_id"=>$_POST['country_id'],"base_currency_id"=>$_POST['base_currency_id'], "other_currency_id"=>$_POST['other_currency_id'],
                "other_currency_price"=>$_POST['other_currency_price'] );
    
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