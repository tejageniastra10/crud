<?php 
	include"bootstrap.php";
?>
<?php
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<style>
	.content {
		margin-top: 80px;
	}
</style>
	
<head>
	<title>DATA JURUSAN</title>
</head>

<!--/ navigasion -->
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
			<h2>Data Jurusan</h2>
			<hr />
			<a href="tambah_jurusan.php" class="btn btn-sm btn-success">Tambah Data</a>
			<br>
			<?php
				if(isset($_GET['aksi']) == 'delete')
				{
					$id_jurusan = $_GET['id_jurusan'];
						$delete = mysqli_query($koneksi, "DELETE FROM jurusan WHERE id_jurusan='$id_jurusan'");
						if($delete)
						{
							echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
						}
						else
						{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
						}
				}
			?>
			<br/>
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>ID Jurusan</th>
					<th>Nama Jurusan</th>
					<th>Pilihan</th>
				</tr>
				<?php
					$sql = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id_jurusan ASC");
					if(mysqli_num_rows($sql) == 0)
					{
						echo '<tr><td colspan="8">Data Tidak Ditemukan.</td></tr>';
					}
					else
					{
						$no = 1;
						while($row = mysqli_fetch_assoc($sql))
						{
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['id_jurusan'].'</td>
								<td>'.$row['nama_jurusan'].'</a></td>
	                            ';
							echo '
								</td>
								<td>
									<a href="jurusan.php?aksi=delete&id_jurusan='.$row['id_jurusan'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_jurusan'].'?\')" class="btn btn-danger btn-sm"><span  aria-hidden="true"></span>Hapus</a>
									<a href="edit_jurusan.php?id_jurusan='.$row['id_jurusan'].'" title="Edit Data" onclick="return confirm(\'Anda yakin akan mengedit data '.$row['nama-jurusan'].'?\')" class="btn btn-sm btn-primary"><span  aria-hidden="true"></span> Edit </a>
									
								</td></tr>
							';
							$no++;
						}
					}
				?>
			</table>
			</div>
		</div>
	</div>
</body>
</html>