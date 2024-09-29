<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/css/login.css">
    <title>Login Admin</title>
   
</head>
<body>
    <div class="content-form">
        <div class="form-container">
            <div class="logo">
                <img src="./view/img/th__1_-removebg-preview.png" alt="">
                <p>Login</p>
            </div>
            <form action="?act=login" method="post" >
            <div class="form-row">
                    <label for="">Email</label>
                    <input type="email" name="email"  placeholder="Email">

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">

                    <button type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div> 
  
</body>
</html>