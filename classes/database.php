<?php

class Database{
    private $server_name = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "sweets_shopping";

    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error){
            die("Unable to connect database" . $this->db_name . ":" . $this->conn->connect_error);
        }
    }
}
    
    

