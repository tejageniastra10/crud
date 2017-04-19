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
	<title>DATA MAHASISWA</title>
</head>
<!--/ navigasion -->
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
			<h2>Data Mahasiswa</h2>
			<hr/>
			<a href="tambah.php" class="btn btn-sm btn-success">Tambah Data Mahasiswa</a>
			<br>
			<?php
				if(isset($_GET['aksi']) == 'delete')
				{
					$nim = $_GET['nim'];
						$delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'");
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
					<th>Nim</th>
					<th>Nama</th>
                    <th>Foto</th>
					<th>Pilihan</th>
				</tr>
				<?php
					$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa join jurusan on mahasiswa.id_jurusan=jurusan.id_jurusan  ") or die (mysqli_error($koneksi));
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
								<td>'.$row['nim'].'</td>
								<td>'.$row['nama'].'</a></td>
	                            <td>'.$row['foto'].'</td>
	                            ';
							echo '
								</td>
								<td>
									<a href="index.php?aksi=delete&nim='.$row['nim'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-danger btn-sm"><span  aria-hidden="true"></span>Hapus</a>

									<a href="edit.php?nim='.$row['nim'].'" title="Edit Data" onclick="return confirm(\'Anda yakin akan mengedit data '.$row['nama'].'?\')" class="btn btn-sm btn-primary"><span  aria-hidden="true"></span> Edit </a>
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