<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Seal Numbers";
    $listpagename = SA_SEAL_NUMBERS_LIST;
    $table = TB_SEAL_NUMBERS;
    $created_at = date('Y-m-d H:i:s');
   
    if ($_REQUEST['id']) {
        
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));

        $country_id = $data['country_id'];
        $seal_number = $data['seal_number'];
        $created_at = date( 'd F, Y', strtotime($data['created_at']) );        
        
    } else {
        
        $country_id = $_REQUEST['country_id'];
        $seal_number = $_REQUEST['seal_number'];
        
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
                                                                            <option value="">Country</option>
                                                                            <?php
                                                                            $sel_contries = selectqry('*', TB_COUNTRIES);
                                                                            $selected = "";
                                                                            while ($rowc = mysqli_fetch_assoc($sel_contries)):
                                                                                if( $rowc['id'] == $country_id ):
                                                                                    echo '<option value="'.$rowc['id'].'" selected >'.$rowc['name'].'</option>';
                                                                                else:
                                                                                    echo '<option value="'.$rowc['id'].'">'.$rowc['name'].'</option>';
                                                                                endif;
                                                                            endwhile;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div id="label_top_div">
                                                                <?php
                                                                $sn = explode(',', $seal_number);
                                                                $i = 1;
                                                                $tot_count = 1;
                                                                if( count($sn) > 1 ){
                                                                    $tot_count = count($sn);
                                                                }
                                                                foreach($sn as $tmp) :  ?>
                                                                    <div class="form-group row" id="seal_number_div_<?php echo $i;?>" >
                                                                        <label class="col-sm-2 form-control-label">Label <?php echo $i;?></label>
                                                                        <div class="col-sm-4">
                                                                            <div class="input-group">                         
                                                                                <input type="text" name="seal_number[]" class="form-control" value="<?php echo $tmp; ?>" > 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <button class="btn btn-danger delete_label" type="button" data-del_counter="<?php echo $i;?>" onclick="deleteLabel(<?php echo $i;?>);" > 
                                                                                <i class="la la-remove"></i> Delete
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                <?php    
                                                                $i++;
                                                                endforeach;
                                                                ?>
                                                            </div>    
                                                            <br>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4"></div>
                                                                <div class="col-sm-4">
                                                                    <button class="btn btn-primary" type="button" id="add_more_seal_no" data-counter="<?php echo $tot_count;?>" onclick="manageCounter();" > <i class="la la-plus"></i> Add More Seal Number</button>
                                                                </div>
                                                                <div class="col-sm-4"></div> 
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
                    chk['s:country_id'] = " country";
                    
                    if (check(chk, 1))
                        document.mainform.submit();
                    
                }
                function manageCounter(){
                    
                    var fcounter = parseInt( $('#add_more_seal_no').attr('data-counter') );
                    var counter = fcounter + 1;
                    $('#add_more_seal_no').attr('data-counter', counter);
                    
                    var node = '<div class="form-group row" id="seal_number_div_'+counter+'" ><label class="col-sm-2 form-control-label">Label '+counter+' </label><div class="col-sm-4"><div class="input-group"><input type="text" name="seal_number[]" id="seal_number_'+counter+'" class="form-control"></div></div><div class="col-sm-4"><button class="btn btn-danger" type="button" data-del_counter="'+counter+'" onclick="deleteLabel('+counter+');" ><i class="la la-remove"></i>Delete</button></div></div>';   
                    $("#label_top_div .row").last().after(node);
                    
                }
                function deleteLabel(counter){
                    
                    var tmp = '#seal_number_div_'+counter;
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
       
        $seal_number = implode(',', $_POST['seal_number']);        
        $arr = array( "country_id"=>$_POST['country_id'], "seal_number"=>$seal_number );            
        $update = updateqry( $arr, array("id=" => $_REQUEST['id']), $table );        
        
    } else {
        
        $seal_number = implode(',', $_POST['seal_number']);
        $arr = array( "country_id"=>$_POST['country_id'], "seal_number"=>$seal_number, "created_at"=>date('Y-m-d h:i:s') );  
        $insert = insertqry($arr, $table);
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