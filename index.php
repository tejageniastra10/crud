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
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
									<a href="#" class="btn btn-sm btn-info"  id=' .$row["nim"].'><span  aria-hidden="true"></span> Detail </a>
								
									<a href="edit.php?nim='.$row['nim'].'" title="Edit Data" onclick="return confirm(\'Anda yakin akan mengedit data '.$row['nama'].'?\')" class="btn btn-sm btn-primary"><span  aria-hidden="true"></span> Edit </a>
									
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

	 

<div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Anggota</h4>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
            $(document).ready(function (){
                $(".btn-info").click(function (e){
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "detail.php",
                        type: "GET",
                        data : {nim: m,},
                        success: function (ajaxData){
                            $("#ModalDetail").html(ajaxData);
                            $("#ModalDetail").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
        </script>


</body>
</html>