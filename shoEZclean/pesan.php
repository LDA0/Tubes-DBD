<?php
    if(isset($_POST['Submit'])) {
        function validate($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
    }
    // Check If form submitted, insert form data into toko table.
    if(isset($_POST['Submit'])) {
        $name = validate($_POST['name']);
        $no = validate($_POST['no']);
        $alamat = validate($_POST['alamat']);
        $id = validate($_POST['id']);
        $warna = validate($_POST['warna']);
        $ukuran = validate($_POST['ukuran']);
        if(empty($name)){
            header("Location:pesan.php?error=Name is required");
            exit();
        }
        if(empty($no)){
            header("Location:pesan.php?error=Phone Number is required");
            exit();
        }
        if(empty($alamat)){
            header("Location:pesan.php?error=Address is required");
            exit();
        }
        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO pelanggan(Nama,Nomor_HP,Alamat) VALUES('$name',$no,'$alamat')");
        if(isset($_GET['id'])) {
            $ide=$_GET['id'];
        }
        else $ide=mysqli_insert_id($mysqli);
        $result = mysqli_query($mysqli, "INSERT INTO pemesanan(id_pesanan,id_pelanggan) VALUES($id,$ide)");
        $result = mysqli_query($mysqli, "INSERT INTO sepatu(warna,ukuran,id_pelanggan,id_driver) VALUES('$warna',$ukuran,$ide,1)");
        $result= mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id_pesanan=$id");
        $row=mysqli_fetch_array($result);
        $result = mysqli_query($mysqli, "INSERT INTO transaksi(total_transaksi,id_pelanggan,id_driver) VALUES($row[Harga],$ide,1)");
        // Show message when user added
        echo "Pesanan Kamu Siap <i class='fa fa-heart'></i> <a href='Home.php'>Back</a>";
    }
?>
<html>
<head>
    <meta name="viewport" content="with=device-width", initial-scale=1.0>
    <title>SHOEZCLEAN - shoe cleaning service</title>
    <link rel="stylesheet" href="add.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/25cb584c1d.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <a href="Home-Guest.php"><img src="6TtBpggTGKvxfi5BnjRQ_image.jpeg"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="Home-Guest.php">HOME</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <section>
        <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo  $_GET['error'];?></p>
        <?php }?>
        <?php
        include_once("config.php");
        $result2=mysqli_query($mysqli,"SELECT * FROM pesanan ORDER BY id_pesanan ASC")
        ?>
        <?php if(isset($_POST['Submit'])){
                echo "<form action='pesan.php?id=$ide' method='post'>";
                echo "<table class='form-table'>";
                echo "<tr>";
                echo "<td>Nama</td>";
                echo "    <td>$name</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "    <td>Nomor HP</td>";
                    echo "     <td>$no</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "    <td>Alamat</td>";
                    echo "    <td>$alamat</td>";
                    echo "</tr>";
            }
            else {
                echo "<form action='pesan.php' method='post'>";
                echo "<table class='form-table'>";
                echo "<tr>";
                echo "<td>Nama</td>";
                echo " <td><input type='text' name='name'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "    <td>Nomor HP</td>";
                    echo "     <td><input type='text' name='no'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "    <td>Alamat</td>";
                    echo "    <td><input type='text' name='alamat'></td>";
                    echo "</tr>";
            }
            ?>
                    <tr>
                        <td>Pesanan</td>
                        <td>
                        <table class="form-table">
                        <tr>
                        <th style='color:black;'>JENIS</th> <th style='color:black;'>Harga</th> <th style='color:black;'>pilih</th>
                        </tr>
                        <?php
                        while($user_data = mysqli_fetch_array($result2)) {
                            echo "<tr>";
                            echo "<td>".$user_data['Jenis']."</td>";
                            echo "<td>".$user_data['Harga']."</td>";
                            echo "<td><input type='radio' name='id' value=".$user_data['id_pesanan']." required></td></tr>";
                            }
                        ?>
                        </table>
                    </tr>
                        </td>
                <tr>
                    <td>Warna Sepatu</td>
                    <td><input type="text" name="warna"></td>
                </tr>
                <tr>
                    <td>Ukuran Sepatu</td>
                    <td><input type="text" name="ukuran"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
        </form>
    </section>
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
