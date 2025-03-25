<?php

class DBController{
    private $conn=null;
    private $host="localhost";
    private $user="root";
    private $pw="";
    private $dbname="mobile";

    function __construct(){
        $conn=$this->connectDB();
        if(!empty($conn)){
            $this->conn=$conn;
        }
    }

    function connectDB(){
        $conn=mysqli_connect($this->host,
                             $this->user,
                             $this->pw,
                             $this->dbname);
        return $conn;
    }

    function executeSelectedQuery($query){
        $result = mysqli_query($this->conn,$query);
        $resultset=[];
        while($row=mysqli_fetch_assoc($result)){
            $resultset[]=$row;
        }
        return $resultset;
    }

    function closeDB(){
        if(!empty($conn)){
            mysqli_close($this->conn);
        }
        $this->conn=null;
    }
}