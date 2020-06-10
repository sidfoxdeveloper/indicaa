<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Country";
    $listpagename = SA_COUNTRY_LIST;
    $table = TB_COUNTRIES;
    $created_at = date('Y-m-d H:i:s');
   
    if ($_REQUEST['id']) {
        
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id="=>$_REQUEST['id']));
        $country_name = $data['name'];
        $country_code = $data['country_code'];
        
        $currency_id = $data['currency_id'];
        $currency = fetchqry( '*', TB_CURRENCY, array('id='=>$currency_id) );
        $currency_name = $currency['name'];
        $currency_code = $currency['currency_code'];
        $currency_symbol = $currency['symbol'];
        
        $branch_code_id = $data['branch_code_id'];
        $branch = fetchqry( '*', TB_BRANCH_CODE, array('id='=>$branch_code_id) );
        $branch_name = $branch['name'];
        $branch_code = $branch['branch_code'];
        
        $company_id = $data['company_id'];
        $company = fetchqry( '*', TB_COMPANIES, array('id='=>$company_id) );
        $company_name = $company['name'];
        $company_code = $company['company_code'];
        
        $shipping_line_id = $data['shipping_line_id'];
        $shipping_line = fetchqry( '*', TB_SHIPPING_LINE, array('id='=>$shipping_line_id) );        
        $shipping_line_name = $shipping_line['name'];
        $shipping_line_code = $shipping_line['shipping_line_code'];
        
        $status = $data['status'];
        $created_at = date( 'd F, Y', strtotime($data['created_at']) );        
        
    } else {
        
        $country_name = $_POST['country_name'];
        $country_code = $_POST['country_code'];
        
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
                                            <div class="col-lg-12 ks-panels-column-section">
                                                
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <h5 class="card-title">COUNTRY DETAILS</h5>
                                                        <div>
                                                            <div class="form-group row" >
                                                                <label class="col-sm-1 form-control-label">Name</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="country_name" id="country_name" class="form-control" value="<?php echo $country_name; ?>" placeholder="Enter Country Name" > 
                                                                    </div>
                                                                </div>
                                                                <label class="col-sm-1 form-control-label">Code</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="country_code" id="country_code" class="form-control" value="<?php echo $country_code; ?>" placeholder="Enter Country Code" > 
                                                                    </div>
                                                                </div>                                                                
                                                                <label class="col-sm-1 form-control-label">Status</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <select name="status" id="status" class="form-control">
                                                                            <option>Select Status</option>
                                                                            <option <?php if($status == 'verified'){ echo 'selected'; } ?> value="verified">Verified</option>
                                                                            <option <?php if($status == 'unverified'){ echo 'selected'; } ?> value="unverified">Unverified</option>
                                                                        </select>
                                                                    </div>
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Currency Details -->
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <?php $tot_currency_count = 1; ?>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <h5 class="card-title">CURRENCY DETAILS</h5>
                                                            </div>
                                                            <?php /* ?>
                                                            <div class="col-sm-2">
                                                                <button class="btn btn-primary" type="button" id="add_more_currency" data-counter="<?php echo $tot_currency_count;?>" onclick="manageCurrencyCounter();" > <i class="la la-plus"></i> Add More </button>
                                                            </div>
                                                            <?php */ ?> 
                                                        </div>                                                        
                                                        <div id="currency_top_div">
                                                            <div class="form-group row" >
                                                                <label class="col-sm-1 form-control-label">Name</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="currency_name" id="currency_name" class="form-control" value="<?php echo $currency_name; ?>" placeholder="Enter Currency Name" > 
                                                                    </div>
                                                                </div>
                                                                <label class="col-sm-1 form-control-label">Code</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="currency_code" id="currency_code" class="form-control" value="<?php echo $currency_code; ?>" placeholder="Enter Currency Code" >
                                                                    </div>
                                                                </div>                                                                
                                                                <label class="col-sm-1 form-control-label">Symbol</label>
                                                                <div class="col-sm-2">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="symbol" id="symbol" class="form-control" value="<?php echo $currency_symbol; ?>" placeholder="Enter Symbol" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Branch Details -->
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <?php $tot_branch_count = 1; ?>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <h5 class="card-title">BRANCH DETAILS</h5>
                                                            </div>
                                                            <?php /* ?>
                                                            <div class="col-sm-2">
                                                                <button class="btn btn-primary" type="button" id="add_more_branch" data-counter="<?php echo $tot_branch_count;?>" onclick="manageBranchCounter();" > <i class="la la-plus"></i> Add More </button>
                                                            </div> 
                                                            <?php */ ?>
                                                        </div>                              
                                                        <div id="branch_top_div">
                                                            <div class="form-group row" id="branch_div_id_1">
                                                                <label class="col-sm-1 form-control-label">Name</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="branch_name" id="branch_name" class="form-control" value="<?php echo $branch_name; ?>" placeholder="Enter Branch Name" > 
                                                                    </div>
                                                                </div>
                                                                <label class="col-sm-1 form-control-label">Code</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="branch_code" id="branch_code" class="form-control" value="<?php echo $branch_code; ?>" placeholder="Enter Branch Code" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Company Details -->
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <?php $tot_company_count = 1; ?>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <h5 class="card-title">COMPANY DETAILS</h5>
                                                            </div>
                                                            <?php /* ?>
                                                            <div class="col-sm-2">
                                                                <button class="btn btn-primary" type="button" id="add_more_company" data-counter="<?php echo $tot_company_count;?>" onclick="manageCompanyCounter();" > <i class="la la-plus"></i> Add More </button>
                                                            </div> 
                                                             <?php */ ?>
                                                        </div>                              
                                                        <div id="company_top_div">
                                                            <div class="form-group row" id="company_div_id_1">
                                                                <label class="col-sm-1 form-control-label">Name</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $company_name; ?>" placeholder="Enter Company Name" > 
                                                                    </div>
                                                                </div>
                                                                <label class="col-sm-1 form-control-label">Code</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="company_code" id="company_code" class="form-control" value="<?php echo $company_code; ?>" placeholder="Enter Company Code" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Shipping line Details -->
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <?php $tot_shipping_line_count = 1; ?>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <h5 class="card-title">SHIPPING LINE Details</h5>
                                                            </div>
                                                            <?php /* ?>
                                                            <div class="col-sm-2">
                                                                <button class="btn btn-primary" type="button" id="add_more_shipping_line" data-counter="<?php echo $tot_shipping_line_count;?>" onclick="manageShippingLineCounter();" > <i class="la la-plus"></i> Add More </button>
                                                            </div>
                                                            <?php */ ?>  
                                                        </div>                              
                                                        <div id="shipping_line_top_div">
                                                            <div class="form-group row" id="shipping_line_div_id_1">
                                                                <label class="col-sm-1 form-control-label">SHIPPING LINE Name</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="shipping_line_name" id="shipping_line_name" class="form-control" value="<?php echo $shipping_line_name; ?>" placeholder="Enter Shipping line Name" > 
                                                                    </div>
                                                                </div>
                                                                <label class="col-sm-1 form-control-label">SHIPPING LINE Code</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="shipping_line_code" id="shipping_line_code" class="form-control" value="<?php echo $shipping_line_code; ?>" placeholder="Enter Shipping line Code" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <br><br>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <button class="btn btn-success right" type="button" onclick="return savennew(0);">Save</button>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <a class="btn btn-danger right" href="<?php echo URL_BASEADMIN . $listpagename . $gobackurl; ?>">Back</a>
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
                    chk['t:country_name'] = "Country Name.";
                    chk['t:currency_name'] = "Currency Name.";
                    chk['t:branch_name'] = "Branch Name.";
                    chk['t:company_name'] = "Company Name";
                    chk['t:shipping_line_name'] = "Shipping Line";
                    
                    if (check(chk, 1))
                        document.mainform.submit();
                }
                //currency
                function manageCurrencyCounter(){
                    var cur_counter = parseInt( $('#add_more_currency').attr('data-counter') );
                    var cur_counter_tmp = (cur_counter + 1);
                    $('#add_more_currency').attr('data-counter', cur_counter_tmp);                    
                    var node = '<div class="form-group row" id="currency_div_id_'+cur_counter_tmp+'" ><label class="col-sm-1 form-control-label">Name</label><div class="col-sm-3"><div class="input-group"><input type="text" name="currency_name" id="currency_name" class="form-control" placeholder="Enter Currency Name" ></div></div><label class="col-sm-1 form-control-label">Code</label><div class="col-sm-3"><div class="input-group"><input type="text" name="currency_code" id="currency_code" class="form-control" placeholder="Enter Currency Code" ></div></div><div class="col-sm-2"><button class="btn btn-danger delete_label" type="button" data-del_counter="'+cur_counter_tmp+'" onclick="deleteCurrency('+cur_counter_tmp+');" ><i class="la la-remove"></i> Delete</button></div></div>';
                    $("#currency_top_div .row").last().after(node);
                }
                function deleteCurrency(counter){                    
                    var tmp = '#currency_div_id_'+counter;
                    $(tmp).remove();
                }
                
                //Branch
                function manageBranchCounter() {
                    var cur_counter = parseInt( $('#add_more_branch').attr('data-counter') );
                    var cur_counter_tmp = (cur_counter + 1);
                    $('#add_more_branch').attr('data-counter', cur_counter_tmp);                    
                    var node = '<div class="form-group row" id="branch_div_id_'+cur_counter_tmp+'" ><label class="col-sm-1 form-control-label">Name</label><div class="col-sm-3"><div class="input-group"><input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name" ></div></div><label class="col-sm-1 form-control-label">Code</label><div class="col-sm-3"><div class="input-group"><input type="text" name="branch_code" id="branch_code" class="form-control" placeholder="Enter Currency Code" ></div></div><div class="col-sm-2"><button class="btn btn-danger delete_label" type="button" data-del_counter="'+cur_counter_tmp+'" onclick="deleteBranch('+cur_counter_tmp+');" ><i class="la la-remove"></i> Delete</button></div></div>';
                    $("#branch_top_div .row").last().after(node);
                }
                function deleteBranch(counter){                    
                    var tmp = '#branch_div_id_'+counter;
                    $(tmp).remove();
                }
                
                //Shipping line
                function manageShippingLineCounter() {
                    var cur_counter = parseInt( $('#add_more_shipping_line').attr('data-counter') );
                    var cur_counter_tmp = (cur_counter + 1);
                    $('#add_more_shipping_line').attr('data-counter', cur_counter_tmp);                    
                    var node = '<div class="form-group row" id="shipping_line_div_id_'+cur_counter_tmp+'" ><label class="col-sm-1 form-control-label">Name</label><div class="col-sm-3"><div class="input-group"><input type="text" name="shipping_line_name" id="shipping_line_name" class="form-control" placeholder="Enter Shipping Line Name" ></div></div><label class="col-sm-1 form-control-label">Code</label><div class="col-sm-3"><div class="input-group"><input type="text" name="shipping_line_code" id="shipping_line_code" class="form-control" placeholder="Enter Shipping Line Code" ></div></div><div class="col-sm-2"><button class="btn btn-danger delete_label" type="button" data-del_counter="'+cur_counter_tmp+'" onclick="deleteShippingLine('+cur_counter_tmp+');" ><i class="la la-remove"></i> Delete</button></div></div>';
                    $("#shipping_line_top_div .row").last().after(node);
                }
                function deleteShippingLine(counter){                    
                    var tmp = '#shipping_line_div_id_'+counter;
                    $(tmp).remove();
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
    
     if ($_REQUEST['id']) {
         
        $arr = array( "name"=>$_POST['country_name'], "country_code"=>$_POST['country_code'], "status"=>$_POST['status'] );
        $update = updateqry( $arr, array("id=" => $_REQUEST['id']), TB_COUNTRIES );        
        
        $arr_currency = array( "name"=>$_POST["currency_name"], "currency_code"=>$_POST["currency_code"], "symbol"=>$_POST["symbol"] );
        updateqry( $arr_currency, array("id="=>$currency_id), TB_CURRENCY );
        
        $arr_branch = array( "name"=>$_POST["branch_name"], "branch_code"=>$_POST["branch_code"] );
        updateqry( $arr_branch, array("id="=>$branch_code_id), TB_BRANCH_CODE );
        
        $arr_company = array( "name"=>$_POST["company_name"], "company_code"=>$_POST["company_code"] );
        updateqry( $arr_company, array("id="=>$company_id), TB_COMPANIES );
        
        $arr_shipping = array( "name"=>$_POST['shipping_line_name'], "shipping_line_code"=>$_POST["shipping_line_code"] );
        updateqry( $arr_shipping, array("id="=>$shipping_line_id), TB_SHIPPING_LINE );
        
    } else {
        
        $arr_currency = array( "name"=>$_POST["currency_name"], "currency_code"=>$_POST["currency_code"], "symbol"=>$_POST["symbol"], "created_at"=>date('Y-m-d h:i:s') );
        insertqry($arr_currency, TB_CURRENCY);
        $inserte_currency_id = getfieldmaxvalue('id', TB_CURRENCY);
        
        $arr_branch = array( "name"=>$_POST["branch_name"], "branch_code"=>$_POST["branch_code"], "created_at"=>date('Y-m-d h:i:s') );
        insertqry($arr_branch, TB_BRANCH_CODE);
        $inserte_branch_id = getfieldmaxvalue('id', TB_BRANCH_CODE);
        
        $arr_company = array( "name"=>$_POST["company_name"], "company_code"=>$_POST["company_code"], "created_at"=>date('Y-m-d h:i:s') );
        insertqry($arr_company, TB_COMPANIES);
        $inserte_companies_id = getfieldmaxvalue('id', TB_COMPANIES);
        
        $arr_shipping = array( "name"=>$_POST['shipping_line_name'], "shipping_line_code"=>$_POST["shipping_line_code"], "created_at"=>date('Y-m-d h:i:s') );
        insertqry($arr_shipping, TB_SHIPPING_LINE);
        $inserte_shipping_id = getfieldmaxvalue('id', TB_SHIPPING_LINE);       
        
        
        $arr = array( "name"=>$_POST['country_name'], "country_code"=>$_POST['country_code'], "currency_id"=>$inserte_currency_id, "branch_code_id"=>$inserte_branch_id,
                      "company_id"=>$inserte_companies_id, "shipping_line_id"=>$inserte_shipping_id, "created_at"=>date('Y-m-d h:i:s') );  
        
        $insert = insertqry($arr, TB_COUNTRIES);
        $inserte_country = getfieldmaxvalue('id', TB_COUNTRIES);
        
        $arr_coun = array( "country_id"=>$inserte_country );
        $update = updateqry( $arr_coun, array("id="=>$inserte_currency_id), TB_CURRENCY );
        
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