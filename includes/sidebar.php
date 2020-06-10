    <?php
    $CP = substr( $_SERVER['PHP_SELF'], strpos($_SERVER['PHP_SELF'], "indicaa") + strlen("/indicaa") );
?>
<div class="ks-column ks-sidebar ks-info">
    <div class="ks-wrapper ks-sidebar-wrapper">
        <ul class="nav nav-pills nav-stacked">
        <?php    
        /**
         * Manager 
        **/
        if( decode($_SESSION['groupuserid']) == 2 ): ?>
                
            <li class="nav-item">
               <a class="nav-link" href="<?php echo MA_HOME; ?>">
                   <span class="ks-icon la la-dashboard"></span>
                   <span>Manager Dashboard</span>
               </a>
            </li>
            
        <?php 
        endif;
        /**
         * Super Admin 
        **/
        if( decode($_SESSION['groupuserid']) == 1 ): ?>
            
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.SA_CONTAINER_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Containers</span>
                    </a>                    
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.SA_COUNTRY_LIST; ?>">
                        <span class="ks-icon la la-globe"></span>
                        <span>Country</span>
                    </a>                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_CONTAINER_SIZE_LIST; ?>">
                        <span class="ks-icon la la-barcode"></span>
                        <span>Container Sizes List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_MATERIAL_CODE_LIST; ?>">
                        <span class="ks-icon la la-barcode"></span>
                        <span>Material codes</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_SUPPLIER_LIST; ?>">
                        <span class="ks-icon la la-user"></span>
                        <span>Supplier</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_SHIPPING_AGENT_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Shipping Agents</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_TRANSPORTER_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Transporter</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_STORAGE_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Storages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_TERMINAL_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Terminals</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_PORT_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Port</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_BASEADMIN.SA_YARDS_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Yards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SA_NET_WEIGHT_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Net. Weight</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SA_COST_LIST; ?>">
                        <span class="ks-icon la la-barcode"></span>
                        <span>Cost</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SA_SEAL_NUMBERS_LIST; ?>">
                        <span class="ks-icon la la-barcode"></span>
                        <span>Seal Numbers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SA_EXCHANGE_RATE_LIST; ?>">
                        <span class="ks-icon la la-barcode"></span>
                        <span>Exchange Rate</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SA_USER_LIST; ?>">
                        <span class="ks-icon la la-user"></span>
                        <span>Users</span>
                    </a>
                </li>                
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.SA_SETTINGS_EDIT.'?true&id=1&page=1'; ?>">
                        <span class="ks-icon la la-cog"></span>
                        <span>Settings</span>
                    </a>                    
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.SA_COMPANY_LIST; ?>">
                        <span class="ks-icon la la-industry"></span>
                        <span>Company</span>
                    </a>                    
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.SA_CURRENCY_LIST; ?>">
                        <span class="ks-icon la la-dollar"></span>
                        <span>Currency</span>
                    </a>                    
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.SA_BRANCH_LIST; ?>">
                        <span class="ks-icon la la-barcode"></span>
                        <span>Branch codes</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.SA_BRANCH_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Base Port</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.SA_PORT_OF_LOADING_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Port of Loading</span>
                    </a>
                </li>
                
         <?php
        endif;
        /**
         * Country Admin
        **/
        if( decode($_SESSION['groupuserid']) == 3 ): ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo CA_HOME; ?>">
                        <span class="ks-icon la la-dashboard"></span>
                        <span>Country Admin Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.CA_CONTAINER_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Containers</span>
                    </a>                    
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.CA_SETTINGS_EDIT.'?true&id=1&page=1'; ?>">
                        <span class="ks-icon la la-cog"></span>
                        <span>Settings</span>
                    </a>                    
                </li>
                
        <?php
        endif;
        /**
         * EMO Admin
        **/
        if( decode($_SESSION['groupuserid']) == 4 ): ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_HOME; ?>">
                        <span class="ks-icon la la-dashboard"></span>
                        <span>EMO Admin Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.EMO_CONTAINER_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Containers</span>
                    </a>                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_SUPPLIER_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Supplier</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_SHIPPING_AGENT_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Shipping Agents</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_TRANSPORTER_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Transporter</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_STORAGE_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Storage</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_TERMINAL_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Terminal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_PORT_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Port</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_YARD_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Yards</span>
                    </a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_NET_WEIGHT_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Net. Weight</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_COST_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Cost</span>
                    </a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_SEAL_NUMBERS_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Seal Numbers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_EMPTY_DEPOT_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Empty Depot</span>
                    </a>
                </li>
                <li class="nav-item dropdown <?php if( $CP == EMO_LR_REPORT || $CP == EMO_LCR_REPORT ){ echo 'open'; } ?>">
                    <a class="nav-link dropdown-toggle" href="#">
                        <span class="ks-icon la la-pagelines"></span>
                        <span>Reports</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo URL_BASEADMIN.EMO_LR_REPORT;?>">LR Report</a>
                        <a class="dropdown-item" href="<?php echo URL_BASEADMIN.EMO_LCR_REPORT;?>">LCR Report</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo EMO_LOG_LIST; ?>">
                        <span class="ks-icon la la-file-picture-o"></span>
                        <span>Log</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.EMO_SETTINGS_EDIT.'?true&id='.$user['id'].'&page=1'; ?>">
                        <span class="ks-icon la la-cog"></span>
                        <span>Settings</span>
                    </a>                    
                </li>
                
        <?php
            endif;
            /**
            * Country Manager
            **/
            if( decode($_SESSION['groupuserid']) == 5 ): ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="cm_home.php">
                        <span class="ks-icon la la-dashboard"></span>
                        <span>Country Manager Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.CM_CONTAINERS_LIST; ?>">
                        <span class="ks-icon la la-ship"></span>
                        <span>Containers</span>
                    </a>                    
                </li>
                <li class="nav-item dropdown <?php if( $CP == CM_LR_REPORT || $CP == CM_LCR_REPORT ){ echo 'open'; } ?>">
                    <a class="nav-link dropdown-toggle" href="#">
                        <span class="ks-icon la la-pagelines"></span>
                        <span>Reports</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo URL_BASEADMIN.CM_LR_REPORT.'?true&id=1';?>">LR Report</a>
                        <a class="dropdown-item" href="<?php echo URL_BASEADMIN.CM_LCR_REPORT;?>">LCR Report</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="<?php echo URL_BASEADMIN.CM_SETTINGS_EDIT; ?>">
                        <span class="ks-icon la la-cog"></span>
                        <span>Notifications</span>
                    </a>                    
                </li>
                
            <?php    
            endif;
            if( decode($_SESSION['groupuserid']) == 6 ): ?>
                
                <li class="nav-item dropdown <?php if($CP == SA_COUNTRY_LIST || $CP == SA_COUNTRY_EDIT){ echo 'open'; }?> ">
                    <a class="nav-link dropdown-toggle" href="#">
                        <span class="ks-icon la la-docker"></span>
                        <span>Containers</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo URL_BASEADMIN.IN_CONTAINER_LIST;?>">Containers List</a>
                        <a class="dropdown-item" href="<?php echo URL_BASEADMIN.IN_CONTAINER_EDIT;?>">Add Container</a>
                    </div>
                </li>
                
            <?php endif; ?>    
                
        </ul>
        <div class="ks-sidebar-extras-block">            
            <div class="ks-sidebar-copyright">© <?php echo date('Y'); ?> <?php echo BASSOCCIATES; ?></div>
        </div>
    </div>
</div>