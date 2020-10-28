<?php

    include_once 'db.php';
    include_once 'user.php';
    if(isset($_POST['logon'])){
        $Email = $_POST["Email"];
        $Passkey = $_POST["Passkey"];

        $con = new DBConnector();
        $pdo = $con->connectToDB();

        $user = new User();
        $user->setEmail($Email);
        $user->setPasskey($Passkey);

        return $userid;
    }

   
?>