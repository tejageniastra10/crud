<?php 
	include"bootstrap.php";
?>
<?php
	include("koneksi.php");
?>
<?php
	include("index.php");
?>
<!DOCTYPE html>
<html lang="en">
<style>
	.content {
		margin-top: 80px;
	}
</style>
<head>
	<title>DATA PENDUDUK</title>
</head>
<!--/ navigasion -->
<body>
	<div class="container">
		<div class="content">
			<h2>Data Penduduk</h2>
			<hr />
			<?php
				if(isset($_GET['aksi']) == 'delete')
				{
					$nik = $_GET['nik'];
						$delete = mysqli_query($koneksi, "DELETE FROM penduduk WHERE nik='$nik'");
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
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Nik</th>
					<th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>No HP</th>
					<th>Agama</th>
					<th>Pilihan</th>
				</tr>
				<?php
					$sql = mysqli_query($koneksi, "SELECT * FROM penduduk ORDER BY nik ASC");
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
								<td>'.$row['nik'].'</td>
								<td>'.$row['nama'].'</a></td>
	                            <td>'.$row['tempat_lahir'].'</td>
	                            <td>'.$row['tanggal_lahir'].'</td>
	                            <td>'.$row['alamat'].'</td>
	                            <td>'.$row['JK'].'</td>
								<td>'.$row['no_hp'].'</td>
	                            <td>'.$row['agm_nama'].'</td>
	                            ';
							echo '
								</td>
								<td>
									
									<a href="index.php?aksi=delete&nik='.$row['nik'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-danger btn-sm"><span  aria-hidden="true"></span>Hapus</a>
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