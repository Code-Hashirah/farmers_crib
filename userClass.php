<?php
require_once "database.php";
class User extends Database{
    //properties
    public $email;
    public $name;
    public $address;
    public $phone;
    public $image;
    public $password;
    public $role;
    public $id;
    public $status;
    public $error=[];


    //Method
    //------------------------------------
    //add user labourer method
    function add_labourer($name, $address, $phone, $password, $image, $role){
        $hashedPasswrd=password_hash($password, PASSWORD_DEFAULT);
        $sqlComd="INSERT INTO users (name,address,phone,password, image,role)
         VALUES(?,?,?,?,?,?)";
         $preStmnt=$this->connection->prepare($sqlComd);
         if($preStmnt){
            $preStmnt->bind_param('ssssss', $name,$address,$phone,$password,$image, $role);
            $preStmnt->execute();
            header:"location";
         }
         else{
            echo"Unable to Register at the moment";
         }
    }

    function add_user($name, $address, $phone, $password, $image, $role){
        $hashedPasswrd=password_hash($password, PASSWORD_DEFAULT);
        $sqlComd="INSERT INTO users (name,address,phone,password, image,role)
         VALUES(?,?,?,?,?,?)";
         $preStmnt=$this->connection->prepare($sqlComd);
         if($preStmnt){
            $preStmnt->bind_param('ssssss', $name,$address,$phone,$hashedPassword,$image, $role);
            $preStmnt->execute();
         }
         else{
            echo"***Unable to Register at the moment****";
         }
    }

    function login($email, $passwored){
        session_start();
        $sqlLogin="SELECT phone,password,id,role FROM users WHERE phone=?";
        $statement=$this->connection->prepare($sqlLogin);
        if($statement){
            $statement->bind_param('s', $email);
            $statement->execute();
            $result=$statement->get_result();
            if($result->num_rows){
                $DBUser=$result->fetch_assoc();
                $DBpassword=$DBUser['password'];
                if(password_verify($password,$DBpassword)){
                    $_SESSION['Phone']=$phone;
                    $_SESSION['id']=$DBUser['ID'];
                    header('Location:index.php');
                }
                else{
                    echo "Error";
                }
            }
        }
    }

    //hire function
    function hire($Uid,$status, $id){
            $Uid=$_SESSION['id'];
            $id=$labId;
    }
    // This function/method fetches all labourers from table
    function getAllLabourers(){
        $role2="Labourer";
        $sqlCmd="SELECT * FROM users WHERE role=?";
        $stm=$this->connection->prepare($sqlCmd);
        $stm->bind_param('s', $role2);
        $stm->execute();
        // $result=$this->connection->query($sqlCmd);
        while($row=$stm->get_result()){
            $labourers=$row;
            return $labourers;
        }
    }

    function get_Few_Labourers(){
        $role1="Labourer";
        $sqlCmd="SELECT * FROM users WHERE role=? ORDER BY id DESC LIMIT 6";
    //   $result=$this->connection->query($sqlCmd);
    $stmFew=$this->connection->prepare($sqlCmd);
    $stmFew->bind_param('s',$role1);
    $stmFew->execute();
      while($row=$stmFew->get_result()){
        $labourer=$row;
        // print_r($row);
        // print_r($products);
        return $labourer;
      }
    }
function get_One_Labourer($id){
  $sqlCmd="SELECT * FROM users WHERE id=? AND role=?";
 $stm=$this->connection->prepare($sqlCmd);
 $stm->bind_param('ss',$id, "Labourer");
 $stm->execute();
 while($result=$stm->get_result()){
    $labourers=$result;
    return $labourers;
 }

}

}