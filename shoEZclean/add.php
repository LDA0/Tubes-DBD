<?php 
    session_start();
    $admin=$_SESSION['id'];
    // Getting id from url
    $query=$_GET['query'];
    include_once("config.php");
    // Check If form submitted, insert form data into toko table.
    if(isset($_POST['Submit'])&&$query==='toko') {
        $name = $_POST['name'];
        $password = $_POST['password'];

        $result = mysqli_query($mysqli, "INSERT INTO toko(Nama,Password) VALUES('$name','$password')");

        echo "User added successfully. <a href='Home.php'>Back</a>";
    }
    if(isset($_POST['Submit'])&&$query==='pesanan') {
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];

        $result = mysqli_query($mysqli, "INSERT INTO pesanan(Jenis,Harga,id_admin) VALUES('$jenis',$harga,$admin)");

        echo "User added successfully. <a href='Home.php'>Back</a>";
    }
    if(isset($_POST['Submit'])&&$query==='driver') {
        $Nama = $_POST['Nama'];
        $nomor = $_POST['no'];

        $result = mysqli_query($mysqli, "INSERT INTO driver(Nama,Nomor_HP) VALUES('$Nama',$nomor)");

        echo "User  ".$_POST['no']." added successfully. <a href='Home.php'>Back</a>";
    }
    ?>
<html>
<head>
    <title>Adding</title>
    <meta name="viewport" content="with=device-width", initial-scale=1.0>
    <link rel="stylesheet" href="add.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/25cb584c1d.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <a href="Home.php"><img src="6TtBpggTGKvxfi5BnjRQ_image.jpeg"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <div class="container">
    <section>
        <?php 
        if($query==='toko'){?>
        <form <?php echo "action='add.php?query=toko'"?> method="post" name="form1">
            <table class="form-table">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>
        <?php 
        if($query==='pesanan'){?>
        <form <?php echo "action='add.php?query=pesanan'"?> method="post" name="form1">
            <table class="form-table">
                <tr>
                    <td>Jenis</td>
                    <td><input type="text" name="jenis"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>
    <?php 
        if($query==='driver'){?>
        <form <?php echo "action='add.php?query=driver'"?> method="post" name="form1">
            <table class="form-table">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="Nama"></td>
                </tr>
                <tr>
                    <td>No.HP</td>
                    <td><input type="text" name="no"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>
    </section>
</div>
</body>
<script>
    var navLinks=document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right="0";
    }
    function hideMenu(){
        navLinks.style.right="-200px";
    }
</script>
</html>
