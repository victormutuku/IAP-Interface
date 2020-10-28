<?php

    include_once 'db.php';
    include_once 'user.php';

    if (isset($_POST['signup'])) {

        $FirstName = $_POST["FirstName"];
        $MiddleName = $_POST["MiddleName"];
        $LastName = $_POST["LastName"];
        $Email = $_POST["Email"];
        $City = $_POST["City"];
        $Profilepic = $_FILES["ProfilePic"];
        $Passkey = $_POST["Passkey"];

        $con = new DBConnector();
        $pdo = $con->connectToDB();

        $original_file_name = $_FILES['ProfilePic']['name'];
        $file_tmp_location = $_FILES['ProfilePic']['tmp_name'];

        $file_type = substr($original_file_name, strpos($original_file_name,'.'),strlen($original_file_name));

        $file_path = "../Profilepics/";
        $new_file_name = $file_path.$original_file_name;

        $hashedPasskey = password_hash($Passkey, PASSWORD_DEFAULT);


        $user = new User();
        //set the member variable
        $user->setFirstName($FirstName);
        $user->setMiddleName($MiddleName);
        $user->setLastName($LastName);
        $user->setEmail($Email);
        $user->setCity($City);
        $user->setProfilePic($new_file_name);
        $user->setPasskey($hashedPasskey);

        echo $user->register($pdo);
        header("location: ../login form.php");

    } else if(isset($_POST['login'])){

        $Email = $_POST["Email"];
        $Passkey = $_POST["Passkey"];
    
        $con = new DBConnector();
        $pdo = $con->connectToDB();

        $hashedPasskey = password_hash($Passkey, PASSWORD_DEFAULT);
    
        $user = new User();
        $user->setEmail($Email);
        $user->setPasskey($hashedPasskey);
    
        echo $user->login($pdo);
    }else if(isset($_POST['change_password'])){

        $Password = $_POST["NewPasskey"];

        $con = new DBConnector();
        $pdo = $con->connectToDB();

        $hashedPasskey = password_hash($Password, PASSWORD_DEFAULT);

        $user = new User();
        $user->setPasskey($hashedPasskey);

        echo $user->changePassword($pdo);
    }
?>