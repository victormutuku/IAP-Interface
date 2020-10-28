<html>
    <body>
        <?php
            require_once("connect.php");

            $selectstmt = "SELECT * FROM assigno1";
            $fetchedstmt = getData($selectstmt);
            foreach($fetchedstmt as $key => $value){
        ?>
        <h3>First Name: <?php echo $value["First_name"];?></h3>
        <h3>Middle Name: <?php echo $value["Middle_name"];?></h3>       
        <h3>Last Name: <?php echo $value["Last_name"];?></h3>
        <h3>Email: <?php echo $value["Email"];?></h3>
        <h3>City of Residence: <?php echo $value["City"];?></h3>
        <img src="<?php echo $value["ProfilePic"]; ?>">
        <p>Would you like to: </p>
        <a href=change_password.php?email=<?php echo $value["Email"]?>><p>Change your password</p></a>
        <a href=logout.php?email=<?php echo $value["Email"]?>><p>Logout</p></a>
        <?php
            }
        ?>
    </body>

</html>