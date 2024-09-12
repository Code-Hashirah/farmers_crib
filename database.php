<?php
class Database{
    public $server="127.0.0.1";
    public $user="root";
    public $database="farmers_crib";
    public $password="";
    public $connection;
    public function __construct()
    {
        $this->connection=new mysqli($this->server,$this->user,
        $this->password, $this->database);
        if($this->connection->connect_error){
            die("Unable to establish connection!".$this->connection->connect_error);
        }
        else{
            echo "Database Connected Successfuly!";
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}