<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="../css/user_details.css">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Pass</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                    <td><img src="../<?php echo htmlspecialchars($user['avatar']); ?>" alt="User Avatar"></td>
                    <td><?php echo htmlspecialchars($user['password']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td>
            <a href="?act=auth-update&id=<?= $user['id'] ?>">Sửa</a>
            <a href="?act=auth-delete&id=<?= $user['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
        </td>
                    
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
