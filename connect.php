<?php
function connect(){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "iap";

    $link = mysqli_connect($server,$username,$password,$database) or die("Could not connect".mysqli_connect_error());
    return ($link);
}

function setData($insert){
    $link = connect();
    if(mysqli_query($link,$insert)){
        echo "Success";
    }else{
        echo "Error".mysqli_error($link);
    }
}

function getData($insert){
    $link = connect();
    $results = mysqli_query($link,$insert);
    $rows = array();

    if(mysqli_num_rows($results)>0){
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
        return $rows;
    }
}
?>