<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="../css/user_form.css"> <!-- Link đến file CSS nếu có -->
</head>
<body>
    <div class="content-form">
        <div class="form-container">
            <h1>Add New User</h1>
            <form action="?act=add_user" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" required>

                    <label for="avatar">Avatar:</label>
                    <input type="file" id="avatar" name="avatar">

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>

                    <button type="submit" name="submit">Add User</button>
                </div>
            </form>
        </div>
    </div> 
</body>
</html>
