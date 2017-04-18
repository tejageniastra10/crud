<?php 
	include"bootstrap.php";
?>
<?php
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TAMBAH DATA JURUSAN </title>
</head>	
<style>
	.content {
		margin-top: 80px;
	}
</style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li ><a href="index.php">Data Mahasiswa</a></li>
					<li class="active"><a href="jurusan.php">Jurusan</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Jurusan &raquo; Tambah Jurusan</h2>
			<hr />
			<?php
				if(isset($_POST['add']))
				{
					$nama_jurusan		 = $_POST['nama_jurusan'];
					$cek = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE nama_jurusan='$nama_jurusan'");
					if(mysqli_num_rows($cek) == 0)
					{
						$insert = mysqli_query($koneksi, "INSERT INTO jurusan(nama_jurusan) VALUES('$nama_jurusan')") or die(mysqli_error());
							if($insert)
							{
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Mahasiswa Berhasil Di Simpan.</div>';
							}
							else
							{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Mahasiswa Gagal Di simpan !</div>';
							}
					}
					else
					{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Jurusan Sudah Ada..!</div>';
					}
				}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Jurusan</label>
					<div class="col-sm-4">
						<input type="text" name="nama_jurusan" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-4 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
						<a href="jurusan.php" class="btn btn-sm btn-danger">Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>