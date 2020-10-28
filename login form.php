<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>App Interface</title>
        <link rel="stylesheet" href="Assignment0.css" type="text/css">
    </head>
    <body>
        <img src="Colour.png" class="background-image">
        <form action="interface/processregister.php" method="POST" enctype="multipart/form-data">
            <h1>Log In</h1>
            <div class="form">
                <div>
                    <input type="text" name="Email" id="Email" placeholder="Email" required>
                    <br>
                </div>
                <div>
                    <input type="password" name="Passkey" id="Passkey" placeholder="Password" required>
                    <br>
                </div>
                <div>
                    <button type="submit" name="login" class="button" >Login</button>
                    <br>
                </div>
            </div>
        </form>
    </body>

</html>