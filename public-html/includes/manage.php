<?php 

class Manage
{
    private $con ;
   function __construct()
    {
        include_once('../database/db.php');
        $db=new Database();
        $this->con=$db->connect();
    }
public function manageRecordWithPagination($table,$pno){
  $a=$this->pagination($this->con,$table,$pno,5);
  
        if ($table == "categories") {
         $sql="SELECT p.cid as cid, p.category_name as category,c.category_name as parent,p.satus FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid ".$a["limit"] ;

        }else if($table=="products"){
          $sql="SELECT p.pid as id ,p.product_name as Product, c.category_name  as Category,b.brand_name as Brand,
          p.product_price as Price,p.product_stock as Stock, p.date_added  \"Added Date\" FROM products p
          JOIN categories c JOIN brands b on c.cid=p.cid AND b.bid=p.bid ".$a["limit"] ;
        }else {
            $sql="SELECT * FROM ".$table." ".$a["limit"];
        }
   $preStatment = $this->con->query($sql)or die($this->con->error);
   $result = $preStatment;
   $rows=array();
      if ($result->num_rows>0) {
        while ($row=$result->fetch_assoc()) {
            $rows[]=$row;
        }
      }
      return ["rows"=>$rows,"pagination"=>$a["pagination"]];
}
public function deleteRecord($table,$pk,$id){
    if ($table=="categories") {
        $query = $this->con->prepare("SELECT ".$id." FROM categories WHERE parent_cat =?" );
        $query->bind_param("i",$id);
        $query->execute();
        $result=$query->get_result() or die($this->con->error);
        if ($result->num_rows>0) {
            return "DEPENDENT CATEGORY";
        }else {
            $query = $this->con->prepare("DELETE FROM ".$table ." WHERE ".$pk."= ?");
            $query->bind_param("i", $id);
            $result = $query->execute() or die($this->con->error);
            if ($result) {
                return "DELETED CATEGORY";

            }
            

        }

    }else{
        $query = $this->con->prepare("DELETE FROM " . $table ." WHERE ".$pk."= ?");
        $query->bind_param("i", $id);
        $result = $query->execute() or die($this->con->error);
        if ($result) {
         return "DELETED";
        
       }
  


    }
}
public function getsingleRecord($table,$pk,$id){
    $query=$this->con->prepare("SELECT * FROM ".$table." WHERE ".$pk."= ?" );
    $query->bind_param("i",$id);
    $query->execute() or die($this->con->error);
    $result=$query->get_result();
    if ($result->num_rows==1) {
        $data=mysqli_fetch_assoc($result);
    }
    return $data;
}
public function updateReord($table,$where,$fiels){
  $sql = "";
  $condition = "";
  foreach ($where as $key => $value) {
    $condition .=$key."= " .$value." AND";
  }
  $condition=substr($condition,0,-4);
  foreach ($fiels as $key => $value) {
    $sql .= $key ." = ".$value.", ";
  }
  $sql=substr($sql,0,-2);
  $sql="UPDATE ".$table." SET ".$sql." WHERE ".$condition;
  if (mysqli_query($this->con,$sql)) {
    return "UPDATED";
  }else {
    return $sql;
  }
}
private function pagination($con,$table, $pagen, $n){
    $query=$this->con->query("SELECT count(*) as rrows FROM ".$table);
    $row=mysqli_fetch_assoc($query);
    //$total = 10000;
    $pagenumbers = $pagen;
    $totalperpage = $n;
    $last = ceil($row['rrows']/ $totalperpage);
 
    $pagination = " <ul class='pagination'>";
    if ($last != 1) {
       if ($pagenumbers>1) {
        $previous="";
        $previous =$pagenumbers-1;
        $pagination.="<li class='page-item'><a class='page-link' href='#' pn=".$previous." style='color: #333;text-decoration:none;
'>Previous</a></li>";
       }
       for ($i=$pagenumbers-5; $i <$pagenumbers ; $i++) { 
        if ($i>0) {
           $pagination .= "<li class='page-item'><a class='page-link' style='color: #333;text-decoration:none;
' href='#'pn=" . $i . " >" . $i . "</a></li>";

        }
       }
       $pagination .= "<li class='page-item'><a class='page-link' href='#' pn=" . $pagenumbers . "  style='color: #333;text-decoration:none;
'>  $pagenumbers </a></li>";
        for ($i=$pagenumbers+1; $i <=$last ; $i++) { 
            $pagination .= "<li class='page-item'><a class='page-link'  style='color: #333;text-decoration:none;
' href='#' pn=" . $i . " > " . $i . "</a></li>";

        if ($i>$pagenumbers+4) {
           break;

        }
    }
    if ($last>$pagenumbers) {
        $next=$pagenumbers+1;
        $pagination .= "<li class='page-item'><a class='page-link' style='color: #333;text-decoration:none;
' href='#' pn=" . $next . " > Next</a></li></ul>";

    }
    $limit="LIMIT ".($pagenumbers-1)*$totalperpage.", ".$totalperpage;
    return ["pagination"=>$pagination
            ,"limit"=>$limit];
 }
}
public function storeCustomerOrderInvoice(
  $customer_order,$date_order,$ar_tqty,$ar_qnty,
  $ar_price,$ar_pro_name,$sub_total,$disc,$total,
  $tva,$net_total,$paid,$due,$payment_type
){
  $prestatment ="INSERT INTO `invoice`(`cust_name`, `order_date`, `sub_total`, `discount`, `total`, `tva`, `net_total`, `paid`, `due`, `payment_methode`) VALUES ('$customer_order','$date_order',$sub_total,$disc,$total,$tva,$net_total,$paid,$due,'$payment_type')";
  if (mysqli_query($this->con, $prestatment)) {
    $invoice_no = mysqli_insert_id($this->con);

    if ($invoice_no != null) {
    for ($i = 0; $i < count($ar_price); $i++) {
        $rem_qnty=$ar_tqty[$i]-$ar_qnty[$i];
        if ($rem_qnty<0) {
          return "ORDER FAILED";
        }else {
          $sql = "UPDATE products SET product_stock=".$rem_qnty." WHERE product_name='".$ar_pro_name[$i]."'";
          mysqli_query($this->con,$sql);
        }
        $insert_product = "INSERT INTO `invoice_details`( `invoice_no`, `product_name`, `price`, `qty`) VALUES ($invoice_no,'$ar_pro_name[$i]',$ar_price[$i],$ar_qnty[$i])";
        mysqli_query($this->con, $insert_product);
    }
    
  
}
return "Order Completed";
  }
  

}
}
// $db = new Manage();
// $data = $db->getsingleRecord("categories", "cid", 5);
// echo "<select>" . "<option value=" . $data["parent_cat"] . ">" . $data["category_name"] . "</option>" . "</select>";

?>