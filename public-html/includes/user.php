<?php




class User
{
 private $con;
 public function __construct()
 {
    include_once('../database/db.php');

    $db=new Database();
    $this->con=$db->connect();
 }   
 private function emailExists($email){
    $preStatment=$this->con->prepare('SELECT id FROM users WHERE email=?');
    $preStatment->bind_param("s",$email);
    $preStatment->execute() or die($this->con->error);
    $result=$preStatment->get_result();
    if ($result->num_rows>0) {
        return 1;
    }else {
        return 0;
    }
 }
 public function createuserAccount($username,$email,$password,$usertype){
    if ($this->emailExists($email)) {
        return 'This mail is Already Exist';
    }else {
        $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
        $date = date('Y-m-d');
        $notes = "";
        $preStatment = $this->con->prepare("INSERT INTO `users`( `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
        $preStatment->bind_param("sssssds",$username,$email,$pass_hash,$usertype,$date,$date,$notes);
        $result=$preStatment->execute() or die($this->con->error);
        if ($result) {
            return $this->con->insert_id;
        }else {
            return 'Something Eroor';
        }
    }  
 

 }
 public function userLogin($email,$password){
    $preStatment=$this->con->prepare("SELECT id,username,usertype,password,last_login FROM users WHERE email=?");
    $preStatment->bind_param("s",$email);
    $preStatment->execute() or die($this->con->error);
    $result=$preStatment->get_result();
    if ($result->num_rows<1) {
        return 'You Have To register First';
    }else {
        $row=$result->fetch_assoc();
        
        if (password_verify($password,$row["password"])) {
            $last_login=date("Y-m-d h:m:s");
            $_SESSION["id"]=$row["id"];
            $_SESSION["username"]=$row["username"];
            $_SESSION["usertype"] = $row["usertype"];
            $_SESSION["last_login"]=$row["last_login"];
            $preStatment=$this->con->prepare("UPDATE users SET last_login=? WHERE email=?");
            $preStatment->bind_param("ss",$last_login,$email);
            $result=$preStatment->execute() or die($this->con->error);
            if ($result) {
                return 1 ;
            }else {
                return 0;
            }
        }else {
            return "PASSWORD doesnt Matched";
        }
    }
 }
}
// $user =new User();

// echo  $user->userLogin("serf@gmail.com","ad12345ad") ."</br>";


?>