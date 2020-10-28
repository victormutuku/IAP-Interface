<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>App Interface</title>
        <link rel="stylesheet" href="Assignment0.css" type="text/css">
    </head>
    <script>
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                checkup();
            });
            function checkup() {
                const password = document.getElementById('NewPasskey').value;
                const confirmpassword = document.getElementById('ConfirmedNewP').value;

                if(password.length < 6){
                    document.getElementById("small1").innerHTML = "Password must be more than 6 characters."
                    return false;
                }else{
                    document.getElementById("small1").innerHTML = ""
                }
                if(password != confirmpassword){
                    document.getElementById("small").innerHTML = "Password does not match."
                    return false;
                }else{
                    document.getElementById("small").innerHTML = ""
                }
            }
        </script>
    <body>
        <img src="Colour.png" class="background-image">
        <form action="interface/processregister.php" method="POST" enctype="multipart/form-data">
            <h1>Change Password</h1>
            <div class="form">
                <div>
                    <input type="password" name="Passkey" id="Passkey" placeholder="Current Password" required>
                    <br>
                </div>
                <div>
                    <input type="password" name="NewPasskey" id="NewPasskey" placeholder=" New Password" required>
                    <br>
                    <small id="small1"></small>
                </div>
                <div>
                    <input type="password" name="ConfirmedNewP" id="ConfirmedNewP" placeholder="Confirm New Password" required>
                    <br>
                    <small id="small"></small>
                </div>
                <div>
                    <button type="submit" name="change_password" class="button" >Save</button>
                    <br>
                </div>
            </div>
        </form>
    </body>

</html>