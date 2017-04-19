<?php 
	include"bootstrap.php";
?>
<?php
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT DATA MAHASISWA</title>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>
  	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"> </script>
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
					<li class="active"><a href="index.php">Data Mahasiswa</a></li>
					<li><a href="jurusan.php">Jurusan</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa &raquo; Edit Data</h2>
			<hr/>
			<?php
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
					
					$update = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', jk='$jk',no_tlp='$no_tlp', id_jurusan='$id_jurusan' WHERE nim='$nim'") or die (mysqli_error());
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
			<form id="form2" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" value="<?php echo $row ['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="date" name="tanggal_lahir" value="<?php echo $row ['tanggal_lahir']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $row ['alamat']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-3">
						<select name="jk" class="form-control" placeholder="jenis kelamin" value="<?php echo $row ['jk']; ?>">
						<option value=""> Pilih </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_tlp" value="<?php echo $row ['no_tlp']; ?>" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jurusan</label>
					<div class="col-sm-2">
						<select name="id_jurusan" class="form-control" value="<?php echo $row ['id_jurusan']; ?>" class="form-control" placeholder="Jurusan" required>
						<?php 
							$sql = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id_jurusan ASC");
							if(mysqli_num_rows($sql) == 0)
							{
								echo '<tr><td colspan="8">Data Tidak Ditemukan.</td></tr>';
							}
							else
							{
								echo '<option value=""> Pilih </option>'; 
								while($row = mysqli_fetch_assoc($sql))
								{
									echo  '<option value='.$row['id_jurusan'].'>'.$row['nama_jurusan'].'</option>';
			 					}
			 				}
		 				?>
						</select>
					</div>
				</div>	
				<br>
				<div class="form-group">
					<label class="col-sm-5 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index.php" class="btn btn-sm btn-danger">Kembali</a>
					</div>
				</div>
			</form>
			<script type="text/javascript">

    $(document).ready(function() {
    $('#form2').bootstrapValidator({
        
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nim: {
                validators: {
                    notEmpty: {
                        message: 'NIK harus diisi'
                    },
                    stringLength: {
                        max: 5,
                        message: 'NIK harus diisi maksimal 5 karakter'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'karakter tidak valid'
                    },
                     regexp: {
                        regexp: /^[0-9]/,
                        message: 'harus berupa angka'
                    },
                    
                }
            },
            nama: {
                validators: {
                    notEmpty: {
                        message: 'nama harus diisi'
                    },
                    regexp: {
                        regexp: /[^0-9]/,
                        message: 'harus berupa hurup'
                    }
                    
                }
            },
            tempat_lahir: {
                validators: {
                    notEmpty: {
                        message: 'tempat lahir harus diisi'
                    },
                    stringLength: {
                        max: 50,
                        message: 'harus dibawah 50 kaakter'
                    },
                    regexp: {
                        regexp: /[0-9]/,
                        message: 'harus berupa hurup'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'karakter tidak valid'
                    }
                }
            },
            alamat: {
                validators: {
                    notEmpty: {
                        message: 'alamat harus diisi'
                    },
                    stringLength: {
                        max: 100,
                        message: 'karakter yang diinputan minimal 100'
                    }
                }
            },
            jk: {
                validators: {
                    notEmpty: {
                        message: 'alamat harus diisi'
                    }
                }
            },
            no_tlp: {
                validators: {
                    notEmpty: {
                        message: 'no telopon harus diisi'
                    },
                    stringLength: {
                        max: 11,
                        message: 'maksimal 11 karakter'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'karakter tidak valid'
                    },
                     regexp: {
                        regexp: /^[0-9]/,
                        message: 'harus berupa angka'
                    }
                }
            },
            id_jurusan: {
                validators: {
                    notEmpty: {
                        message: 'jurusan harus diisi'
                    }
                    
                }
            }
        }
    })
    .on('success.field.fv', function(e, data) {
            if (data.fv.getInvalidFields().length > 0) {    // There is invalid field
                data.fv.disableSubmitButtons(true);
            }
        });
});
</script>
		</div>
	</div>
</body>
</html>