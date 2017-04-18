<?php include"bootstrap.php";?>
<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>TAMBAH DATA PENDUDUK</title>
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
					<li ><a href="index.php">Lihat Data</a></li>
					<li class="active" ><a href="tambah.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container">
		<div class="content">
			<h2>Data Penduduk &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){
				$nik		     = $_POST['nik'];
				$nama		     = $_POST['nama'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$alamat		     = $_POST['alamat'];
				$JK				 = $_POST['JK'];
				$no_hp			 = $_POST['no_hp'];
				$agama_id		 = $_POST['agama_id'];
				
				
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_penduduk WHERE nik='$nik'");
				if(mysqli_num_rows($cek) == 0){
					$insert = mysqli_query($koneksi, "INSERT INTO tbl_penduduk(nik, nama, tempat_lahir, tanggal_lahir, alamat, JK, no_hp, agama_id)
															VALUES('$nik','$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$JK', '$no_hp', '$agama_id')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Penduduk Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Penduduk Gagal Di simpan !</div>';
						}
					
					
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Sudah Ada..!</div>';
				}
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-2">
						<input type="text" name="nik" class="form-control" placeholder="NIK" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tanggal_lahir" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis kelamin</label>
					<div class="col-sm-2">
						<select name="JK" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No hp</label>
					<div class="col-sm-4">
						<input type="text" name="no_hp" class="form-control" placeholder="no hp" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Agama</label>
					<div class="col-sm-2">
						<select name="agama_id" class="form-control" required>
							<option value=""> ----- </option>
							<option value="1">Hindu</option>
							<option value="2">Islam</option>
							<option value="3">Kristen</option>
							<option value="4">Budha</option>
						</select>
					</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	
</body>
</html>