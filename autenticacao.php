  <?php  
    session_start();
    $ldapuser  = $_POST['user']; 
    $ldappass = $_POST['pw']; 
    $arr = array('sa\\' => "",'SA\\' => "");
    $sAMAccountName =  strtr($ldapuser,$arr);
    $filter = "(&(objectClass=user)(sAMAccountName=".$sAMAccountName."))";
    $attributes = array('memberof','primaryGroupID');
    $ldaptree = "OU=Sites,DC=sa,DC=agcocorp,DC=com";
    $G_G = "_GRP_CAN_tecno_admin__W";
    $G_L = "Domain Users";
    // config
    $ldapserver = 'cansdc17.sa.agcocorp.com';
    // connect 
    $ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");
    if($ldapconn) {
        // binding to ldap server
        $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));
        // verify binding
        if ($ldapbind) {
            echo "LDAP bind successful...<br /><br />"; 
            $result = ldap_search($ldapconn,$ldaptree,$filter,$attributes);
            $data = ldap_get_entries($ldapconn, $result);
            $count = $data[0]['memberof']["count"];
            /*
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            */
            for($i=0;$i<$count;$i++){
                //echo "<br>".$data[0]['memberof'][$i];
                if(strpos($data[0]['memberof'][$i], $G_G) !==false||strpos($data[0]['memberof'][$i],'_GRP_CAN_TI_OPERACAO') !==false){
                    $group = '1';
                    $_SESSION['user'] = $ldapuser;
                    $_SESSION['group'] = $group;
                    header('location:index.php');
                    exit();
                } 
            }
            $group = '2';
            $_SESSION['user'] = $ldapuser;
            $_SESSION['group'] = $group;
            header('location:index.php');
            exit();
        } else {echo "LDAP bind failed...";}
    }
    // all done? clean up
    ldap_close($ldapconn);
?>
