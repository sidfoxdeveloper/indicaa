<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Material Code";
    $listpagename = SA_MATERIAL_CODE_LIST;
    $editpagename = SA_MATERIAL_CODE_EDIT;
    $table = TB_MATERIAL_CODE;
    $created_at = date('Y-m-d H:i:s');
   
    if ($_REQUEST['id']) {        
        
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        $material_name = $data['material_name'];
        $material_code = $data['material_code'];
        $material_code_description = $data['material_code_description'];
        $created_at = date( 'd F, Y', strtotime($data['created_at']) );
        
    } else {
        
        $material_name = $_REQUEST['material_name'];
        $material_code = $_REQUEST['material_code'];
        $material_code_description = $_REQUEST['material_code_description'];
        
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
                                                                <label for="material_name" class="col-sm-2 form-control-label">Material Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="material_name" id="material_name" class="form-control" value="<?php echo $material_name; ?>" placeholder="Material Name" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="material_code" class="col-sm-2 form-control-label">Material Code</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="material_code" id="material_code" class="form-control" value="<?php echo $material_code; ?>" placeholder="Material Code" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="material_code_description" class="col-sm-2 form-control-label">Material Description</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                         
                                                                        <textarea id="material_code_description" name="material_code_description" class="form-control" rows="3" value="<?php echo $material_code_description; ?>" ><?php echo $material_code_description; ?></textarea>
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
                    chk['t:material_name'] = "Material Name";
                    
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
    
     if ($_REQUEST['id']) {
         
        $arr = array( "material_name"=>$_POST['material_name'], "material_code"=>$_POST['material_code'], "material_code_description"=>$_POST['material_code_description'] );            
        $update = updateqry( $arr, array("id=" => $_REQUEST['id']), $table );        
        
    } else {
        
        $arr = array( "material_name"=>$_POST['material_name'], "material_code"=>$_POST['material_code'], "material_code_description"=>$_POST['material_code_description'], "created_at"=>date('Y-m-d h:i:s') );  
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