<?php


class CommentController
{
    private $model;

        public function __construct() {
            $this->model = new CommentQuery(); // Khởi tạo model
        }
    
        // Hiển thị danh sách bình luận
        public function views_comments() {
            $list_comments = $this->model->get_all_comments();
            require '../Admin/view/Form/comment.php'; // Hiển thị view
        }
        
}
?>
