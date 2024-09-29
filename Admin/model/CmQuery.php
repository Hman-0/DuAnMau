<?php
class CommentQuery {
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function get_all_comments() {
        $sql = "SELECT c.*, u.username FROM comments c
                JOIN users u ON c.user_id = u.id
                ORDER BY c.created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}