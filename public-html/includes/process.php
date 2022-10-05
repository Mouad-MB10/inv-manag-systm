<?php






if (isset($_POST["username"]) AND isset($_POST["email"])) {
    include_once('user.php');
    $user = new User();

    $result=$user->createuserAccount($_POST["username"],$_POST["email"],$_POST["password"],$_POST["usertype"]);
    echo $result;
     exit();
}
if (isset($_POST["email-login"]) AND isset($_POST["password-login"])) {
    include_once('user.php');
    $user = new User();

    $result=$user->userLogin($_POST["email-login"],$_POST["password-login"]);
    echo $result;
    exit();
}
if (isset($_POST["getCategory"])){
    include_once('DBoperation.php');
    $objt=new DBoperation();
    $rows=$objt->getAllRecord("categories");
    foreach ($rows as $row) {
        echo "<option value='".$row['cid']."'>".$row['category_name'];
    }
    exit();
}
if (isset($_POST["getBrand"])){
    include_once('DBoperation.php');
    $objt=new DBoperation();
    $rows=$objt->getAllRecord("brands");
    foreach ($rows as $row) {
        echo "<option value='".$row['bid']."'>".$row['brand_name'];
    }
    exit();
}
if (isset($_POST["parent-cat"]) AND isset($_POST["category-name"])) {
    include_once('DBoperation.php');
    $objt = new DBoperation();

    $result=$objt->addCategory($_POST["parent-cat"],$_POST["category-name"]);
    echo $result;
    exit();
}
if (isset($_POST["brand-name"])) {
    include_once('DBoperation.php');
    $objt = new DBoperation();
    $result=$objt->addBrand($_POST["brand-name"]);
    echo $result;
    exit();
}
if (isset($_POST["product-name"]) AND isset($_POST["product-price"])) {
   include_once('DBoperation.php');
    $objt = new DBoperation();

    $date=$_POST['date-added'];
    $date=date('Y-m-d', strtotime(str_replace('-', '/', $date)));
    $result = $objt->addProduct($_POST['select-cat'],$_POST['select-brand'],$_POST['product-name'],$_POST['product-price'],"'".$date."'",$_POST['product-quantity']);
   echo $result;
    exit();

}
if (isset($_POST["manageCategory"])) {
    include_once('manage.php');
    $obj = new Manage();
    
    $result=$obj->manageRecordWithPagination("categories", $_POST["pageno"]);
    $rows=$result["rows"];
    $pagination = $result["pagination"];
    if (count($rows)>0) {
        $n=(($_POST["pageno"]-1)*5)+1;
        foreach ($rows as $row) {?>
<tr>
    <td>
        <?php
            echo  $n;?>
    </td>
    <td>
        <?php
            echo  $row["category"];?>
    </td>
    <td>
        <?php
            echo  $row["parent"];?>
    </td>
    <td>
        <a href="#" class="btn btn-success btn-sm" target="_blank" rel="noopener noreferrer">Active</a>
    </td>
    <td>
        <a href="#" class="btn btn-danger btn-sm delete" rel="noopener noreferrer" did=<?php echo $row["cid"];  ?>
            id="delete" name="deleteid">Delete</a>
        <a href="#" class="btn btn-primary btn-sm" id="edit" rel="noopener noreferrer" eid=<?php echo $row["cid"]; ?>
            data-bs-toggle="modal" data-bs-target="#edit-category">Edit</a>
    </td>
    <td></td>
    <td></td>
</tr>
<?php
$n++;
} ?> <tr>
    <td colspan=" 5"><?php echo $pagination;?>
    </td>
</tr>
<?php

}


}
if (isset($_POST["deleteCategory"])) {
include_once('./manage.php');
$db=new Manage();
echo $db->deleteRecord("categories","cid",$_POST["id"]);

}
//edit Category
if (isset($_POST["editCategory"])) {

    include_once './manage.php';
    $db = new Manage();
    $result=$db->getsingleRecord("categories", "cid", $_POST["eid"]);
   echo json_encode($result);
    
}
// update Category
if (isset($_POST["update-category"])) {
    $id= $_POST["eid"] ;
    include_once './manage.php';
    $db = new Manage();
    echo $db->updateReord("categories",["cid"=>$id],["parent_cat"=>$_POST["parent-cat"],"category_name"=>"'".$_POST["update-category"]."'","satus"=>1]);
}

//---- Manage Brand --------//
if (isset($_POST["manageBrand"])) {
    include_once 'manage.php';
    $obj = new Manage();

    $result = $obj->manageRecordWithPagination("brands", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {?>
<tr>
    <td>
        <?php
echo $n; ?>
    </td>
    <td>
        <?php
echo $row["brand_name"]; ?>
    </td>

    <td>
        <a href="#" class="btn btn-success btn-sm" target="_blank" rel="noopener noreferrer">Active</a>
    </td>
    <td>
        <a href="#" class="btn btn-danger btn-sm delete" rel="noopener noreferrer" did=<?php echo $row["bid"]; ?>
            id="deleteBrand" name="deleteid">Delete</a>
        <a href="#" class="btn btn-primary btn-sm" id="editBrand" rel="noopener noreferrer"
            eid=<?php echo $row["bid"]; ?> data-bs-toggle="modal" data-bs-target="#edit-brand">Edit</a>
    </td>
    <td></td>
    <td></td>
</tr>
<?php
$n++;
        }?> <tr>
    <td colspan=" 5"><?php echo $pagination; ?>
    </td>
</tr>
<?php

    }

}
//delete Brand
if (isset($_POST["deleteBrand"])) {
    include_once './manage.php';
    $db = new Manage();
    echo $db->deleteRecord("brands", "bid", $_POST["id"]);

}
//edit Brand
if (isset($_POST["editBrand"])) {

    include_once './manage.php';
    $db = new Manage();
    $result = $db->getsingleRecord("brands", "bid", $_POST["eid"]);
    echo json_encode($result);

}
// update Brand
if (isset($_POST["update-brand"])) {
    $id = $_POST["eid"];
    include_once './manage.php';
    $db = new Manage();
    echo $db->updateReord("brands", ["bid" => $id], ["brand_name" => "'" . $_POST["update-brand"] . "'", "status" => 1]);
}

