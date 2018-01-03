  <?php  
    session_start();
    $ldapuser  = $_POST['user']; 
    $ldappass = $_POST['pw']; 
    $arr = array('SA\\' => "");
    $sAMAccountName =  strtr($ldapuser,$arr);
    $filter = "(&(objectClass=user)(sAMAccountName=".$sAMAccountName."))";
    $attributes = array('memberof');
    $ldaptree = "OU=Sites,DC=sa,DC=agcocorp,DC=com";
    $G_G = "_GRP_CAN_tecno_admin__W";
    $G_L = "_Colaboradores";
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
            for($i=0;$i<$count;$i++){
                if(strpos($data[0]['memberof'][$i], $G_G) !==false) {
                    $_SESSION['user'] = $ldapuser;
                    $_SESSION['group'] = '1';
                    header('location:index.php');
                    exit();
                } 
                if(strpos($data[0]['memberof'][$i], $G_L) !==false) {
                    if($group !== '1') {
                        $_SESSION['user'] = $ldapuser;
                        $_SESSION['group'] = '2';
                        header('location:form_ent.php');
                        exit();
                    }
                }
            }
        } else {echo "LDAP bind failed...";}
    }
    // all done? clean up
    ldap_close($ldapconn);
?>
