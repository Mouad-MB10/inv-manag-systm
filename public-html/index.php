<?php
include('./database/constants.php');
if (isset($_SESSION["id"])) {

    header("location:" . DOMAIN . "/dashboard.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="./includes/style.css" />
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="overlay">
        <div class="loader"></div>
    </div>
    <?php require("./templates/header.php"); ?><br><br>
    <div class="container">
        <?php 
if (isset($_GET["msg"]) AND !empty(isset($_GET["msg"]))) {?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_GET["msg"]; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
}?>


        <div class="card mx-auto" style="width: 20rem;">
            <img src="./images/login.png" alt="card img top" class="card-img-top mx-auto" style="width:60%;">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <form id="login_form" method="POST" onsubmit="return false">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email-login" class="form-control" id="email-login"
                            aria-describedby="emailHelp">
                        <small id="em_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password-login" class="form-control" id="password-login">
                        <small id="ps_error" class="form-text text-muted"></small>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="user-slogin"><i class="fa fa-lock"></i>
                        Login</button>
                    <span><a href="register.php" style="text-decoration: none;">Register</a></span>
                </form>
            </div>
            <div class="card-footer">
                <a href="#" style="text-decoration: none;">Forgotten Pssword ?</a>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"
    integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="./js/main.js"></script>

</html>