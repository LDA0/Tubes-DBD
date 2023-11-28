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
    }
?>
<html>
<head>
    <meta name="viewport" content="with=device-width", initial-scale=1.0>
    <title>SHOEZCLEAN - shoe cleaning service</title>
    <link rel="stylesheet" href="ssc.css">
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
                <li><a href="#about">ABOUT</a></li>
                <li><a href="#contact">CONTACTS</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <section class="header">
    <div class="text-box">
        <h1>Mau Sepatu Segera Bersih</h1>
        <p>Pesan Sekarang<br>Layanan Shoezclean</p>
        <a href="pesan.php" class="hero-btn">Pesan</a>
    </div>
    </section>
    <section id="service" class="page">
        <div class="service-box" onclick="openModal(1)">
          <img src="konten1.png" alt="Konten 1" />
          <div class="bubble">
          <?php
        include_once("config.php");
        $result = mysqli_query($mysqli, "SELECT * FROM pesanan ORDER BY id_pesanan ASC");
        $table = mysqli_fetch_array($result);
        if ($table==true) echo "<h3>$table[Jenis]</h3>";
        else echo "<h3>KOSONG</h3>";
        ?>
          </div>
        </div>
        <div class="service-box" onclick="openModal(2)">
        <img src="konten2.png" alt="Konten 2" />
          <div class="bubble">
          <?php
        $table = mysqli_fetch_array($result);
        if ($table==true) echo "<h3>$table[Jenis]</h3>";
        else echo "<h3>KOSONG</h3>";
        ?>
          </div> 
        </div>
        <div class="service-box" onclick="openModal(3)">
        <img src="konten3.png" alt="Konten 3" />
          <div class="bubble">
          <?php
        $table = mysqli_fetch_array($result);
        if ($table==true) echo "<h3>$table[Jenis]</h3>";
        else echo "<h3>KOSONG</h3>";
        ?>
          </div>
        </div>
        <div class="service-box" onclick="openModal(4)">
        <img src="konten4.png" alt="Konten 4" />
          <div class="bubble">
          <?php
        $table = mysqli_fetch_array($result);
        if ($table==true) echo "<h3>$table[Jenis]</h3>";
        else echo "<h3>KOSONG</h3>";
        ?>
          </div>
        </div>
        <div class="service-box" onclick="openModal(5)">
        <img src="konten5.png" alt="Konten 5" />
          <div class="bubble">
          <?php
        $table = mysqli_fetch_array($result);
        if ($table==true) echo "<h3>$table[Jenis]</h3>";
        else echo "<h3>KOSONG</h3>";
        ?>
          </div>
        </div>
        <div class="service-box" onclick="openModal(6)">
        <img src="konten6.png" alt="Konten 6" />
          <div class="bubble">
          <?php
        $table = mysqli_fetch_array($result);
        if ($table==true) echo "<h3>$table[Jenis]</h3>";
        else echo "<h3>KOSONG</h3>";
        ?>
          </div>
        </div>
    </section>
    <section id="contact" class="page">
        <h2>Contact Us</h2>
        <p>
          Have any questions or want to book our services? Contact us using the
          details below:
        </p>
        <ul class="contact-details">
          <li><span class="icon">&#9742;</span> Phone: 085232899076</li>
          <li><span class="icon">&#9993;</span> Email: soezclean@gmail.com</li>
          <li><span class="icon">&#127968;</span> Address: Sukabirus, Bojongsoang</li>
        </ul>
      </section>

      <!-- Halaman Tentang Kami -->
      <section id="about" class="page">
        <h2>About Us</h2>
        <p>
          We are a dedicated team of shoe lovers to care for your shoes with
          love and expertise. With long experience in the shoe care industry, we
          use the best washing techniques and trusted cleaning products to keep
          your shoes clean, groomed and shiny. We prioritize customer
          satisfaction and are committed to providing services that exceed
          expectations. In addition, we care about the environment and use
          eco-friendly products and water-saving washing techniques. Join us and
          give your shoes the best care to maintain their beauty and quality in
          every step you take.
        </p>
      </section>

      <!-- Halaman Lokasi Kami -->
      <section id="location" class="page">
        <h2>Our Location</h2>
        <p>
          We are conveniently located in the heart of the city. Visit us at:
        </p>
        <div id="map"></div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7695.020561976195!2d107.63227931137088!3d-6.9797019965545335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1686395069049!5m2!1sen!2sid"
          width="100%"
          height="400"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </section>
    </div>

    <div id="modal1" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal(1)">&times;</span>
        <?php
        $result = mysqli_query($mysqli, "SELECT * FROM pesanan ORDER BY id_pesanan ASC");
        $table = mysqli_fetch_array($result);
        echo "<h2>$table[Jenis]  | Rp.$table[Harga]</h2>";
        ?>
        <p>Cuci Cepat dan Bersih :)</p>
        <form action="Home-Guest.php" method="post">
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" required />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required />
          </div>
          <div class="form-group">
            <label for="no">No. HP:</label>
            <input type="text" name="no" required />
          </div>
          <div class="form-group">
            <label for="warna">Warna Sepatu</label>
            <input type="text" name="warna" required />
          </div>
          <div class="form-group">
            <label for="ukuran">Ukuran Sepatu</label>
            <input type="text" name="ukuran" required />
          </div>
          <div class="form-group">
          <?php echo "<td><input type='hidden' name='id' value=$table[id_pesanan] ></td>"?>
            <input type="Submit" name="Submit" value="Pesan" />
          </div>
        </form>
      </div>
    </div>

    <div id="modal2" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal(2)">&times;</span>
        <?php
        $table = mysqli_fetch_array($result);
        echo "<h2>$table[Jenis] | Rp.$table[Harga]</h2>";
        ?>
        <p>Deskripsi konten 2.</p>
        <form form action='Home-Guest.php' method='post'>
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" required />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required />
          </div>
          <div class="form-group">
            <label for="no">No. HP:</label>
            <input type="text" name="no" required />
          </div>
          <div class="form-group">
            <label for="warna">Warna Sepatu</label>
            <input type="text" name="warna" required />
          </div>
          <div class="form-group">
            <label for="ukuran">Ukuran Sepatu</label>
            <input type="text" name="ukuran" required />
          </div>
          <div class="form-group">
          <?php echo "<td><input type='hidden' name='id' value=$table[id_pesanan] ></td>"?>
            <input type="Submit" name="Submit" value="Pesan" />
          </div>
        </form>
      </div>
    </div>

    <div id="modal3" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal(3)">&times;</span>
        <?php
        $table = mysqli_fetch_array($result);
        echo "<h2>$table[Jenis] | Rp.$table[Harga]</h2>";
        ?>
        <p>Deskripsi konten 3.</p>
        <form action="Home-Guest.php" method="post">
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" required />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required />
          </div>
          <div class="form-group">
            <label for="no">No. HP:</label>
            <input type="text" name="no" required />
          </div>
          <div class="form-group">
            <label for="warna">Warna Sepatu</label>
            <input type="text" name="warna" required />
          </div>
          <div class="form-group">
            <label for="ukuran">Ukuran Sepatu</label>
            <input type="text" name="ukuran" required />
          </div>
          <div class="form-group">
          <?php echo "<td><input type='hidden' name='id' value=$table[id_pesanan] ></td>"?>
            <input type="Submit" name="Submit" value="Pesan" />
          </div>
        </form>
      </div>
    </div>

    <div id="modal4" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal(4)">&times;</span>
        <?php
        $table = mysqli_fetch_array($result);
        echo "<h2>$table[Jenis] | Rp.$table[Harga]</h2>";
        ?>
        <p>Deskripsi konten 4.</p>
        <form action="Home-Guest.php" method="post">
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" required />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required />
          </div>
          <div class="form-group">
            <label for="no">No. HP:</label>
            <input type="text" name="no" required />
          </div>
          <div class="form-group">
            <label for="warna">Warna Sepatu</label>
            <input type="text" name="warna" required />
          </div>
          <div class="form-group">
            <label for="ukuran">Ukuran Sepatu</label>
            <input type="text" name="ukuran" required />
          </div>
          <div class="form-group">
          <?php echo "<td><input type='hidden' name='id' value=$table[id_pesanan] ></td>"?>
            <input type="Submit" name="Submit" value="Pesan" />
          </div>
        </form>
      </div>
    </div>

    <div id="modal5" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal(5)">&times;</span>
        <?php
        $table = mysqli_fetch_array($result);
        echo "<h2>$table[Jenis] | Rp.$table[Harga]</h2>";
        ?>
        <p>Deskripsi konten 5.</p>
        <form action="Home-Guest.php" method="post">
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" required />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required />
          </div>
          <div class="form-group">
            <label for="no">No. HP:</label>
            <input type="text" name="no" required />
          </div>
          <div class="form-group">
            <label for="warna">Warna Sepatu</label>
            <input type="text" name="warna" required />
          </div>
          <div class="form-group">
            <label for="ukuran">Ukuran Sepatu</label>
            <input type="text" name="ukuran" required />
          </div>
          <div class="form-group">
          <?php echo "<td><input type='hidden' name='id' value=$table[id_pesanan] ></td>"?>
            <input type="Submit" name="Submit" value="Pesan" />
          </div>
        </form>
      </div>
    </div>

    <div id="modal6" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal(6)">&times;</span>
        <?php 
        $table = mysqli_fetch_array($result);
        echo "<h2>$table[Jenis] | Rp.$table[Harga]</h2>";
        ?>
        <p>Deskripsi konten 6.</p>
        <form action="Home-Guest.php" method="post">
          <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" required />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required />
          </div>
          <div class="form-group">
            <label for="no">No. HP:</label>
            <input type="text" name="no" required />
          </div>
          <div class="form-group">
            <label for="warna">Warna Sepatu</label>
            <input type="text" name="warna" required />
          </div>
          <div class="form-group">
            <label for="ukuran">Ukuran Sepatu</label>
            <input type="text" name="ukuran" required />
          </div>
          <div class="form-group">
          <?php echo "<td><input type='hidden' name='id' value=$table[id_pesanan] ></td>"?>
            <input type="Submit" name="Submit" value="Pesan" />
          </div>
        </form>
      </div>
    </div>
    <section class="footer">
    <h4>REACH US</h4>
    <p>The Best Solution For Your Shoes Hygiene</p>
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
<script src="script.js"></script>
</body>
</html>
