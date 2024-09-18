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
        // Correctly hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // SQL query
        $sqlComd = "INSERT INTO users (name, address, phone, password, image, role) VALUES (?, ?, ?, ?, ?, ?)";
        $preStmnt = $this->connection->prepare($sqlComd);
    
        // Check if the statement is prepared successfully
        if ($preStmnt) {
            // Bind parameters (use $hashedPassword, not $password)
            $preStmnt->bind_param('ssssss', $name, $address, $phone, $hashedPassword, $image, $role);
            
            // Execute the statement
            $result = $preStmnt->execute();
    
            // Check if execution was successful
            if ($result) {
                echo "<b class='text-success'>Success</b>";
    
            } else {
                // Show the actual error message
                echo "Execution failed: " . $preStmnt->error;
            }
        } else {
            // Show the error if the statement couldn't be prepared
            echo "Error in preparing statement: " . $this->connection->error;
        }
    }
    


    function signUp_user($name, $address, $phone, $password, $image, $role){
        // Correct the typo in the password hashing variable
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // SQL query
        $sqlComd = "INSERT INTO users (name, address, phone, password, image, role) VALUES (?, ?, ?, ?, ?, ?)";
        $preStmnt = $this->connection->prepare($sqlComd);
    
        // Check if the statement is prepared successfully
        if ($preStmnt) {
            // Bind parameters (6 placeholders: 6 variables)
            $preStmnt->bind_param('ssssss', $name, $address, $phone, $hashedPassword, $image, $role);
            
            // Execute the statement
            $result = $preStmnt->execute();
    
            // Check if execution was successful
            if ($result) {
                echo "<b class='text-success'>Success</b>";
                header('loaction:signIn.php');
            } else {
                // Show the actual error message
                echo "Execution failed: " . $preStmnt->error;
            }
        } else {
            // Show the error if the statement couldn't be prepared
            echo "Error in preparing statement: " . $this->connection->error;
        }
    }
    
// **********************


    function login($phone, $password){
        session_start();
        $sqlLogin="SELECT phone,password,id,role FROM users WHERE phone=?";
        $statement=$this->connection->prepare($sqlLogin);
        if($statement){
            $statement->bind_param('s', $phone);
            $statement->execute();
            $result=$statement->get_result();
            if($result->num_rows){
                $DBUser=$result->fetch_assoc();
                $DBpassword=$DBUser['password'];
                if(password_verify($password,$DBpassword)){
                    $_SESSION['Phone']=$phone;
                    $_SESSION['id']=$DBUser['ID'];
                    header('Location:labourers.php');
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