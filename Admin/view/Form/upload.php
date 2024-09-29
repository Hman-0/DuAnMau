<?php
// Kết nối đến cơ sở dữ liệu (ví dụ: sử dụng PDO)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "du_an_mau";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kiểm tra xem có phải là phương thức POST và đã nhấn submit chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $name_product = $_POST['name_product'];
        $target_dir = "uploads/"; // Thư mục lưu trữ ảnh đã upload
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // Đường dẫn đầy đủ tới file đã upload
        $uploadOk = 1; // Biến đánh dấu xem việc upload có thành công hay không

        // Lấy thông tin về file ảnh
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem file ảnh đã tồn tại chưa
        if (file_exists($target_file)) {
            echo "Xin lỗi, file đã tồn tại.";
            $uploadOk = 0;
        }

        // Kiểm tra kích thước file
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Xin lỗi, file quá lớn.";
            $uploadOk = 0;
        }

        // Cho phép chỉ upload các định dạng file ảnh nhất định
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Xin lỗi, chỉ cho phép upload các file JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

        // Kiểm tra xem biến $uploadOk có bằng 0 hay không trước khi upload
        if ($uploadOk == 0) {
            echo "Xin lỗi, file của bạn không được upload.";
        } else {
            // Nếu tất cả đều hợp lệ, tiến hành upload file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // Lưu thông tin sản phẩm vào cơ sở dữ liệu
                $image_path = $target_file;

                // SQL để chèn dữ liệu vào bảng products
                $sql = "INSERT INTO products (name_product, image_path) VALUES (:name_product, :image_path)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':name_product', $name_product);
                $stmt->bindParam(':image_path', $image_path);
                $stmt->execute();

                echo "Thêm sản phẩm thành công.";
            } else {
                echo "Xin lỗi, đã xảy ra lỗi khi upload file.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL: " . $e->getMessage();
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}

// Đóng kết nối CSDL
$conn = null;
?>
