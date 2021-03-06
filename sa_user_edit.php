<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) { ?>
    <?php
    $pagename = "User";
    $listpagename = SA_USER_LIST;
    $table = TB_USERS;
    $created_at = date('Y-m-d H:i:s');
    
    if ($_REQUEST['id']) {
        
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        $users_groups_id = $data['users_groups_id'];
        $country_id = $data['country_id'];
        $company_id = $data['company_id'];
        $yard_id = $data['yard_id'];
        $user_name = $data['user_name'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $status = $data['status'];
        $image = $data['image'];
        $location = $data['location'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $created_at = date( 'd F, Y', strtotime($data['created_at']) );        
        
    } else {
        
        $users_groups_id = $_POST['users_groups_id'];
        $country_id = $_POST['country_id'];
        $company_id = $_POST['company_id'];
        $yard_id = $_POST['yard_id'];
        $user_name = $_POST['user_name'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];
        $image = $_POST['image'];
        $location = $_POST['location'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        
    }
    
    if (strpos($_SERVER['REQUEST_URI'], "?true") != 0) {
        
        $temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?true"));
        $backurlfirstpart = substr($temp, strpos($temp, "?true"), strpos($temp, "&id"));
        $temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "&id") + 4);
        if (strpos($temp, "&") != 0)
            $backurllastpart = substr($temp, strpos($temp, "&"));
        $gobackurl = $backurlfirstpart . $backurllastpart;
        
    }
    else {
        $gobackurl = "?true";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <!-- BEGIN HEAD -->
        <head>
            <?php include('includes/head.php'); ?>  
            <style>
                tr > :first-child{
                    width: 25%;
                }
            </style>
            
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
                                                                <label for="users_groups_id" class="col-sm-2 form-control-label">Role</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <select name="users_groups_id" id="users_groups_id" class="form-control">
                                                                            <option value="6">Inspector</option>
                                                                            <?php /*
                                                                            <option value="">- - - Select User Role - - -</option>
                                                                            <option value="5">Country Manager</option>
                                                                            <option value="4">EMO Admin</option>
                                                                            <option value="3">Country Admin</option>
                                                                            <option value="2">Manager</option>
                                                                            <option value="1">Super Admin</option>
                                                                            */ ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="status" class="col-sm-2 form-control-label">Status</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">      
                                                                        <select name="status" id="status" class="form-control" onchange="limitOfDays();" >
                                                                            <option value="">- - - Select User Status - - -</option>                                                                          
                                                                            <option value="permanent" <?php if($status == 'permanent'){ echo 'selected'; } ?> >Permanent</option>
                                                                            <option value="limit_of_days" <?php if($status == 'limit_of_days'){ echo 'selected'; } ?> >Limit For Days</option>
                                                                            <option value="blocked" <?php if($status == 'blocked'){ echo 'selected'; } ?> >Blocked</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row" id="app_access_days_div" >
                                                                <label for="app_access_days" class="col-sm-2 form-control-label">App Access Days</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                         
                                                                        <input type="number" name="app_access_days" id="app_access_days" class="form-control" value="<?php if($app_access_days > 0){ echo $app_access_days; } else { echo "0"; } ?>" /> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
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
                                                                <label for="company_id" class="col-sm-2 form-control-label">Select Company</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <select name="company_id" id="company_id" class="form-control">
                                                                            <option value="">Select The Company</option>
                                                                            <?php
                                                                            $sel_companies = selectqry('*', TB_COMPANIES);
                                                                            while ($crow = mysqli_fetch_assoc($sel_companies)):
                                                                                $selected = "";
                                                                                if( $crow['id'] == $company_id ):
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
                                                                <label for="yard_id" class="col-sm-2 form-control-label">Select Yard</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <select name="yard_id" id="yard_id" class="form-control">
                                                                            <option value="">Select The Yard</option>
                                                                            <?php
                                                                            $sel_yards = selectqry('*', TB_YARDS);
                                                                            while ($crow = mysqli_fetch_assoc($sel_yards)):
                                                                                $selected = "";
                                                                                if( $crow['id'] == $yard_id ):
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
                                                                <label for="start_date" class="col-sm-2 form-control-label">Start Date</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="start_date" id="start_date" class="calendar form-control" placeholder="Enter Start Date" value="<?php echo date('Y-m-d', strtotime($start_date));?>"  > 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="end_date" class="col-sm-2 form-control-label">End Date</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="end_date" id="end_date" class="calendar form-control" placeholder="Enter End Date" value="<?php echo date('Y-m-d', strtotime($end_date));?>" >
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="user_name" class="col-sm-2 form-control-label">User Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                         
                                                                        <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $user_name; ?>" > 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="first_name" class="col-sm-2 form-control-label">First Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">         
                                                                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $first_name; ?>" > 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="last_name" class="col-sm-2 form-control-label">Last Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $last_name; ?>" > 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="email" class="col-sm-2 form-control-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>" > 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="phone" class="col-sm-2 form-control-label">Phone</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">    
                                                                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone; ?>" > 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if( isEmpty($_REQUEST['id']) ){ ?>
                                                                <div class="form-group row">
                                                                    <label for="password" class="col-sm-2 form-control-label">Password</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group">                                                               
                                                                            <input type="text" name="password" id="password" class="form-control" value="<?php echo $password; ?>" > 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="form-group row">
                                                                <label for="location" class="col-sm-2 form-control-label">Location</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <textarea id="location" name="location" class="form-control" rows="3"><?php echo $location; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="imagetrigger" class="col-sm-2 form-control-label">Image</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group file-group">
                                                                        <button id="imagetrigger" class="btn btn-primary" type="button">
                                                                            <span class="la la-cloud-upload ks-icon"></span>
                                                                            <span class="ks-text">Choose file</span>                                                                    
                                                                        </button>
                                                                        <span id="imagefilename" class="filepath"></span>                       
                                                                        <input type="file" name="image" id="image" value="" accept="image/*" style="display:none;" />                             
                                                                        <input type="hidden" name="himage" id="himage" value="<?php echo $image; ?>" />
                                                                    </div>
                                                                    <div class="input-group"><small>(Size: W 1770px X  H 853px)</small></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <?php
                                                            if ($image) {
                                                                ?>
                                                                <div class="form-group row">                                                            
                                                                    <label class="col-sm-2 form-control-label">&nbsp;</label>
                                                                    <div class="col-sm-10">                                                            	
                                                                        <div class="input-group">
                                                                            <a href="<?php echo URL_BASE . DIR_UPLOADS . $image; ?>" rel="viewimage"><img src="<?php echo URL_BASE . DIR_UPLOADS . $image; ?>" width="100"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            
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
            
            <script src="<?php echo URL_BASEADMIN; ?>libs/flatpickr/flatpickr.min.js"></script>
            <script src="<?php echo URL_BASEADMIN; ?>libs/prism/prism.js"></script>    
            <script>
                $('#app_access_days_div').hide();
                
                function limitOfDays() {                    
                    var status = jQuery('#status').val();
                    if(status == "limit_of_days") {
                        $('#app_access_days_div').show();
                    } else {
                        $('#app_access_days_div').hide();
                    }                    
                }
                
                function chkrequired() {
                    
                    var chk = new Array();
                    chk['s:users_groups_id'] = "Role.";
                    chk['s:status'] = "Status";
                    chk['t:user_name'] = "Username.";
                    chk['t:first_name'] = "First Name.";
                    chk['t:last_name'] = "Last Name.";
                    chk['t:phone'] = "Phone.";
                    
                    if (check(chk, 1))
                        document.mainform.submit();
                }
                
                //Date and Time Picker  
                $(".calendar").flatpickr({ 
                    dateFormat:"Y-m-d",
                });
                
                //CKEDITOR.replace('location', {toolbar: 'Basic', height: 180});
                $('#imagetrigger').click(function (e) {
                    $('#image').trigger('click');
                });
                $('#image').on('change', function () {
                    $('#imagefilename').html($(this).val());
                });
                
            </script>
            
        </body>
    </html>
    <?php
    /** Check Page Authantication **/
} else {
    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);
}
    
if (isset($_POST['addnew'])) {
    
    $image = uploadfile("image", $image, array("jpeg", "jpg", "gif", "png"));
    
    if ($_REQUEST['id']) {
        
        $arr = array(
            "users_groups_id"=>$_POST['users_groups_id'], 
            "country_id"=>$_POST['country_id'],
            "company_id"=>$_POST['company_id'],
            "yard_id"=>$_POST['yard_id'],
            "user_name"=>$_POST['user_name'],
            "first_name"=>$_POST['first_name'],
            "last_name"=>$_POST['last_name'],
            "email"=>$_POST['email'],
            "phone"=>$_POST['phone'], 
            "location"=>replacequoteb($_POST['location']),
            "image"=>$image, 
            "status"=>$_POST['status'],
            "app_access_days"=>$_POST['app_access_days'],
            "start_date"=> date( 'Y-m-d', strtotime($_POST['start_date']) ),
            "end_date"=> date( 'Y-m-d', strtotime($_POST['end_date']))            
        );    
        
        $update = updateqry($arr, array("id="=>$_REQUEST['id']), $table);        
        
    } else {
        
        $dQry = " SELECT id,email FROM ".$table." WHERE `email`='".$_REQUEST['email']."' OR `user_name`='".$_REQUEST['user_name']."' ";
        $dRes = mysqli_query($con, $dQry);
        
        if( mysqli_num_rows($dRes) ):
            
                $_SESSION['msg'] = 'User already registered, Plese try with another email and username |alert-error';    
                die;
        else:
            
            $tmp = array("created_at"=>date('Y-m-d h:i:s'));
            $carr = array_merge($arr, $tmp);        
            $insert = insertqry($carr, $table);  
            $insertedid = getfieldmaxvalue('id', $table); 
                
        endif;
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