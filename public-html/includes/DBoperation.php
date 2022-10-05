<?php

class DBoperation
{
    private $con;

    function __construct()
    {
        include_once('../database/db.php');
        $db=new Database();
        $this->con=$db->connect();
    }
    public function addCategory($parent,$category){
        $prestatment=$this->con->prepare("INSERT INTO `categories`( `parent_cat`, `category_name`, `satus`) VALUES (?,?,?)");
        $satatus=1;
        $prestatment->bind_param('isi',$parent,$category,$satatus);
        $result=$prestatment->execute() or die($this->con->error);
        if ($result) {
            return 'category Added';
        }else {
            return 0;
        }
    }
     public function addBrand($brand){
        $prestatment=$this->con->prepare("INSERT INTO `brands`(`brand_name`, `status`) VALUES (?,?)");
        $satatus=1;
        $prestatment->bind_param('si',$brand,$satatus);
        $result=$prestatment->execute() or die($this->con->error);
        if ($result) {
            return 'Brand Added';
        }else {
            return 0;
        }
    }
    public function addProduct($cid,$bid,$productname,$price,$date,$stock){
        $status=1;
        $prestatment="INSERT INTO `products`( `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `date_added`, `p_status`) VALUES ($cid,$bid,'$productname',$price,$stock,$date,$status)";
        if (mysqli_query($this->con, $prestatment)) {
    return "Product Added";
} else {
    return $prestatment;
}

    }
    public function getAllRecord($table){
         $prestatment=$this->con->prepare("SELECT * FROM ".$table);
         $prestatment->execute() or die($this->con->error);
         $result=$prestatment->get_result();
         $rows=array();
         if ($result->num_rows>0) {
            while ($row=$result->fetch_assoc()) {
                $rows[]=$row;
            }
            return $rows;
         }else {
            return 'no data';
         }

    }

    public function deleteCategorie($id){
        $prestatment=$this->con->prepare("DELETE FROM categories WHERE id =".$id);
    }
}

// $ob=new DBoperation();
// echo $ob->addProduct(1,1,'xxx',120,1,'2022-08-29');

?>