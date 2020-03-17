<?php
//Include Interface Iconnect here..
include_once 'IConnect.php';
class Connection implements IConnect
{
    //Variables
    private $servername;
    private $username;
    private $password;
    private $dbname;
	private $charset;
	
    // public function __construct()
    // {
    // }
    //Add your methods below
    public function Connect()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname="addressbookdb";
        $this->charset="utf8mb4";
        try {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection Failed: ".$e->getMessage();
        }
    }
}