<?php 
	include"bootstrap.php";
?>
<?php
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT DATA JURUSAN</title>
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
					<li><a href="index.php">Data Mahasiswa</a></li>
					<li class="active"><a href="jurusan.php">Jurusan</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Jurusan &raquo; Edit Data Jurusan</h2>
			<hr/>
			<?php
				$id_jurusan = $_GET['id_jurusan'];
				$sql = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$id_jurusan'");
				if(mysqli_num_rows($sql) == 0)
				{
					header("Location: jurusan.php");
				}
				else
				{
					$row = mysqli_fetch_assoc($sql);
				}
				if(isset($_POST['save4']))
				{
					//$jenis_id	 	 = $_POST['jenis_id'];
					$nama_jurusan		     = $_POST['nama_jurusan'];
					$update = mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id_jurusan='$id_jurusan'") or die (mysqli_error());
					if($update)
					{
						header("Location: edit_jurusan.php?id_agama=".$id_agama."&pesan=sukses");
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
					<label class="col-sm-3 control-label">Nama Jurusan</label>
					<div class="col-sm-4">
						<input type="text" name="nama_jurusan" value="<?php echo $row ['nama_jurusan']; ?>" class="form-control" placeholder="Nama Jurusan" required>
					</div>
				</div>
                <br>
				<div class="form-group">
					<label class="col-sm-4 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save4" class="btn btn-sm btn-primary" value="Simpan">
						<a href="jurusan.php" class="btn btn-sm btn-danger">Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>