<?php
require_once("connect.php");

 if(isset($_POST["button"])){
    $FirstName = $_POST["FirstName"];
    $MiddleName = $_POST["MiddleName"];
    $LastName = $_POST["LastName"];
    $Email = $_POST["Email"];
    $City = $_POST["City"];
    $Profilepic = $_FILES["ProfilePic"];
    $Passkey = $_POST["Passkey"];
    $ConfPass = $_POST["ConfirmP"];

    $original_file_name = $_FILES['ProfilePic']['name'];
    $file_tmp_location = $_FILES['ProfilePic']['tmp_name'];

    $file_type = substr($original_file_name, strpos($original_file_name,'.'),strlen($original_file_name));

    $file_path = "ProfilePics/";
    $new_file_name = $file_path.$original_file_name;


    if(move_uploaded_file($file_tmp_location,$new_file_name)){
        $insert = "INSERT INTO assigno1(First_name, Middle_name, Last_name, Email, City, ProfilePic, Passkey, Confirmed_Passkey)VALUES('$FirstName','$MiddleName','$LastName','$Email','$City','$new_file_name','$Passkey','$ConfPass')";
        setData($insert);
        header("location:homepage.php");
    }else{
        echo "Error";
    }
   }
?>