<?php
				include "koneksi.php";
				$nim = $_GET['nim'];
				$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
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
					$no_tlp			 = $_POST['no_tlp'];
					$id_jurusan		 = $_POST['id_jurusan'];
					$foto = $_FILES['foto']['name'];
					$tmp = $_FILES['foto']['tmp_name'];
					$fotobaru = date('dmYHis').$foto;
					$path = "foto/".$fotobaru;

					$update = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', jk='$jk',no_tlp='$no_tlp', id_jurusan='$id_jurusan',foto='$fotobaru' WHERE nim='$nim'") or die (mysqli_error());
					if($update)
					{
						header("Location: edit.php?nim=".$nik."&pesan=sukses");
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