<?php

ini_set('display_errors',0);
error_reporting(E_ALL|E_STRICT);
require_once('PHPExcel-1.8/Classes/PHPExcel.php');

include('includes/script_top.php');

if ($permission['view']) {

    
    if( !isEmpty($_REQUEST["export_data"]) && $_REQUEST["export_data"] == 'export_data' ) {

            $qry = " select c.*, u.`first_name`, u.`last_name`, s.`name` as supplier_name, y.`name` as yard_name, cn.`name` as country_name, com.`name` as company_name, ";
            $qry .= " cs.`name` as container_size, ed.`name` as empty_depot, sl.`name` as shipping_line, bc.`name` as branch_code, sa.`name` as shipping_agent, ";
            $qry .= " mc.`material_code`, bp.`name` as base_port_used_for_freight_costing ";
            $qry .= " from `".TB_CONTAINERS."` as c ";
            $qry .= " LEFT JOIN `".TB_USERS."` as u ON u.`id`=c.`user_id` ";
            $qry .= " LEFT JOIN `".TB_SUPPLIER."` as s ON s.`id`=c.`supplier_id` ";
            $qry .= " LEFT JOIN `".TB_YARDS."` as y ON y.`id`=c.`yard_id` ";
            $qry .= " LEFT JOIN `".TB_COUNTRIES."` as cn ON cn.`id`=c.`country_id` ";
            $qry .= " LEFT JOIN `".TB_COMPANIES."` as com ON com.`id`=c.`company_id` ";
            $qry .= " LEFT JOIN `".TB_CONTAINER_SIZE."` as cs ON cs.`id`=c.`container_size_id` ";
            $qry .= " LEFT JOIN `".TB_EMPTY_DEPOT."` as ed ON ed.`id`=c.`empty_depot_name_id` ";
            $qry .= " LEFT JOIN `".TB_SHIPPING_LINE."` as sl ON sl.`id`=c.`shipping_line_id` ";
            $qry .= " LEFT JOIN `".TB_BRANCH_CODE."` as bc ON bc.`id`=c.`branch_code_id` ";
            $qry .= " LEFT JOIN `".TB_SHIPPING_AGENT."` as sa ON sa.`id`=c.`shipping_agent_id` ";
            $qry .= " LEFT JOIN `".TB_MATERIAL_CODE."` as mc ON mc.`id`=c.`material_code_id` ";
            $qry .= " LEFT JOIN `".TB_BASE_PORT_USED_FOR_FREIGHT_COSTING."` as bp ON bp.`id`=c.`base_port_used_for_freight_costing` ";
            $sel = mysqli_query($con, $qry);
            
            $headstyle = array(
                'font' => array( 'bold' => true, 'size' => 8, 'name' => 'Arial', 'color'=> array('argb' => '0025396E') ),
                'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color'=> array('argb' => '00F0F0F0') ),
                'borders' => array( 'allborders' => array( 'style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00D0D7E5') ) )
            );

            $textstyle = array( 'font' => array( 'size' => 8,'name' => 'Arial', ) );

            // Create new PHPExcel object
            $objPHPExcel = new PHPExcel();

            // Set document properties
            $objPHPExcel->getProperties()->setCreator(SITENAME)								 
                ->setTitle(SITENAME." :: Continer")
                ->setSubject("Continer")
                ->setDescription("Continer")
                ->setKeywords("Continer")
                ->setCategory("Continer");		

            // Add some data
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'DATE')
                    ->setCellValue('B1', 'CONTAINER NO')
                    ->setCellValue('C1', 'SUPPLIER')
                    ->setCellValue('D1', 'YARD')
                    ->setCellValue('E1', 'INSPECTOR')
                    ->setCellValue('F1', 'STATUS')
                    ->setCellValue('G1', 'COUNTRY')
                    ->setCellValue('H1', 'COMPANY')
                    ->setCellValue('I1', 'CONTAINER SIZE')
                    ->setCellValue('J1', 'EMPTY DEPOT')
                    ->setCellValue('K1', 'SHIPPING LINE')
                    ->setCellValue('L1', 'BRANCH CODE')
                    ->setCellValue('M1', 'SHIPPING AGENT')
                    ->setCellValue('N1', 'EMPTY CONTAINER RECEIVED')
                    ->setCellValue('O1', 'CONTAINER PLACED IN YARD')
                    ->setCellValue('P1', 'TARE WEIGHT')
                    ->setCellValue('Q1', 'GROSS WEIGHT')
                    ->setCellValue('R1', 'NET WEIGHT(MT)-SUPPLIER')
                    ->setCellValue('S1', 'NET WEIGHT(MT)-YARD')
                    ->setCellValue('T1', 'PAY LOAD(MT)')
                    ->setCellValue('U1', 'MATERIAL CODE')
                    ->setCellValue('V1', 'MATERIAL DESCRIPTION')
                    ->setCellValue('W1', 'MATERIAL QUALITY CODE')
                    ->setCellValue('X1', 'SEAL NUMBER')
                    ->setCellValue('Y1', 'REMARKS')
                    ->setCellValue('Z1', 'EXCHANGE RATE')
                    ->setCellValue('AA1', 'TRANSPORTER')
                    ->setCellValue('AB1', 'SHIPPED TO STORAGE')
                    ->setCellValue('AC1', 'STORAGE')
                    ->setCellValue('AD1', 'SHIFTED TO TERMINAL')
                    ->setCellValue('AE1', 'TERMINAL')
                    ->setCellValue('AF1', 'SHIFTED TO PORT')
                    ->setCellValue('AG1', 'PORT OF LOADING')
                    ->setCellValue('AH1', 'GRN NUMBER')
                    ->setCellValue('AI1', 'GRN DATE')
                    ->setCellValue('AJ1', 'BASE PORT FOR FREIGHT COSTING')
                    ->setCellValue('AK1', 'LS NUMBER')
                    ->setCellValue('AL1', 'VO NUMBER')
                    ->setCellValue('AM1', 'VESSEL NAME')
                    ->setCellValue('AN1', 'VOYAGE')
                    ->setCellValue('AO1', 'SOB DATE')
                    ->setCellValue('AP1', 'BLI DATE')
                    ->setCellValue('AQ1', 'BLI NUMBER')
                    ->setCellValue('AR1', 'ORIGINAL BL NUMBER')
                    ->setCellValue('AS1', 'HO ORDER NUMBER')
                    ->setCellValue('AT1', 'EX YARD PRICE')
                    ->setCellValue('AU1', 'CNF1')
                    ->setCellValue('AV1', 'CNF2')
                    ->setCellValue('AW1', 'CNF3')
                    ->setCellValue('AX1', 'FOB1')
                    ->setCellValue('AY1', 'FOB2')
                    ->setCellValue('AZ1', 'FOB3')
                    ->setCellValue('BA1', 'FCA1')
                    ->setCellValue('BB1', 'FCA2')
                    ->setCellValue('BC1', 'FCA3')
                    
                    ->getStyle("A1:BC1")->applyFromArray($headstyle);
            $n=2;
        
            while($row=mysqli_fetch_array($sel)) :

                    $status = '';            
                    if($row['status'] == 'draft'):
                            $status = "Draft";
                    elseif($row['status'] == 'pending_upload'): 
                            $status = "Under Loading";
                    elseif($row['status'] == 'not_verified_by_country_manager'):    
                            $status = "Not verified";
                    elseif($row['status'] == 'verified_by_country_manager'):        
                            $status = "Verified";
                    endif;
                    
                    $cnf1 = fetchqry( '*', TB_CURRENCY, array('id='=>$row['cnf1']) );
                    $cnf2 = fetchqry( '*', TB_CURRENCY, array('id='=>$row['cnf2']) );
                    $cnf3 = fetchqry( '*' , TB_CURRENCY, array('id='=>$row['cnf3']) );
                    $fob1 = fetchqry( '*' , TB_CURRENCY, array('id='=>$row['fob1']) );
                    $fob2 = fetchqry( '*' , TB_CURRENCY, array('id='=>$row['fob2']) );
                    $fob3 = fetchqry( '*' , TB_CURRENCY, array('id='=>$row['fob3']) );
                    $fca1 = fetchqry( '*' , TB_CURRENCY, array('id='=>$row['fca1']) );
                    $fca2 = fetchqry( '*' , TB_CURRENCY, array('id='=>$row['fca2']) );
                    $fca3 = fetchqry( '*' , TB_CURRENCY, array('id='=>$row['fca3']) );
            
                    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$n, date( 'd/m/Y', strtotime($row['created_at'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$n, $row['container_number']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$n, $row['supplier_name']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$n, $row['yard_name']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$n, $row['first_name'] .' '.$row['last_name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$n, $status );
                    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$n, $row['country_name']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$n, $row['company_name']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$n, $row['container_size']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$n, $row['empty_depot']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$n, $row['shipping_line']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$n, $row['branch_code']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('M'.$n, $row['shipping_agent']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('N'.$n, date('d/m/Y', strtotime($row['empty_container_received'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('O'.$n, date('d/m/Y', strtotime($row['container_placed_yard'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('P'.$n, $row['tare_weight']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$n, $row['gross_weight']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('R'.$n, $row['net_weight_supplier']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('S'.$n, $row['net_weight_yard']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('T'.$n, $row['pay_load']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('U'.$n, $row['material_code']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('V'.$n, $row['material_description']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('W'.$n, $row['material_quality_code']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('X'.$n, $row['seal_number']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$n, $row['remarks']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$n, $row['exchange_rate']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$n, $row['transporter']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$n, date('d/m/Y', strtotime($row['shipped_to_storage'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AC'.$n, $row['storage']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AD'.$n, date('d/m/Y', strtotime($row['shifted_to_terminal'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AE'.$n, $row['terminal']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AF'.$n, date('d/m/Y', strtotime($row['shifted_to_port'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AG'.$n, $row['port_of_loading']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AH'.$n, $row['grn_number']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AI'.$n, date('d/m/Y', strtotime($row['grn_date'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AJ'.$n, $row['base_port_used_for_freight_costing']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AK'.$n, $row['ls_number']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AL'.$n, $row['vo_number']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AM'.$n, $row['vessel_name']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AN'.$n, $row['voyage']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AO'.$n, date('d/m/Y', strtotime($row['sob_date'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AP'.$n, date('d/m/Y', strtotime($row['bli_date'])) );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AQ'.$n, $row['bli_number']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AR'.$n, $row['original_bl_number']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AS'.$n, $row['ho_order_number']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AT'.$n, $row['ex_yard_price']);
                    $objPHPExcel->getActiveSheet()->SetCellValue('AU'.$n, $cnf1['name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AV'.$n, $cnf2['name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AW'.$n, $cnf3['name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AX'.$n, $fob1['name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AY'.$n, $fob2['name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('AZ'.$n, $fob3['name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('BA'.$n, $fca1['name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('BB'.$n, $fca2['name'] );
                    $objPHPExcel->getActiveSheet()->SetCellValue('BC'.$n, $fca3['name'] );
                    
                    $n++;
                    
            endwhile;		
            
            // Rename worksheet
            $objPHPExcel->getActiveSheet()->setTitle('Container Details');

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $objPHPExcel->setActiveSheetIndex(0);
            ob_end_clean();
            ob_start();

            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Container.xls"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;			

    } 
    //**-- Export complete --**//
    
    $pagename = "Containers";
    $listpagename = EMO_CONTAINERS_LIST;
    $editpagename = EMO_CONTAINER_ONE_EDIT;
    $viewpagename = EMO_CONTAINER_VIEW;
    $table = TB_CONTAINERS;
    
    /** On Delete Action **/
    if ($delete['id']) {
         //Unlink image       
        $data = fetchqry("*", $table, array("id="=>$delete['id']));
        //$image = $data['image'];
        //deletefile($image);
    }

    $Limit = DEFAULT_LIMIT;
    $qry = "select c.*, s.name as supplier_name from " . $table . " as c ";
    $qry .= " LEFT JOIN `".TB_USERS."` as u ON u.id=c.user_id";
    $qry .= " LEFT JOIN `".TB_SUPPLIER."` as s ON s.id=c.supplier_id";
    
    $qry .= " where 1 ";
    
    /** For Search **/
    if( !isEmpty($_REQUEST['search_text']) ):
        $qry .= "AND";
        $qry .= " c.`container_number` LIKE '%".$_REQUEST['search_text']."%'  ";
        //$qry .= " OR s.`name` LIKE '%".$_REQUEST['search_text']."%') ";
    endif;
    
    if( !isEmpty($_REQUEST['filter_date']) ):
        $qry .= "AND";
        $date = date('Y-m-d', strtotime($_REQUEST['filter_date']) );
        $qry .= " c.created_at >= '".$date."' ";
    endif;
    
    if( !isEmpty($_REQUEST['inspector_id']) ):
        $qry .= "AND";
        $qry .= " c.user_id = '".$_REQUEST['inspector_id']."' ";
    endif;

    /** For Group By * */
    $qry .= " group by c.id ";

    /** For Ordering * */
    $qry .= " order by c.id DESC ";

    $page = $_REQUEST['page'];
    $sel = mysqli_query($con, $qry);
    if ($page == "")
        $page = 1;
    $NumberOfResults = mysqli_num_rows($sel);
    $NumberOfPages = ceil($NumberOfResults / $Limit);
    $sel = mysqli_query($con, $qry . " LIMIT " . ($page - 1) * $Limit . ",$Limit");
    $display = mysqli_num_rows($sel);
    
    
    $totalContainers = $containersVerified = $containerNotVerified = 0;
    $cRes = selectqry( 'id', $table, array() );
    $totalContainers = mysqli_num_rows($cRes);
    $vcRes = selectqry( 'id', $table, array('status='=>'verified_by_country_manager') );
    $containersVerified = mysqli_num_rows($vcRes);
    $containerNotVerified = ( $totalContainers - $containersVerified );
    
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
                                    <h3 class="ks-main-title">Country Manager Dashboard</h3>
                            </div>
                            <div class="row">
                                <div class="ks-text-right">Containers not verified:  <strong class="btn btn-primary btn-sm"><?php echo $containerNotVerified; ?></strong> </div>
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
                                                <h5 class="ks-main-title">VIEW CONTAINERS</h5>
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
                                                <input type="text" name="filter_date" id="filter_date" class="form-control calendar" value="<?php echo $filter_date; ?>" placeholder="Date" > 
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
                                            </div>
                                        </div>
                                    </form>
                                    <form action="" method="get">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button class="btn btn-primary float-right" type="submit" name="export_data" value="export_data"> Export to Excel </button>
                                            </div>
                                        </div>    
                                    </form>    
                                    <!-- Filters -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card ks-card-widget ks-widget-table">
                                                <div class="card-block">
                                                    <table class="table ks-payment-table-invoicing">
                                                        <tbody>
                                                            <tr>
                                                                <th width="1">#</th>
                                                                <th>Date</th>
                                                                <th>Container No.</th>
                                                                <th>Supplier</th>
                                                                <th>Yard</th>
                                                                <th>NET. Weight</th>
                                                                <th>CM NAME</th>
                                                                <th>Status</th>
                                                                <th width="5%">Action</th>
                                                            </tr>
                                                            <?php
                                                            if (mysqli_num_rows($sel) > 0) {
                                                                $n = ($page - 1) * $Limit;
                                                                while ($row = mysqli_fetch_assoc($sel)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $i + 1; ?></td>
                                                                        <td><?php echo date( 'd/m/Y', strtotime($row['created_at']) );?></td>
                                                                        <td><?php echo $row['container_number']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $srow = fetchqry('*', TB_SUPPLIER, array('id='=>$row['supplier_id']) );
                                                                            echo $srow['name'];
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            $yrow = fetchqry('*', TB_YARDS, array('id='=>$row['yard_id']) );
                                                                            echo $yrow['name'];
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $row['net_weight_yard']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                                $qryi = " select u.`first_name`, u.`last_name` from `".TB_USERS."` as u ";
                                                                                $qryi .= " LEFT JOIN `".TB_USERS_GROUPS."` as ug ON ug.`id`=u.`users_groups_id` ";
                                                                                $qryi .= " LEFT JOIN `".TB_COUNTRIES."` as c ON c.`id`=u.`country_id` ";
                                                                                $qryi .= " WHERE `u`.`users_groups_id`='5' ";
                                                                                $qryiRes = mysqli_query($con, $qryi);
                                                                                $ins = mysqli_fetch_assoc($qryiRes);
                                                                                echo $ins['first_name'].' '.$ins['last_name']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                        <?php
                                                                            $status = $row['status'];
                                                                            if($status == 'draft'):
                                                                                echo '<button class="btn btn-default btn-sm col-sm-12" >Draft</button';
                                                                            elseif($status == 'pending_upload'):    
                                                                                echo '<button class="btn btn-primary btn-sm col-sm-12" >Pending Upload</button>';
                                                                            elseif($status == 'not_verified_by_country_manager'):    
                                                                                echo '<button class="btn btn-danger btn-sm col-sm-12" >Not verified</button>';
                                                                            elseif($status == 'verified_by_country_manager'):        
                                                                                echo '<button class="btn btn-success btn-sm col-sm-12" >Verified</button>';
                                                                            endif;
                                                                        ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <a href="<?php echo URL_BASEADMIN . $viewpagename . $paginationback . '&id=' . $row['id'] . '&page=' . $page; ?>" class="btn btn-default btn-sm" title="View" >View</a>  
                                                                            
                                                                            <?php 
                                                                            /*
                                                                            if($permission['edit']) { ?><a href="<?php echo URL_BASEADMIN . $editpagename . $paginationback . '&id=' . $row['id'] . '&page=' . $page; ?>" class="btn btn-primary btn-sm" title="Update" >Update</a>
                                                                            <?php } */ ?>   
                                                                            
                                                                            <?php
                                                                            $archieveUrl = '';
                                                                            $archieveClass = '';
                                                                            
                                                                            $selArchieve = selectqry( 'id', TB_CONTAINER_ARCHIEVE, array('container_id='=>$row['id']) );
                                                                            if( mysqli_num_rows($selArchieve) > 0 ): 
                                                                                $archieveUrl = '#';
                                                                                $archieveClass = 'btn-danger';
                                                                            else:
                                                                                $archieveUrl = 'archieve.php?true&id='.$row['id'].'&page=1';
                                                                                $archieveClass = 'btn-success';
                                                                            endif;
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td colspan="8" class="text-right">
                                                                    Total Weight:
                                                                </td>
                                                                <td class="text-right">
                                                                    <?php
                                                                        $qryNTWeight = 'SELECT sum(`net_weight_yard`) as tot_net_weight FROM `containers`';
                                                                        $qryNTWeightRes = mysqli_query($con, $qryNTWeight);
                                                                        $qryNTWeightRow = mysqli_fetch_assoc($qryNTWeightRes);
                                                                        echo $qryNTWeightRow['tot_net_weight'].'&nbsp; TN';
                                                                    ?>
                                                                </td>
                                                            </tr>        
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    if ($display <= 0)
                                                        //include(DIR_BASEADMIN . DIR_INCLUDES . INC_NORECORD);
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
                function isArchieved(){
                    alert("This Record Already Archieved.");
                }
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