//---- Manage Product --------//
if (isset($_POST["manageProduct"])) {
    include_once 'manage.php';
    $obj = new Manage();

    $result = $obj->manageRecordWithPagination("products", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {?>
<tr>
    <td>
        <?php
echo $n; ?>
    </td>
    <td>
        <?php
echo $row["Product"]; ?>
    </td>
    <td>
        <?php
echo $row["Category"]; ?>
    </td>
    <td>
        <?php
echo $row["Brand"]; ?>
    </td>
    <td>
        <?php
echo $row["Price"]; ?>
    </td>
    <td>
        <?php
echo $row["Stock"]; ?>
    </td>
    <td>
        <?php
echo $row["Added Date"]; ?>
    </td>

    <td>
        <a href="#" class="btn btn-success btn-sm" target="_blank" rel="noopener noreferrer">Active</a>
    </td>
    <td>
        <a class="btn btn-danger btn-sm delete" rel="noopener noreferrer" pid=<?php echo $row["id"]; ?>
            id="deleteProduct" name="deleteProduct">Delete</a>
        <a href="#" class="btn btn-primary btn-sm" id="editProduct" rel="noopener noreferrer"
            pid=<?php echo $row["id"]; ?> data-bs-toggle="modal" data-bs-target="#productEdit">Edit</a>
    </td>
    <td></td>
    <td></td>
</tr>
<?php
$n++;
        }?> <tr>
    <td colspan=" 5"><?php echo $pagination; ?>
    </td>
</tr>
<?php

    }

}
//edit Product
if (isset($_POST["editProduct"])) {

    include_once './manage.php';
    $db = new Manage();
    $result = $db->getsingleRecord("products", "pid", $_POST["pid"]);
    echo json_encode($result);

}
//Update Product
if (isset($_POST["new-product"])) {
    $id = $_POST["idproduct"];
    include_once './manage.php';
    $db = new Manage();
    echo $db->updateReord("products", ["pid" => $id], ["cid" =>$_POST["new-cat"],
    "bid" =>$_POST["new-brand"],
    "product_name" =>"'".$_POST["new-product"]."'",
    "product_price" =>$_POST["new-price"],
    "product_stock" =>$_POST["new-quantity"],
    "date_added" =>"'".date('Y-m-d')."'",
    "p_status" => 1]);
}
//delete Product
if (isset($_POST["deleteProduct"])) {
    
    include_once './manage.php';
    $db = new Manage();
    echo $db->deleteRecord("products", "pid", $_POST["id"]);

}
//get New Row
if (isset($_POST["getNewRow"])) {
    include_once 'DBoperation.php';
    $objt = new DBoperation();
    $rows = $objt->getAllRecord("products");
    
    ?>
<tr>
    <td><b class="number">
            1</b>
    </td>
    <td><select name="pid[]" class="form-control form-control-sm pid">
            <option value="">Choose</option>
            <?php  
            foreach ($rows as $row) {
             echo "<option value='" . $row['pid'] . "'>" . $row['product_name'];
         }

            ?>
        </select>
    </td>
    <td>
        <input type="text" name="tqty[]" class="form-control form-control-sm tqty" readonly>
    </td>
    <td>
        <input type="text" name="qnty[]" class="form-control form-control-sm qnty" required>
    </td>
    <td>
        <input type="text" name="price[]" class="form-control form-control-sm price" readonly>
    </td>
    <td>
        <input type="hidden" name="pro_name[]" class="form-control form-control-sm pro_name" readonly>
    </td>
    <td>
        <span class="ttl">0</span>DH
    </td>
</tr>
<?php
exit();
}
// get Quantity && Price Item
if (isset($_POST["getPriceAndQty"])) {

    include_once './manage.php';
    $db = new Manage();
    $result = $db->getsingleRecord("products", "pid", $_POST["pid"]);
    echo json_encode($result);

}

if (isset($_POST["customer_order"]) AND isset($_POST["order_date"])) {
    include_once './manage.php';
    $db = new Manage();

    $customer_order=$_POST["customer_order"];
    $date_order = $_POST["order_date"];
    $ar_tqty=$_POST["tqty"];
    $ar_qnty=$_POST["qnty"];
    $ar_price = $_POST["price"];
    $ar_pro_name = $_POST["pro_name"];
    $sub_total=$_POST["sub_total"];
    $disc = $_POST["disc"];
    $total = $_POST["total"];
    $tva = $_POST["tva"];
    $net_total = $_POST["net_total"];
    $paid = $_POST["paid"];
    $due = $_POST["due"];
    $payment_type = $_POST["payment_type"];
    $result=$db->storeCustomerOrderInvoice(  $customer_order,$date_order,$ar_tqty,$ar_qnty,
    $ar_price,$ar_pro_name,$sub_total,$disc,$total,
    $tva,$net_total,$paid,$due,$payment_type);
    echo $result;
}

?>