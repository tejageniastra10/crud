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
	<title>DATA MAHASISWA</title>
</head>
<!--/ navigasion -->
<body>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa</h2>
			<hr />
			<?php
				if(isset($_GET['aksi']) == 'delete')
				{
					$nik = $_GET['nim'];
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
					$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nim ASC");
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
	                            <td>'.$row['tempat_lahir'].'</td>
	                            <td>'.$row['tanggal_lahir'].'</td>
	                            <td>'.$row['alamat'].'</td>
	                            <td>'.$row['JK'].'</td>
								<td>'.$row['no_tlp'].'</td>
	                            <td>'.$row['nama_jurusan'].'</td>
	                            ';
							echo '
								</td>
								<td>
									
									<a href="index.php?aksi=delete&nim='.$row['nim'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-danger btn-sm"><span  aria-hidden="true"></span>Hapus</a>
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