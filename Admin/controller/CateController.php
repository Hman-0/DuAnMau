<?php

class CategoryController
{
    public $categorys;

    public function __construct()
    {
        $this->categorys = new Category();
    }

    public function view_category(){
        $list_category = $this->categorys->getCategories(); 
        require_once '../Admin/view/Form/category.php';
    }
    public function form_add_category(){
        require_once './view/Form/add_category.php';
    }
    public function add_category(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $description = $_POST['description']; 
            if($this->categorys->add($name, $description)){
                header('location: ?act=category');
            }else{
                echo "Lỗi";
            }
        }
    }
    public function delete_category(){
        $id =  $_GET['id'];
        if($this->categorys->delete($id)){
            header('location: ?act=category');
        }else{
            echo "loi";
        }
    }

    public function form_update_category($id){
        $id = $_GET['id'];
        $category_value = $this->categorys->getCategorybyID($id);
        if($category_value){
            $category_value = $category_value[0];
            require_once './view/Form/update_category.php';
        } else {
            echo "Không tìm thấy danh mục";
        }
    }
    public function update_category(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $name = $_POST['name'];
 
            if($this->categorys->update($id, $name)){
                header('location: ?act=category');
            }else{
                echo "loi";
            }
        }
    }
  
}
