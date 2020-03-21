<?php

class Login {

    function checkAuthantication() {
        
        $sel = selectqry("*", TB_USERS, array( "email="=>$_POST['email'], "password="=>encode($_REQUEST['password']) ) );
        
        if(mysqli_num_rows($sel) <= 0) :
            $sel = selectqry( "*", TB_USERS, array( "user_name="=>$_POST['email'], "password="=>encode($_REQUEST['password']) ) );            
        endif;
        
        if (mysqli_num_rows($sel) >= 1) {
            
            $res = mysqli_fetch_array($sel);

            /** For get login history **/
            insertqry(array("users_id" => $res['id'], 'ondatetime' => date("Y-m-d H:i:s"), 'ip' => $_SERVER['REMOTE_ADDR'], 'browser' => getBrowser('name'), 'result' => 1), TB_USERS_LOGIN_HISTORIES);

            if ($res['rootwaystrash'] == 0 && $res['rootwaysstatus'] == 0) {
                
                $tempid = encode(date('Y-m-d H:i:s') . rand(111111, 999999));
                $_SESSION['tempid'] = $tempid;
                $_SESSION['rootwaysusername'] = encode($res['email']);
                $_SESSION['rootwayssessionid'] = encode(date('Y-m-d H:i:s') . rand(111111, 999999));
                $_SESSION['groupuserid'] = encode($res['users_groups_id']);
                
                insertqry(array('tempid'=>$_SESSION['tempid'], 'rootwaysusername'=>$_SESSION['rootwaysusername'], 'rootwayssessionid'=>$_SESSION['rootwayssessionid'], 'groupuserid'=>$_SESSION['groupuserid'], "actiontime"=>date('Y-m-d H:i:s')), TB_USERS_LOGINS);
                updateqry(array('lastlogin' => date('Y-m-d H:i:s')), "email='" . $res['email'] . "'", TB_USERS);

                $_SESSION['pms'] = "";                
            
                /** For Get User Role **/    
                $roles = fetchqry( '`id`, `title`', TB_USERS_GROUPS, array('id='=>$res['users_groups_id']) );

                if($roles['id'] > 0)
                    return $roles['id'];
                else
                    return 0;
                
            } else {               
                return 0;
            } 
            
        } else {
            /** For get login history **/
            $res = fetchqry("*", TB_USERS, array("email=" => $_POST['email']));
            if ($res['id'])
                insertqry(array("users_id" => $res['id'], 'ondatetime' => date("Y-m-d H:i:s"), 'ip' => $_SERVER['REMOTE_ADDR'], 'browser' => getBrowser('name'), 'result' => 0), TB_USERS_LOGIN_HISTORIES);

            return false;
        }
    }

    function logout() {
        if ($_SESSION['rootwaysusername']) {
            $res = fetchqry('*', TB_USERS_LOGINS, array("rootwaysusername=" => $_SESSION['rootwaysusername'], "rootwayssessionid=" => $_SESSION['rootwayssessionid']));
            updateqry(array('lastlogout' => date('Y-m-d H:i:s')), "email='" . decode($_SESSION['rootwaysusername']) . "'", TB_USERS);
            deleteqry(TB_USERS_LOGINS, array("rootwaysusername=" => $_SESSION['rootwaysusername']));
        }
        $_SESSION['pms'] = $_SESSION['tempid'] = $_SESSION['rootwaysusername'] = $_SESSION['rootwayssessionid'] = $_COOKIE['adminconti'] = "";
        unset($_SESSION['pms'], $_SESSION['tempid'], $_SESSION['rootwaysusername'], $_SESSION['rootwayssessionid'], $_COOKIE['adminconti']);
        header("Location:" . URL_BASEADMIN . INDEX_PAGE);
    }

    function loginStatus() {
        
        $currentfile = explode('/', $_SERVER['PHP_SELF']);        
        $currentfile = $currentfile[sizeof($currentfile) - 1];
        if ($currentfile != INDEX_PAGE && $currentfile != FORGOT_PASSWORD) {
            
            if( $_SESSION['tempid'] != "" && $_SESSION['rootwaysusername'] != "" && $_SESSION['rootwayssessionid'] != "" && $_SESSION['groupuserid'] != "" ) {
                
                /** For Login Status **/
                $currenlogin = fetchqry('*', TB_USERS_LOGINS, array("tempid=" => $_SESSION['tempid']), "");
                
                if ( $currenlogin['rootwaysusername'] != $_SESSION['rootwaysusername'] || $currenlogin['rootwayssessionid'] != $_SESSION['rootwayssessionid'] ) {
                    
                    $this->logout();
                    
                } else {
                    
                    if (date('Y-m-d H:i:s', strtotime($currenlogin['actiontime']) + 1800) >= date('Y-m-d H:i:s')) {                        
                        
                        updateqry(array('actiontime' => date('Y-m-d H:i:s')), array("rootwaysusername=" => $_SESSION['rootwaysusername']), TB_USERS_LOGINS);
                        
                    } else {
                        $this->logout();
                    }
                }
                
            } else {
                $this->logout();
            }
        }
    }

}

?>