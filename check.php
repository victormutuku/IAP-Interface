<html>
    <?php
        require_once("connect.php");

        if(isset($_POST["button"])){
        $Email = $_POST["Email"];
        $Passkey =$_POST["Passkey"];
        
        $view = "SELECT Account_no, First_name, Middle_name, Last_name, Email, City, ProfilePic  FROM assigno1 WHERE Email = '".$Email."' AND Passkey = '".$Passkey."' ";
        $result = mysqli_query(connect(),$view);

        if(mysqli_fetch_assoc($result)){
            $fetched = getData($view);
            foreach ($fetched as $key => $value) {
        ?>
        <h3>First Name: <?php echo $value["First_name"];?></h3>
        <h3>Middle Name: <?php echo $value["Middle_name"];?></h3>       
        <h3>Last Name: <?php echo $value["Last_name"];?></h3>
        <h3>Email: <?php echo $value["Email"];?></h3>
        <h3>City of Residence: <?php echo $value["City"];?></h3>
        <img src="<?php echo $value["ProfilePic"]; ?>">
        <p>Would you like to: </p>
        <a href="change_password.php?GETNO=<?php echo $value["Account_no"]?>"><p>Change your password</p></a>
        <a href="login form.php"><p>Logout</p></a>
        <?php
            }
        }else{
            echo "Record does not exist.";
        }
    }
        ?>
</html>