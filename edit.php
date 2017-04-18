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
			<hr/>
			<?php
				$nik = $_GET['nik'];
				$sql = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE nik='$nik'");
				if(mysqli_num_rows($sql) == 0)
				{
					header("Location: index.php");
				}
				else
				{
					$row = mysqli_fetch_assoc($sql);
				}
				if(isset($_POST['save']))
				{
					//$nik		     = $_POST['nik'];
					$nama		     = $_POST['nama'];
					$tempat_lahir	 = $_POST['tempat_lahir'];
					$tanggal_lahir	 = $_POST['tanggal_lahir'];
					$alamat		     = $_POST['alamat'];
					$jk			     = $_POST['jk'];
					$no_telp		 = $_POST['no_telp'];
					$agm_id		 	 = $_POST['agm_id'];
					
					$update = mysqli_query($koneksi, "UPDATE penduduk SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', jk='$jk',no_telp='$no_telp', agm_id='$agm_id' WHERE nik='$nik'") or die (mysqli_error());
					if($update)
					{
						header("Location: edit.php?nik=".$nik."&pesan=sukses");
					}
					else
					{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
					}
				}
				if(isset($_GET['pesan']) == 'sukses')
				{
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" value="<?php echo $row ['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="date" name="tanggal_lahir" value="<?php echo $row ['tanggal_lahir']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $row ['alamat']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-3">
						<select name="jk" class="form-control" placeholder="jenis kelamin" value="<?php echo $row ['jk']; ?>">
						<option value=""> Pilih </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telp" value="<?php echo $row ['no_telp']; ?>" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Agama</label>
					<div class="col-sm-2">
						<select name="agm_id" class="form-control" value="<?php echo $row ['agm_id']; ?>" class="form-control" placeholder="Agama" required>
						<?php 
							$sql = mysqli_query($koneksi, "SELECT * FROM agama ORDER BY agm_id ASC");
							if(mysqli_num_rows($sql) == 0)
							{
								echo '<tr><td colspan="8">Data Tidak Ditemukan.</td></tr>';
							}
							else
							{
								echo '<option value=""> Pilih </option>'; 
								while($row = mysqli_fetch_assoc($sql))
								{
									echo  '<option value='.$row['agm_id'].'>'.$row['agm_nama'].'</option>';
			 					}
			 				}
		 				?>
						</select>
					</div>
				</div>	
				<br>
				<div class="form-group">
					<label class="col-sm-5 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index.php" class="btn btn-sm btn-danger">Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>