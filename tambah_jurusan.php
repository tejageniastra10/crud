<?php 
	include"bootstrap.php";
?>
<?php
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TAMBAH DATA AGAMA </title>
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
					<li ><a href="index.php">Data Penduduk</a></li>
					<li><a href="surat_pengantar.php">Surat Pengantar</a></li>
					<li><a href="jenis_surat.php">Jenis Surat</a></li>
					<li class="active"><a href="agama.php">Agama</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Agama &raquo; Tambah Agama</h2>
			<hr />
			<?php
				if(isset($_POST['add']))
				{
					$agm_nama		 = $_POST['agm_nama'];
					$cek = mysqli_query($koneksi, "SELECT * FROM agama WHERE agm_nama='$agm_nama'");
					if(mysqli_num_rows($cek) == 0)
					{
						$insert = mysqli_query($koneksi, "INSERT INTO agama(agm_nama) VALUES('$agm_nama')") or die(mysqli_error());
							if($insert)
							{
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Penduduk Berhasil Di Simpan.</div>';
							}
							else
							{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Penduduk Gagal Di simpan !</div>';
							}
					}
					else
					{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Agama Sudah Ada..!</div>';
					}
				}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Agama</label>
					<div class="col-sm-4">
						<input type="text" name="agm_nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-4 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
						<a href="agama.php" class="btn btn-sm btn-danger">Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>