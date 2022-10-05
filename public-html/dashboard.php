<?php
include './database/constants.php';
if (!isset($_SESSION["id"])) {
    
header("location:" . DOMAIN . "/index.php");

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <?php require("./templates/header.php");?><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="card mx-auto">
                    <img src="./images/user.png" alt="card img top" class="card-img-top mx-auto" style="width:60%;">
                    <div class="card-body">
                        <h4 class="card-title">Profile Info</h4>
                        <p class="card-text"><i class="fa fa-user"></i> <?php echo $_SESSION["username"];?></p>
                        <p class="card-text"><i class="fa fa-user"></i> <?php echo $_SESSION["usertype"];?></p>
                        <p class="card-text"><i class="fa fa-user"></i> <?php echo $_SESSION["last_login"];?></p>
                        <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron"
                    style="width: 100%;height:100%;padding: 2rem 1rem;margin-bottom: 2rem;background-color: #e9ecef;border-radius: .3rem;">
                    <h1>Welcome <?php echo $_SESSION["username"];?></h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <iframe src="https://free.timeanddate.com/clock/i8gorwo5/n206/szw110/szh110/cf100/hnce1ead6"
                                frameborder="0" width="160" height="160"></iframe>


                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">New Orders</h5>
                                    <p class="card-text">Here You Can Make Invoices And Create New Orders</p>
                                    <a href="new_order.php" class="btn btn-primary">New Ordres</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 20rem;">
                    <div class=" card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">Here You Can Menage And Add New Categories</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category">Add
                        </a>
                        <a href="manage_category.php" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 20rem;">
                    <div class=" card-body">
                        <h5 class="card-title">Brands</h5>
                        <p class="card-text">Here You Can Menage And Add New Brands</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brand">Add </a>
                        <a href="manage_brand.php" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 20rem;">
                    <div class=" card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Here You Can Menage And Add New Products</p>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product">Add
                        </a>
                        <a href="manage_product.php" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include("./templates/category.php"); 
    include("./templates/brand.php"); 
    include("./templates/product.php"); 
    ?>
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