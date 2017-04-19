<?php

include "koneksi.php";
				if(isset($_POST['add']))
				{
					$nim		     = $_POST['nim'];
					$nama		     = $_POST['nama'];
					$tempat_lahir	 = $_POST['tempat_lahir'];
					$tanggal_lahir	 = $_POST['tanggal_lahir'];
					$alamat		     = $_POST['alamat'];
					$jk		 	 	 = $_POST['jk'];
					$no_tlp		 	 = $_POST['no_tlp'];
					$id_jurusan		 = $_POST['id_jurusan'];
					
					$foto = $_FILES['foto']['name'];
					$tmp = $_FILES['foto']['tmp_name'];
					$fotobaru = date('dmYHis').$foto;
					$path = "foto/".$fotobaru;


					if($nim == "" || $tempat_lahir==""){
						?>
						<script type="text/javascript">
							alert "data harus diisi semua";
						</script>
						<?php
					}
					else{
					if(move_uploaded_file($tmp, $path)){
					$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'")or die (mysqli_error($koneksi));
					if(mysqli_num_rows($cek) == 0)
					{
						$insert = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim, nama, tempat_lahir, tanggal_lahir, alamat, jk, no_tlp, id_jurusan,foto) VALUES('$nim','$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$jk', '$no_tlp', '$id_jurusan','$fotobaru')") or die(mysqli_error());
							if($insert)
							{
								header("location: index.php");
							}
					}
					else
					{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIM Sudah Ada..!</div>';
					}
				}
				}
				}
			?>