<?php
class Database{
    protected $server="127.0.0.1";
    protected $user="root";
    protected $database="farmers_crib";
    protected $password;
    public $connection;
    public function __construct()
    {
        $this->connection=new mysqli($this->server,$ths->user,
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