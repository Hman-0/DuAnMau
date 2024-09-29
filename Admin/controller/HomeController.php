<?php 

class HomeController {  
    public $home;

    public function __construct() {
        $this->home = new AuthQuery();
    }

    public function show() {
        // Sử dụng echo để xuất HTML
        echo '<h1>Hello</h1>';
    }
}
?>
