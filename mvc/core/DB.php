<?php

class DB{

    public $conn;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "laptop";
    // cữ
    // function __construct(){
    //     $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
    //     mysqli_select_db($this->conn, $this->dbname);
    //     mysqli_query($this->conn, "SET NAMES 'utf8'");
    // }
    // mới PDO 
    function __construct(){ 
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';
        $this->conn = new PDO($dsn, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
}

?>