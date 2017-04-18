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
	<title>DATA AGAMA</title>
</head>

<!--/ navigasion -->
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
			<h2>Data Agama</h2>
			<hr />
			<a href="tambah_agama.php" class="btn btn-sm btn-success">Tambah Data</a>
			<br>
			<?php
				if(isset($_GET['aksi']) == 'delete')
				{
					$agm_id = $_GET['agm_id'];
						$delete = mysqli_query($koneksi, "DELETE FROM agama WHERE agm_id='$agm_id'");
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
					<th>ID Agama</th>
					<th>Nama Agama</th>
					<th>Pilihan</th>
				</tr>
				<?php
					$sql = mysqli_query($koneksi, "SELECT * FROM agama ORDER BY agm_id ASC");
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
								<td>'.$row['agm_id'].'</td>
								<td>'.$row['agm_nama'].'</a></td>
	                            ';
							echo '
								</td>
								<td>
									<a href="agama.php?aksi=delete&agm_id='.$row['agm_id'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['agm_nama'].'?\')" class="btn btn-danger btn-sm"><span  aria-hidden="true"></span>Hapus</a>
									<a href="edit_agama.php?agm_id='.$row['agm_id'].'" title="Edit Data" onclick="return confirm(\'Anda yakin akan mengedit data '.$row['agm_nama'].'?\')" class="btn btn-sm btn-primary"><span  aria-hidden="true"></span> Edit </a>
									
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