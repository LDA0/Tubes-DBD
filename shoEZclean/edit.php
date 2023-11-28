<?php
// include database connection file
include_once("config.php");
$query=$_GET['query'];
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update'])&&$query==='toko')
{
    $id = $_POST['id'];
    $name=$_POST['name'];
    $password=$_POST['password'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE toko SET Nama='$name',Password=$password WHERE id_admin=$id");

    // Redirect to homepage to display updated user in list
    header("Location: Home.php");
}
if(isset($_POST['update'])&&$query==='pesanan')
{
    $id = $_POST['id'];
    $name=$_POST['jenis'];
    $harga=$_POST['harga'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE pesanan SET Jenis='$jenis',Harga=$harga WHERE id_pesanan=$id");

    // Redirect to homepage to display updated user in list
    header("Location: Home.php");
}
if(isset($_POST['update'])&&$query==='driver')
{
    $id = $_POST['id'];
    $Nama=$_POST['name'];
    $no=$_POST['no'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE driver SET Nama='$Nama',Nomor_HP=$no WHERE id_driver=$id");

    // Redirect to homepage to display updated user in list
    header("Location: Home.php");
}
?>


<?php
// Getting id from url
$id = $_GET['id'];
// Fetech user data based on id
$result= mysqli_query($mysqli, "SELECT * FROM toko WHERE id_admin=$id");
$result2= mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id_pesanan=$id");
$result3= mysqli_query($mysqli, "SELECT * FROM driver WHERE id_driver=$id");
?>


<html>
<head>
    <title>Edit User Data</title>
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
    if($query==='toko'){
        while($user_data = mysqli_fetch_array($result))
        {
            $name = $user_data['Nama'];
            $password = $user_data['Password'];
        }
    ?>
    <form name="update_user" method="post" action="edit.php?query=toko">
        <table class="form-table">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value=<?php echo $password;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <?php
    }?>


    <?php 
    if($query==='pesanan'){
        while($user_data = mysqli_fetch_array($result2))
        {
            $jenis = $user_data['Jenis'];
            $harga = $user_data['Harga'];
        }
    ?>
    <form name="update_user" method="post" action="edit.php?query=pesan">
        <table class="form-table">
            <tr>
                <td>Jenis</td>
                <td><input type="text" name="jenis" value=<?php echo $jenis;?>></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="jenis" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <?php
    }?>

<?php 
    if($query==='driver'){
        while($user_data = mysqli_fetch_array($result3))
        {
            $name = $user_data['Nama'];
            $Nomor_HP = $user_data['Nomor_HP'];
        }
    ?>
    <form name="update_user" method="post" action="edit.php?query=driver">
        <table class="form-table">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr>
                <td>Nomor_HP</td>
                <td><input type="text" name="Nomor_HP" value=<?php echo $Nomor_HP;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <?php
    }?>
    </section>
</div>
</body>
</html>