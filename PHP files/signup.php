<?php
require("includes/common.php");
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup | Downtown Grocery </title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <h2>SIGN UP</h2>
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="username@gmail.com"  name="e-mail" required = "true">
                               <?php if (array_key_exists('m1',$_GET)){ echo $_GET['m1'];} 
					           if (array_key_exists('m2',$_GET)){ echo $_GET['m2'];}?>
                                
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="password" required = "true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact" pattern='[6-9][0-9]{9}$' maxlength="10" size="10" name="contact" required = "true">
                                <?php if (array_key_exists('m3',$_GET)){ echo $_GET['m3'];} ?>
                        
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="City" name="city" required = "true">
                            </div>
                       
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php"; ?>
    </body>
</html>
