<?php 

class Database{

    public $host = 'localhost';
    public $user = 'root';
    public $pass =  '';
    public $db_name =  'blog_oop';
    public $conn ;
    public $error;


    public function __construct(){
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
    }

    public function insert($data){
        $data = $this->conn->query($data);

        if($data){
            return $data;
        }else{
            return false;
        }
        
    }
    public function update($data){
        $data = $this->conn->query($data);

        if($data){
            return $data;
        }else{
            return false;
        }
        
    }


    public function select($data){
        $data = $this->conn->query($data);

        

        if($data){
            if(mysqli_num_rows($data) > 0){
                return $data;
            }
        }else{
            return false;
        }
        
        
    }



    public function verify($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}







?>