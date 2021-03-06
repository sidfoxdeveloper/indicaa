<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) { ?>
    <?php
    $pagename = "Container";
    $editpagename = CM_CONTAINER_TWO_EDIT.'&id='.$_REQUEST['id'];
    $listpagename = CM_CONTAINER_THREE_EDIT.'?true&id='.$_REQUEST['id'];
    $back_page = CM_CONTAINER_ONE_EDIT.'?true&id='.$_REQUEST['id'];
    $table = TB_CONTAINERS;
    $created_at = date('Y-m-d H:i:s');
    
    if ($_REQUEST['id']) {
        
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
       
        $container_id = $_REQUEST['id'];
        $net_weight = $data['net_weight'];
        $created_at = date( 'Y-m-d', strtotime($data['created_at']) );
        
    } else {
        
        $container_id = $_REQUEST['id'];
        $net_weight = $_REQUEST['net_weight'];
        
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
                .dark{
                    background-color:#efefef !important;
                }
            </style>
            
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
        <body class="customer-add-page invoice-list-page ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> 
            <!-- remove ks-page-header-fixed to unfix header -->
            <?php include('includes/header.php'); ?>
            <div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs"> 
                 <?php include('includes/sidebar.php'); ?>
                <div class="ks-column ks-page">
                    <div class="ks-page-header">
                        <section class="ks-title">
                            <h3>
                                <?php //echo $pagetype . ' ' . $pagename; ?>
                                VERIFY CONTAINER &nbsp;&nbsp;&nbsp;#<?php echo $container_number;?>
                            </h3>
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
                                                        
                                                        <div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-3 form-control-label"></label>
                                                                <div class="col-sm-4 text-center">
                                                                    <strong>Values enter by INSPECTOR</strong>
                                                                </div>
                                                                <div class="col-sm-4 text-center">
                                                                    <strong>BY COUNTRY MANAGER</strong>
                                                                </div>
                                                            </div>
                                                            
                                                                <!-- 1  Multiple-image_stock_pile images upload -->
                                                                <div class="form-group row">
                                                                    <label for="select_image_stock_pile" class="col-sm-3 form-control-label">Stock Pile Image</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="mydropzone_stock_pile mydropzone">
                                                                            <?php
                                                                            $selimages_stock_pile = selectqry( '*', TB_CONTAINER_IMAGES, array("container_id="=>$_REQUEST['id'], "image_status="=>"image_stock_pile") );
                                                                            if( mysqli_num_rows($selimages_stock_pile) > 0):
                                                                                $n = 0;
                                                                                while ($resimages = mysqli_fetch_array($selimages_stock_pile)) {
                                                                                    if( !isEmpty($resimages['image']) ):
                                                                                    ?>
                                                                                        <div class="dz-preview dz-processing dz-image-preview dz-success" id="<?php echo 'img_stock_pile_' . $n; ?>">
                                                                                            <div class="dz-details">                            
                                                                                                <div data-dz-size="" class="dz-size"><?php echo filesizeformat(DIR_BASE.DIR_UPLOADS . $resimages['image'], 'MB'); ?></div>    
                                                                                                <img data-dz-thumbnail="" src="<?php echo URL_BASE.DIR_UPLOADS.$resimages['image']; ?>" width="40" height="40">
                                                                                            </div>                          														                            
                                                                                            <a href="javascript:undefined;" class="dz-remove dz-removeuploaded" image_status="<?php echo $resimages['image_status'];?>" imgname="<?php echo $resimages['image']; ?>" imgboxid="<?php echo 'img_stock_pile_' . $n; ?>">Remove file</a>
                                                                                        </div>
                                                                                     <?php
                                                                                    endif;
                                                                                    $n++;
                                                                                 }
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="input-group file-group">
                                                                            <a class="btn btn-primary btn-small fl" id="select_image_stock_pile" href="javascript:">
                                                                                <i class="la la-cloud-upload ks-icon"></i>
                                                                                <span class="ks-text"></span>Choose file
                                                                            </a>
                                                                            <input type="hidden" name="images_stock_pile" id="images_stock_pile" value="" />
                                                                        </div>
                                                                    </div>   
                                                                </div>                                                            
                                                                <!-- 2  Multiple: images_empty_container -->
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-3 form-control-label">Empty Container Images</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="mydropzone_empty_container mydropzone">
                                                                            <?php
                                                                            $sel_images_empty_container = selectqry( '*', TB_CONTAINER_IMAGES, array("container_id="=>$_REQUEST['id'], "image_status="=>"image_empty_container") );
                                                                            if( mysqli_num_rows($sel_images_empty_container) > 0):
                                                                                $n = 0;
                                                                                while ($resimages = mysqli_fetch_array($sel_images_empty_container)) {
                                                                                    if( !isEmpty($resimages['image']) ):
                                                                                    ?>
                                                                                        <div class="dz-preview dz-processing dz-image-preview dz-success" id="<?php echo 'img' . $n; ?>">
                                                                                            <div class="dz-details">
                                                                                                <div data-dz-size="" class="dz-size"><?php echo filesizeformat(DIR_BASE.DIR_UPLOADS . $resimages['image'], 'MB'); ?></div>    
                                                                                                <img data-dz-thumbnail="" src="<?php echo URL_BASE.DIR_UPLOADS.$resimages['image']; ?>" width="40" height="40">
                                                                                            </div>
                                                                                            <a href="javascript:undefined;" class="dz-remove dz-removeuploaded" image_status="<?php echo $resimages['image_status'];?>" imgname="<?php echo $resimages['image']; ?>" imgboxid="<?php echo 'img' . $n; ?>">Remove file</a>
                                                                                        </div>
                                                                                     <?php
                                                                                    endif;
                                                                                    $n++;
                                                                                 }
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="input-group file-group">
                                                                            <a class="btn btn-primary btn-small fl" id="select_image_empty_container" href="javascript:">
                                                                                <i class="la la-cloud-upload ks-icon"></i>
                                                                                <span class="ks-text"></span>Choose file
                                                                            </a>
                                                                            <input type="hidden" name="images_empty_container" id="images_empty_container" value="" />
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                
                                                                <!-- 3 Multiple: images_container_loading -->
                                                                <div class="form-group row">
                                                                    <label for="images_container_loading" class="col-sm-3 form-control-label">Container Loading Image</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="mydropzone_container_loading mydropzone">
                                                                            <?php
                                                                            $sel_images_container_loading = selectqry( '*', TB_CONTAINER_IMAGES, array("container_id="=>$_REQUEST['id'], "image_status="=>"image_container_loading") );
                                                                            if( mysqli_num_rows($sel_images_container_loading) > 0):
                                                                                $n = 0;
                                                                                while ($resimages = mysqli_fetch_array($sel_images_container_loading)) {
                                                                                    if( !isEmpty($resimages['image']) ):
                                                                                    ?>
                                                                                        <div class="dz-preview dz-processing dz-image-preview dz-success" id="<?php echo 'img' . $n; ?>">
                                                                                            <div class="dz-details">
                                                                                                <div data-dz-size="" class="dz-size"><?php echo filesizeformat(DIR_BASE.DIR_UPLOADS . $resimages['image'], 'MB'); ?></div>    
                                                                                                <img data-dz-thumbnail="" src="<?php echo URL_BASE.DIR_UPLOADS.$resimages['image']; ?>" width="40" height="40">
                                                                                            </div>
                                                                                            <a href="javascript:undefined;" class="dz-remove dz-removeuploaded" image_status="<?php echo $resimages['image_status'];?>" imgname="<?php echo $resimages['image']; ?>" imgboxid="<?php echo 'img' . $n; ?>">Remove file</a>
                                                                                        </div>
                                                                                     <?php
                                                                                    endif;
                                                                                    $n++;
                                                                                 }
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="input-group file-group">
                                                                            <a class="btn btn-primary btn-small fl" id="select_images_container_loading" href="javascript:">
                                                                                <i class="la la-cloud-upload ks-icon"></i>
                                                                                <span class="ks-text"></span>Choose file
                                                                            </a>
                                                                            <input type="hidden" name="images_container_loading" id="images_container_loading" value="" />
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                
                                                                <!-- 4 Multiple: images_container_seal -->
                                                                <div class="form-group row">
                                                                    <label for="images_container_seal" class="col-sm-3 form-control-label">Container Seal Image</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="mydropzone_container_seal mydropzone">
                                                                            <?php
                                                                            $sel_images_container_seal = selectqry( '*', TB_CONTAINER_IMAGES, array("container_id="=>$_REQUEST['id'], "image_status="=>"image_container_seal") );
                                                                            if( mysqli_num_rows($sel_images_container_seal) > 0):
                                                                                $n = 0;
                                                                                while ($resimages = mysqli_fetch_array($sel_images_container_seal)) {
                                                                                    if( !isEmpty($resimages['image']) ):
                                                                                    ?>
                                                                                        <div class="dz-preview dz-processing dz-image-preview dz-success" id="<?php echo 'img' . $n; ?>">
                                                                                            <div class="dz-details">
                                                                                                <div data-dz-size="" class="dz-size"><?php echo filesizeformat(DIR_BASE.DIR_UPLOADS . $resimages['image'], 'MB'); ?></div>
                                                                                                <img data-dz-thumbnail="" src="<?php echo URL_BASE.DIR_UPLOADS.$resimages['image']; ?>" width="40" height="40">
                                                                                            </div>
                                                                                            <a href="javascript:undefined;" class="dz-remove dz-removeuploaded" image_status="<?php echo $resimages['image_status'];?>" imgname="<?php echo $resimages['image']; ?>" imgboxid="<?php echo 'img' . $n; ?>">Remove file</a>
                                                                                        </div>
                                                                                     <?php
                                                                                    endif;
                                                                                    $n++;
                                                                                 }
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="input-group file-group">
                                                                            <a class="btn btn-primary btn-small fl" id="select_images_container_seal" href="javascript:">
                                                                                <i class="la la-cloud-upload ks-icon"></i>
                                                                                <span class="ks-text"></span>Choose file
                                                                            </a>
                                                                            <input type="hidden" name="images_container_seal" id="images_container_seal" value="" />
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                
                                                                <!-- 5 Multiple: images_documents -->
                                                                <div class="form-group row">
                                                                    <label for="images_documents" class="col-sm-3 form-control-label">Container Document Image</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="mydropzone_images_documents mydropzone">
                                                                            <?php
                                                                            $sel_images_documents = selectqry( '*', TB_CONTAINER_IMAGES, array("container_id="=>$_REQUEST['id'], "image_status="=>"image_documents") );
                                                                            if( mysqli_num_rows($sel_images_documents) > 0):
                                                                                $n = 0;
                                                                                while ($resimages = mysqli_fetch_array($sel_images_documents)) {
                                                                                    if( !isEmpty($resimages['image']) ):
                                                                                    ?>
                                                                                        <div class="dz-preview dz-processing dz-image-preview dz-success" id="<?php echo 'img' . $n; ?>">
                                                                                            <div class="dz-details">
                                                                                                <div data-dz-size="" class="dz-size"><?php echo filesizeformat(DIR_BASE.DIR_UPLOADS . $resimages['image'], 'MB'); ?></div>
                                                                                                <img data-dz-thumbnail="" src="<?php echo URL_BASE.DIR_UPLOADS.$resimages['image']; ?>" width="40" height="40">
                                                                                            </div>
                                                                                            <a href="javascript:undefined;" class="dz-remove dz-removeuploaded" image_status="<?php echo $resimages['image_status'];?>" imgname="<?php echo $resimages['image']; ?>" imgboxid="<?php echo 'img' . $n; ?>">Remove file</a>
                                                                                        </div>
                                                                                     <?php
                                                                                    endif;
                                                                                    $n++;
                                                                                 }
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="input-group file-group">
                                                                            <a class="btn btn-primary btn-small fl" id="select_images_documents" href="javascript:">
                                                                                <i class="la la-cloud-upload ks-icon"></i>
                                                                                <span class="ks-text"></span>Choose file
                                                                            </a>
                                                                            <input type="hidden" name="images_documents" id="images_documents" value="" />
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                        
                                                                        
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <a class="btn btn-primary" href="<?php echo URL_BASEADMIN . $back_page; ?>">Back</a>
                                                                    </div>
                                                                    <div class="col-sm-6 text-right">
                                                                        <button class="btn btn-success right" type="button" onclick="return savennew(0);">Next</button>
                                                                    </div>                                                                    
                                                                </div>
                                                        
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="addnew" id="addnew" value="0" />
                                                <input type="submit" style="display:none" name="hidesubmit" />                                
                                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                $(".calendar").flatpickr();

                //image_stock_pile
                $("#select_image_stock_pile").dropzone({        
                        url: "<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-upload.php",
                        paramName: "myfile",
                        uploadMultiple: true,
                        maxFilesize: 5, //MB
                        addRemoveLinks: true,
                        acceptedFiles: 'image/*',
                        previewsContainer: '.mydropzone_stock_pile',
                        accept: function (file, done)
                        {
                            done(); // to allow process
                            var filestr = $("#images_stock_pile").val();
                            if (filestr != '')
                                filestr = filestr + '::' + file.name;
                            else
                                filestr = file.name;
                            $("#images_stock_pile").val(filestr);
                        },
                        removedfile: function (file)
                        {
                            $.post('<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-remove.php?file=' + file.name, function (retdata) {
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            });
                        }
                });
                //select_image_empty_container
                $("#select_image_empty_container").dropzone({        
                        url: "<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-upload.php",
                        paramName: "myfile",
                        uploadMultiple: true,
                        maxFilesize: 5, //MB
                        addRemoveLinks: true,
                        acceptedFiles: 'image/*',
                        previewsContainer: '.mydropzone_empty_container',
                        accept: function (file, done)
                        {
                            done(); // to allow process
                            var filestr = $("#images_empty_container").val();
                            if (filestr != '')
                                filestr = filestr + '::' + file.name;
                            else
                                filestr = file.name;
                            $("#images_empty_container").val(filestr);
                        },
                        removedfile: function (file)
                        {
                            $.post('<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-remove.php?file=' + file.name, function (retdata) {
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            });
                        }
                });
                //select_images_container_loading
                $("#select_images_container_loading").dropzone({        
                        url: "<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-upload.php",
                        paramName: "myfile",
                        uploadMultiple: true,
                        maxFilesize: 5, //MB
                        addRemoveLinks: true,
                        acceptedFiles: 'image/*',
                        previewsContainer: '.mydropzone_container_loading',
                        accept: function (file, done)
                        {
                            done(); // to allow process
                            var filestr = $("#images_container_loading").val();
                            if (filestr != '')
                                filestr = filestr + '::' + file.name;
                            else
                                filestr = file.name;
                            $("#images_container_loading").val(filestr);
                        },
                        removedfile: function (file)
                        {
                            $.post('<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-remove.php?file=' + file.name, function (retdata) {
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            });
                        }
                });
                //select_images_container_seal
                $("#select_images_container_seal").dropzone({        
                        url: "<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-upload.php",
                        paramName: "myfile",
                        uploadMultiple: true,
                        maxFilesize: 5, //MB
                        addRemoveLinks: true,
                        acceptedFiles: 'image/*',
                        previewsContainer: '.mydropzone_container_seal',
                        accept: function (file, done)
                        {
                            done(); // to allow process
                            var filestr = $("#images_container_seal").val();
                            if (filestr != '')
                                filestr = filestr + '::' + file.name;
                            else
                                filestr = file.name;
                            $("#images_container_seal").val(filestr);
                        },
                        removedfile: function (file)
                        {
                            $.post('<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-remove.php?file=' + file.name, function (retdata) {
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            });
                        }
                });
                //select_images_documents
                $("#select_images_documents").dropzone({        
                        url: "<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-upload.php",
                        paramName: "myfile",
                        uploadMultiple: true,
                        maxFilesize: 5, //MB
                        addRemoveLinks: true,
                        acceptedFiles: 'image/*',
                        previewsContainer: '.mydropzone_images_documents',
                        accept: function (file, done)
                        {
                            done(); // to allow process
                            var filestr = $("#images_documents").val();
                            if (filestr != '')
                                filestr = filestr + '::' + file.name;
                            else
                                filestr = file.name;
                            $("#images_documents").val(filestr);
                        },
                        removedfile: function (file)
                        {
                            $.post('<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>dz-remove.php?file=' + file.name, function (retdata) {
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            });
                        }
                });
                
                //Remove image
                $(".dz-removeuploaded").click(function () {
                    var myobj = $(this);
                    $.post('<?php echo URL_BASEADMIN . DIR_INCLUDES; ?>container_ajax.php?ptype=edit&type=removeimage&image_status=' + myobj.attr('image_status') + '&sid=<?php echo $_REQUEST['id']; ?>&name=' + myobj.attr('imgname'), function (retdata) {
                        var box = myobj.attr('imgboxid');
                        $('#' + box).remove();
                    });
                });
                $('a[rel=viewimage]').fancybox({
                    buttons: [
                        'close'
                    ],
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
    
    if ($_REQUEST['id']) {
      
        $arr =  array();
        $arr['net_weight'] = "Test step-2";
                
        if( count($arr) > 0 ):
            $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
        endif;
        
                       
    } 
    
    $updateid = ($_REQUEST['id']) ? $_REQUEST['id'] : $insertedid;
        
    /* For Insert Images for stock pile */
    $tmpimages = explode('::', $_POST['images_stock_pile']);
        if (count($tmpimages) > 0)
            $images_stock_pile = movetmpfiles($tmpimages);
        
    if (count($images_stock_pile) > 0) {
        foreach ($images_stock_pile as $key => $val) {
            insertqry(array("container_id"=>$updateid, "image"=>$val, "image_status"=>'image_stock_pile'), TB_CONTAINER_IMAGES);
        }
    }
    
    /* For Insert images_empty_container */
    $tmpimages = explode('::', $_POST['images_empty_container']);
        if (count($tmpimages) > 0)
            $images_empty_container = movetmpfiles($tmpimages);
        
    if (count($images_empty_container) > 0) {
        foreach ($images_empty_container as $key => $val) {
            insertqry(array("container_id"=>$updateid, "image"=>$val, "image_status"=>'image_empty_container'), TB_CONTAINER_IMAGES);
        }
    }
    
    /* For Insert select_images_container_loading */
    $tmpimages = explode('::', $_POST['images_container_loading']);
        if (count($tmpimages) > 0)
            $images_container_loading = movetmpfiles($tmpimages);
        
    if (count($images_container_loading) > 0) {
        foreach ($images_container_loading as $key => $val) {
            insertqry(array("container_id"=>$updateid, "image"=>$val, "image_status"=>'image_container_loading'), TB_CONTAINER_IMAGES);
        }
    }
    
    /* For Insert images_container_seal */
    $tmpimages = explode('::', $_POST['images_container_seal']);
        if (count($tmpimages) > 0)
            $images_container_seal = movetmpfiles($tmpimages);
        
    if (count($images_container_seal) > 0) {
        foreach ($images_container_seal as $key => $val) {
            insertqry(array("container_id"=>$updateid, "image"=>$val, "image_status"=>'image_container_seal'), TB_CONTAINER_IMAGES);
        }
    }
    
    /* For Insert select_images_documents */
    $tmpimages = explode('::', $_POST['images_documents']);
        if (count($tmpimages) > 0)
            $images_documents = movetmpfiles($tmpimages);
        
    if (count($images_documents) > 0) {
        foreach ($images_documents as $key => $val) {
            insertqry(array("container_id"=>$updateid, "image"=>$val, "image_status"=>'image_documents'), TB_CONTAINER_IMAGES);
        }
    }
        

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