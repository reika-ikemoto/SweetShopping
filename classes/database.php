<?php

class Database{
    private $server_name = "us-cdbr-east-03.cleardb.com";
    private $username = "be1786ae7f8a22";
    private $password = "64d3a78c";
    private $db_name = "heroku_768162854ad8377";

    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error){
            die("Unable to connect database" . $this->db_name . ":" . $this->conn->connect_error);
        }
    }
}
    
    

