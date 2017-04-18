<?php include"bootstrap.php";?>
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
<title>DATA PENDUDUK</title>
</head>


<!--/ navigasion -->
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Lihat Data</a></li>
					<li><a href="tambah.php">Tambah Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Penduduk</h2>
			<hr />
			
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				/*$nik = $_GET['nik'];
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_penduduk WHERE nik='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{*/
					$delete = mysqli_query($koneksi, "DELETE FROM tbl_penduduk WHERE nik='$nik'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				//}
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
					<th>Tools</th>
				</tr>
				<?php
				
			

			
				$sql = mysqli_query($koneksi, "SELECT * FROM tbl_penduduk ORDER BY nik ASC");
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
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
                            <td>'.$row['agama_id'].'</td>
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