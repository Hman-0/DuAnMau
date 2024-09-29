<?php  

class HomeQuery {           
    private $conn;
    public function __construct() {
        $this->conn = connectDB();   
    }

}
?>
