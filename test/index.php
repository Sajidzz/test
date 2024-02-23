<?php
	include 'koneksi.php';
	$admin = mysqli_query($koneksi, "SELECT admin_address, admin_email, admin_telp FROM admins WHERE id_admin = 1 ");
	$a = mysqli_fetch_array($admin);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>HOME</title>
</head>
<body>
    <!-- pala -->
	<header>
		<div class="container">
			<h1><a href="index.php">KITCHEN</a></h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- SEARCH  -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- KATEGORI  -->
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<?php 
					$kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
					if(mysqli_num_rows($kategori) > 0 ){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="produk.php?kat=<?php echo $k['id_kategori'] ?>">
						<div class="col-5">
							<img src="img/category-icon.png" width="50px" style="margin-bottom: 5px;">
							<p><?php echo $k['nama_kategori'] ?></p>
						</div>
					</a>
				<?php }} else{ ?>
					<p>Kategori Tidak Ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- PRODUK  -->
	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php 
					$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE status_produk = 1 ORDER BY id_produk DESC lIMIT 8");
					if (mysqli_num_rows($produk) > 0) {
						while($p = mysqli_fetch_array($produk)){
				?>
					<a href="detail-produk.php?id=<?php echo $p['id_produk'] ?>">
						<div class="col-4">
							<img src="produk/<?php echo $p['gambar_produk'] ?>">
							<p class="nama"><?php echo substr($p['nama_produk'], 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Produk Tidak Ada</p>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<!-- FOOTER  -->
	<div class="footer">
		<div class="isi-footer">
			<h4>Alamat</h4>
			<p><?php echo $a['admin_address'] ?></p>

			<h4>Email</h4>
			<p><?php echo $a['admin_email'] ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $a['admin_telp'] ?></p>

		</div>
			<small>Copyright &copy; 2023 - HTY Enterprise</small>
	</div>
</body>
</html>