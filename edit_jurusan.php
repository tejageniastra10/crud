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
					<li><a href="index.php">Data Penduduk</a></li>
					<li><a href="surat_pengantar.php">Surat Pengantar</a></li>
					<li><a href="jenis_surat.php">Jenis Surat</a></li>
					<li class="active"><a href="agama.php">Agama</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Agama &raquo; Edit Data Agama</h2>
			<hr/>
			<?php
				$agm_id = $_GET['agm_id'];
				$sql = mysqli_query($koneksi, "SELECT * FROM agama WHERE agm_id='$agm_id'");
				if(mysqli_num_rows($sql) == 0)
				{
					header("Location: agama.php");
				}
				else
				{
					$row = mysqli_fetch_assoc($sql);
				}
				if(isset($_POST['save4']))
				{
					//$jenis_id	 	 = $_POST['jenis_id'];
					$agm_nama		     = $_POST['agm_nama'];
					$update = mysqli_query($koneksi, "UPDATE agama SET agm_nama='$agm_nama' WHERE agm_id='$agm_id'") or die (mysqli_error());
					if($update)
					{
						header("Location: edit_agama.php?agm_id=".$agm_id."&pesan=sukses");
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
					<label class="col-sm-3 control-label">Nama Agama</label>
					<div class="col-sm-4">
						<input type="text" name="agm_nama" value="<?php echo $row ['agm_nama']; ?>" class="form-control" placeholder="Nama Agama" required>
					</div>
				</div>
                <br>
				<div class="form-group">
					<label class="col-sm-4 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save4" class="btn btn-sm btn-primary" value="Simpan">
						<a href="agama.php" class="btn btn-sm btn-danger">Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>