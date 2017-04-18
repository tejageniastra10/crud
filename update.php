<?php 
	include"bootstrap.php";
?>
<?php
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>EDIT DATA </title>
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
					<li class="active"><a href="index.php">Data Penduduk</a></li>
					<li><a href="surat_pengantar.php">Surat Pengantar</a></li>
					<li><a href="jenis_surat.php">Jenis Surat</a></li>
					<li><a href="agama.php">Agama</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Penduduk &raquo; Edit Data</h2>
			<hr />
			<?php
				include('konek.php');
				if(isset($_GET['nik']))
				{
					$query			= mysqli_query($koneksi,"SELECT * FROM penduduk WHERE nik = '$nik'");
					$data  			= mysqli_fetch_array($query);
					$nik			= $_GET['nik'];
					$nama			= $data['nama'];
	    			$tempat_lahir 	= $data['tempat_lahir'];
	   				$tanggal_lahir 	= $data['tanggal_lahir'];
					$alamat			= $data['alamat'];
	    			$jk 			= $data['jk'];
	    			$no_telp 		= $data['no_telp'];
					$agm_id			= $data['agm_id'];
				}
				else
				{
		 			$nama = '';
	    			$empat_lahir = '';
	    			$tanggal_lahir= '';
	    			$alamat = '';
		  			$jk = '';
		  			$no_telp = '';
	    			$agm_id = '';
				}
			?>		
			<form class="form-horizontal" action="index.php" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-2">
						<input type="text" name="nik" class="form-control" placeholder="NIK" required value="<?php echo $_GET['nik']; ?>" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required value="<?php echo $nama; ?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required value="<?php echo $tempat_lahir; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tanggal_lahir" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required value="<?php echo $tanggal_lahir; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat; ?>"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis kelamin</label>
					<div class="col-sm-2">
						<select name="jk" class="form-control" required value="<?php echo $jk; ?>">
							<option value=""> ----- </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No hp</label>
					<div class="col-sm-4">
						<input type="text" name="no_telp" class="form-control" placeholder="no hp" required value="<?php echo $no_telp; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Agama</label>
					<div class="col-sm-2">
						<select name="agm_id" class="form-control" required value="<?php echo $agm_id; ?>">
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="update" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>