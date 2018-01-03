<?php
    session_start();
    $ldaprdn  = 'SA\do19152';     // ldap rdn or dn
    $ldappass = 'Etuv9962.2';  // associated password
    $ldapconn = ldap_connect("cansdc17.sa.agcocorp.com");
    if ($ldapconn) {
        $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
        if ($ldapbind) {
            echo $ldapbind;
            $_SESSION['user'] = $ldaprdn;
            //header('location:index.php');
        	//exit();
        } else {echo "Usuário Inválido";} 
    }
?>