<?php 
	include"bootstrap.php";
?>
<?php
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TAMBAH DATA </title>
	<link rel="stylesheet" type="text/css" href="bootstrapValidator.css">
	<script type="text/javascript" src="bootstrapValidator.js"></script>
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
					<li class="active"><a href="index.php">Data Mahasiswa</a></li>
					<li><a href="jurusan.php">Jurusan</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa &raquo; Tambah Data</h2>
			<hr />
			<?php
				if(isset($_POST['add']))
				{
					$nim		     = $_POST['nim'];
					$nama		     = $_POST['nama'];
					$tempat_lahir	 = $_POST['tempat_lahir'];
					$tanggal_lahir	 = $_POST['tanggal_lahir'];
					$alamat		     = $_POST['alamat'];
					$jk		 	 	 = $_POST['jk'];
					$no_tlp		 	 = $_POST['no_tlp'];
					$id_jurusan		 = $_POST['id_jurusan'];
					
					$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'")or die (mysqli_error($koneksi));
					if(mysqli_num_rows($cek) == 0)
					{
						$insert = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim, nama, tempat_lahir, tanggal_lahir, alamat, jk, no_tlp, id_jurusan) VALUES('$nim','$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$jk', '$no_tlp', '$id_jurusan')") or die(mysqli_error());
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
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIM Sudah Ada..!</div>';
					}
				}
			?>
			<form id="form2" class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-2">
						<input type="text" name="nim" id="nik1" class="form-control" placeholder="NIM">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" id="name" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-2">
						<input type="date" name="tanggal_lahir" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-5">
						<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis kelamin</label>
					<div class="col-sm-2">
						<select name="jk" class="form-control" required>
							<option value=""> Pilih </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No hp</label>
					<div class="col-sm-2">
						<input type="text" name="no_tlp" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jurusan</label>
					<div class="col-sm-2">
					<select name="id_jurusan" class="form-control" required>
					<?php 
						$sql = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id_jurusan ASC");
						if(mysqli_num_rows($sql) == 0)
						{
							echo '<tr><td colspan="8">Data Tidak Ditemukan.</td></tr>';
						}
						else
						{
							echo '<option value=""> Pilih </option>'; 
							while($row = mysqli_fetch_assoc($sql))
							{
								echo  '<option value='.$row['id_jurusan'].'>'.$row['nama_jurusan'].'</option>';
		 					}
		 				}
	 				?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">&nbsp;</label>
					<div class="col-sm-6">
					<br>
						<a href="index.php"> <input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan"></a>
						
						<a href="index.php" class="btn btn-sm btn-danger">Kembali</a>
					</div>
				</div>
			</form>
			<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					var validator = $("#form2").bootstrapValidator({
						fields : {
							nim : {
								validators : {
									notEmpty : {
										message : "test"
									}
								}
							}
						}
					})
				});
			</script>
		</div>
	</div>
</body>
</html>