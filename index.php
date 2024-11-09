<!DOCTYPE html>
<html>
<head>
	<title>MOBILKU.CO</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="images/mobillogo.PNG" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      MOBILKU.CO
    </a>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<h4 align="center">Selamat Datang di Galeri Mobil Kami</h4>
	<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/toyotacorolla.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>MELAYANI SEPENUH HATI</h5>
        <p>Kami siap memberikan pelayanan sepenuh hati dalam kepuasan pelaanggan</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/mobilnissan.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>YOUR CAR SOLUTIONS</h5>
        <p>kami siap membantu dalam menentukan pilihan terbaik.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/mobiltoyota.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>OUR GARAGE</h5>
        <p>Silahkan pilih mobil yang tersedia.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
	<br/>
	<br/>
	<div class="container">
		<b>Silahkan input data dibawah</b>
		<br/>
		<br/>
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
			<b>Harga Mobil</b>
			<br/>
			<input type="text" name="hargamobil" class="form-control">
			<br/>
			<b>DP (%)</b>
			<br/>
			<input type="number" name="dp" min="0" max="100" class="form-control">
			<br/>
			<b>Tenor (Tahun)</b>
			<br/>
			<select name="tenor" class="form-control">
				<option value="1">1 Tahun</option>
				<option value="5">5 Tahun</option>
				<option value="10">10 Tahun</option>
				<option value="15">15 Tahun</option>
				<option value="20">20 Tahun</option>
			</select>
			<br/>
			<input type="submit" name="kirim" value="Hitung" class="btn btn-primary">
		</form>
		<?php
		if(isset($_POST['kirim']))
		{
			$hargamobil=$_POST['hargamobil'];
			$dp=$_POST['dp'];
			$tenor=$_POST['tenor'];

			$nominalbunga = 20 / 100 * (float)$hargamobil;
			$nominaldp = (float)$dp / 100 * (float)$hargamobil;
			$jumlahtenor=$tenor*12;

			$hargajual = (float)$hargamobil + (float)$nominalbunga;

			$angsuranperbulan=($hargajual-$nominaldp)/$jumlahtenor;

			?>
			<table>
				<tr>
					<td>Harga Mobil</td>
					<td>:</td>
					<td>Rp. <?php echo number_format((float)$hargamobil, 2, ",", "."); ?></td>
				</tr>
				<tr>
					<td>Bunga</td>
					<td>:</td>
					<td>20% (Rp. <?php echo number_format($nominalbunga, 2, ",", ".");?>)</td>
				</tr>
				<tr>
					<td>DP</td>
					<td>:</td>
					<td><?php echo $dp;?> % (Rp. <?php echo number_format($nominaldp, 2, ",", ".");?>)</td>
				</tr>
				<tr>
					<td>Tenor</td>
					<td>:</td>
					<td><?php echo $tenor;?> Tahun (<?php echo $jumlahtenor;?> Bulan)</td>
				</tr>
				<tr>
					<td>Angsuran Per Bulan</td>
					<td>:</td>
					<td>Rp. <?php echo number_format($angsuranperbulan, 2, ",", ".");?> / Bulan</td>
				</tr>
			</table>
			<?php
		}
		?>
	</div>

	
	<footer class="bg-dark text-white py-4">
    <div class="container">
      <div class="row">
        <!-- Kolom 1: Tentang -->
        <div class="col-md-4">
          <h5>Tentang Kami</h5>
          <p>PT. AUTO TOMI INDONESIA</p>
        </div>

        <!-- Kolom 2: Link -->
        <div class="col-md-4">
          <h5>Link Cepat</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Beranda</a></li>
            <li><a href="#" class="text-white">Tentang</a></li>
            <li><a href="#" class="text-white">Kontak</a></li>
            <li><a href="#" class="text-white">Blog</a></li>
          </ul>
        </div>

        <!-- Kolom 3: Kontak -->
        <div class="col-md-4">
          <h5>Kontak Kami</h5>
          <p>Email: info@example.com</p>
          <p>Telepon: +1 234 567 890</p>
        </div>
      </div>
    </div>
    <div class="text-center py-3">
      <p>&copy; 2024 MOBILKU.CO. Semua Hak Cipta Dilindungi.</p>
    </div>
  </footer>


</body>
</html>