<?php
// Create database connection using config file
include_once("config.php");
if(isset($_GET['ide'])){
    $ide = $_GET['ide'];
    $id = $_GET['id'];
    $result8= mysqli_query($mysqli, "SELECT * FROM sepatu WHERE id_sepatu=$ide");
    $i = mysqli_fetch_array($result8);
    $result8 = mysqli_query($mysqli, "UPDATE sepatu SET id_driver=$id WHERE id_sepatu=$ide");
    $result = mysqli_query($mysqli, "UPDATE transaksi SET id_driver=$id WHERE id_pelanggan=$i[id_pelanggan]");
}
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM toko ORDER BY id_admin ASC");
$result2= mysqli_query($mysqli, "SELECT * FROM pesanan ORDER BY id_pesanan ASC");
$result3= mysqli_query($mysqli, "SELECT * FROM pelanggan ORDER BY id_pelanggan ASC");
$result4= mysqli_query($mysqli, "SELECT * FROM sepatu ORDER BY id_sepatu ASC");
$result5= mysqli_query($mysqli, "SELECT * FROM driver ORDER BY id_driver ASC");
$result6= mysqli_query($mysqli, "SELECT * FROM transaksi ORDER BY id_transaksi ASC");
$result7= mysqli_query($mysqli, "SELECT * FROM pemesanan ORDER BY id_pesanan ASC"); 

?>
<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['Nama'])) {
    ?>
<html>
<head>
    <meta name="viewport" content="with=device-width", initial-scale=1.0>
    <title>SHOEZCLEAN - shoe cleaning service</title>
    <link rel="stylesheet" href="adnin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/25cb584c1d.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <a href="Home.php"><img src="6TtBpggTGKvxfi5BnjRQ_image.jpeg"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times"></i>
            <ul>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <i class="fa fa-bars"></i>
    </nav>
    <section class="header">
        <div class="konte">
            <h3 style="font-height:2000;">TABEL ADMIN</h3>
            <table class="Tabel">
            <tr>
                <th>id</th> <th>Nama</th> <th>Password</th> <th>Update</th>
            </tr>
            <?php
            while($table = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$table['id_admin']."</td>";
                    echo "<td>".$table['Nama']."</td>";
                    echo "<td>".$table['Password']."</td>";
                    echo "<td><a href='edit.php?id=$table[id_admin]&query=toko'>Edit</a> | <a href='delete.php?id=$table[id_admin]&query=toko'>Delete</a></td></tr>";
                }   
                echo "<a href='add.php?query=toko'>Add Admin</a>";
            ?>
            </table>
            <h3 style="font-height:2000;">TABEL DRIVER</h3>
            <table class="Tabel">
            <tr>
                <th>id</th> <th>Nama</th> <th>No.Hp</th> <th>Update</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result5)) {
                echo "<tr>";
                echo "<td>".$user_data['id_driver']."</td>";
                echo "<td>".$user_data['Nama']."</td>";
                echo "<td>".$user_data['Nomor_HP']."</td>";
                echo "<td><a href='Home.php?id=$user_data[id_driver]'>Insert to SEPATU</a> | <a href='delete.php?id=$user_data[id_driver]&query=driver'>Delete</a></td></tr>";
            }
                echo "<a href='add.php?query=driver'>Add Driver</a>";
            ?>
            </table>
            <h3 style="font-height:2000;">TABEL SEPATU</h3>
            <table class="Tabel">
            <tr>
                <th>id</th> <th>Warna</th> <th>Ukuran</th> <th>id_pelanggan</th> <th>id_driver</th> <th>Update</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result4)) {
                echo "<tr>";
                echo "<td>".$user_data['id_sepatu']."</td>";
                echo "<td>".$user_data['warna']."</td>";
                echo "<td>".$user_data['ukuran']."</td>";
                echo "<td>".$user_data['id_pelanggan']."</td>";
                echo "<td>".$user_data['id_driver']."</td>";
                if(isset($_GET['id'])) echo "<td><a href='Home.php?id=".$_GET['id']."&ide=$user_data[id_sepatu]'>Insert</a> | <a href='delete.php?id=$user_data[id_sepatu]&query=sepatu'>Delete</a></td></tr>";
                else echo "<td><a href='delete.php?id=$user_data[id_sepatu]&query=sepatu'>Delete</a></td></tr>";
            }
            ?>
            </table>
            <h3 style="font-height:2000;">TABEL PESANAN</h3>
            <table class="Tabel">
            <tr>
                <th>id</th> <th>JENIS</th> <th>Harga</th> <th>Record</th> <th>Update</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result2)) {
                echo "<tr>";
                echo "<td>".$user_data['id_pesanan']."</td>";
                echo "<td>".$user_data['Jenis']."</td>";
                echo "<td>".$user_data['Harga']."</td>";
                echo "<td>".$user_data['id_admin']."</td>";
                echo "<td><a href='edit.php?id=$user_data[id_pesanan]&query=pesanan'>Edit</a> | <a href='delete.php?id=$user_data[id_pesanan]&query=pesanan'>Delete</a></td></tr>";
                }
                echo "<a href='add.php?query=pesanan'>Add Pesanan</a>";
            ?>
            </table>
            <h3 style="font-height:2000;">TABEL PELANGGAN</h3>
            <table class="Tabel">
            <tr>
                <th>id</th> <th>NAMA</th> <th>No.HP</th> <th>Alamat</th> <th>Update</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result3)) {
                echo "<tr>";
                echo "<td>".$user_data['id_pelanggan']."</td>";
                echo "<td>".$user_data['Nama']."</td>";
                echo "<td>".$user_data['Nomor_HP']."</td>";
                echo "<td>".$user_data['Alamat']."</td>";
                echo "<td><a href='delete.php?id=$user_data[id_pelanggan]&query=pelanggan'>Delete</a></td></tr>";
            }
            ?>
            </table>
            <h3 style="font-height:2000;">TABEL PEMESANAN</h3>
            <table class="Tabel">
            <tr>
                <th>id_pelanggan</th> <th>id_pesanan</th> 
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result7)) {
                echo "<tr>";
                echo "<td>".$user_data['id_pelanggan']."</td>";
                echo "<td>".$user_data['id_pesanan']."</td></tr>";
                }
            ?>
            </table>
            <h3 style="font-height:2000;">TABEL TRANSAKSI</h3>
            <table class="Tabel">
            <tr>
                <th>id</th> <th>Total Transaksi</th> <th>id_pelanggan</th> <th>id_driver</th> <th>Update</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result6)) {
                echo "<tr>";
                echo "<td>".$user_data['id_transaksi']."</td>";
                echo "<td>".$user_data['total_transaksi']."</td>";
                echo "<td>".$user_data['id_pelanggan']."</td>";
                echo "<td>".$user_data['id_driver']."</td>";
                echo "<td><a href='delete.php?id=$user_data[id_transaksi]&query=transaksi'>Delete</a></td></tr>";
            }
            ?>
            </table>
        </div>
    </section>
    <section class="footer">
    <h4>About Kafka</h4>
    <p>BABIBUBEBO</p>>
    <div class="icons">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-linkedin"></i>
    </div>
    <p>Made with <i class="fa fa-heart"></i> by Shoezcleans</p>
    </section>
<script>
    var navLinks=document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right="0";
    }
    function hideMenu(){
        navLinks.style.right="-200px";
    }
</script>
</body>
</html>
<?php
}
else{
    header("Location:index.php");
    exit();
}
?>
