<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="container">
        <div class="welcome">
            <img src="6TtBpggTGKvxfi5BnjRQ_image.jpeg" alt="Logo">
            <h1>WELCOME TO SHOEZCLEAN</h1>
        </div>
        <form action="logini.php" method="post" class="login-form">
            <h2>LOGIN</h2>
            <?php if(isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error'];?></p>
            <?php }?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
        </form>
        <button><a href="Home-Guest.php">Page Pemesan</a></button>
    </div>
</body>
</html>