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
    <div class="overlay">
        <div class="loader"></div>
    </div>
    <?php require "./templates/header.php";?><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                    <div class="card-header">
                        <h4>New Order </h4>
                    </div>
                    <div class="card-body">
                        <form id="get_order_data" onsubmit="return false" method="POST">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Order Date</label>
                                <div class="col-sm-6">
                                    <input type="text" id="order_date" name="order_date" readonly
                                        class="form-control form-control-sm" value=<?php echo date('Y-m-d'); ?>>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Cusomer Name <span
                                        style="color:red;">
                                        *</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" id="customer_order" name="customer_order"
                                        class="form-control form-control-sm" placeholder="Enter a Customer Name"
                                        required>
                                </div>
                            </div><br>
                            <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                                <div class="card-body">
                                    <h3>Make a Order List</h3>
                                    <table align="center" style="width:800px ;">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center ;">#</th>
                                                <th style="text-align:center ;">Item Name</th>
                                                <th style="text-align:center ;">Qunatity</th>
                                                <th style="text-align:center ;">Total Quantity</th>
                                                <th style="text-align:center ;">Price</th>
                                                <th style="text-align:center ;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="invoice_item">
                                            <!-- />                                 <tr>
                                                <td><b id="number">1</b></td>
                                                <td><select name="pid[]" class="form-control form-control-sm">
                                                        <option value="">Waching Maching</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="tnty[]"
                                                        class="form-control form-control-sm" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" name="qnty[]"
                                                        class="form-control form-control-sm" required>
                                                </td>
                                                <td>
                                                    <input type="text" name="price[]"
                                                        class="form-control form-control-sm" readonly>
                                                </td>

                                                <td>
                                                    1540DH
                                                </td>
                                            </tr> </!-->
                                        </tbody>
                                    </table><br>
                                    <center>
                                        <input type="submit" id="Add" class="btn btn-success" style="width:180px ;"
                                            value="Add" />
                                        <input type="submit" id="Remove" class="btn btn-danger" style="width:180px;"
                                            value="Remove" />
                                    </center>
                                </div>
                            </div><br>
                            <div class=" form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Sub Total</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sub_total" class="form-control form-control-sm"
                                        id="sub_total" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Discount(%)</label>
                                <div class="col-sm-6">
                                    <input type="text" required name="disc" class="form-control form-control-sm"
                                        id="disc">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Total</label>
                                <div class="col-sm-6">
                                    <input type="text" required name="total" class="form-control form-control-sm"
                                        id="total" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">TVA(20%)</label>
                                <div class="col-sm-6">
                                    <input type="text" required name="tva" class="form-control form-control-sm" id="tva"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Net Total</label>
                                <div class="col-sm-6">
                                    <input type="text" required name="net_total" class="form-control form-control-sm"
                                        id="net_total" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Paid</label>
                                <div class="col-sm-6">
                                    <input type="text" required name="paid" class="form-control form-control-sm"
                                        id="paid">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Due</label>
                                <div class="col-sm-6">
                                    <input type="text" required name="due" class="form-control form-control-sm" id="due"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" align="right">Payment Methode</label>
                                <div class="col-sm-6">
                                    <select name="payment_type" id="payment_type" class="form-control form-control-sm">
                                        <option value="Cash">Cash</option>
                                        <option value="Card">Card</option>

                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>
                            </div>
                            <center>
                                <input type="submit" id="order_form" style="width:180px;" class="btn btn-info"
                                    value="Order" />
                                <input type="submit" id="print_invoice" style="width:180px;"
                                    class="btn btn-success d-none" value="Print" />
                            </center>
                        </form>
                    </div>
                </div>
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
<script type="text/javascript" src="./js/order.js"></script>


</html>