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

}