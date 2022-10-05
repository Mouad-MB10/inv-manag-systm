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
    <?php include("./templates/header.php")?><br>
    <div class="container">
        <div class="card " style="width: 30rem;margin: 0 auto;">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form id="register_form" method="POST" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label for="username">FullName</label>
                        <input type="text" name="username" class="form-control" id="username"
                            aria-describedby="emailHelp" placeholder="Enter Username">
                        <small id="u_error" class="form-text text-muted"></small>
                    </div><br>
                    <div class="form-group">
                        <label for="email">Email Adresse</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder=" Enter Email"> <small id="e_error" class="form-text text-muted"></small>
                    </div><br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password1"
                            placeholder="Passsword"><small id="p1_error" class="form-text text-muted"></small>
                    </div><br>
                    <div class="form-group">
                        <label for="password2">Ren-enter Password</label>
                        <input type="password" name="password" class="form-control" id="password2"
                            placeholder="Password">
                        <small id="p2_error" class="form-text text-muted"></small>
                    </div><br>
                    <div class="form-group">
                        <label for="usertype">Usertype</label>
                        <select name="usertype" class="form-control" id="usertype">
                            <option value="">Choose User Type </option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                        <small id="t_error" class="form-text text-muted"></small>
                    </div>
                    <br>

                    <button type="submit" name="user_register" class="btn btn-primary"><i class="fa fa-user"></i>
                        Register</button>
                    <span><a href="index.php" style="text-decoration: none;">Login</a></span>
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