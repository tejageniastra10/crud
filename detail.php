<?php

    include 'koneksi.php';
    $nim = $_GET['nim'];
    $sql = mysqli_query($koneksi,"SELECT * FROM mahasiswa where nim='$nim'");
    
    while($row=  mysqli_fetch_array($sql)){
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Detail Mahasiswa</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="modal-popup" enctype="multipart/form-data" method="POST">
                                       
                            
                    <div class="container">
  
                        <div class="row">
                          <div class="col-md-3">
                                                                
                                        <div class="form-group">
                                        <label class="col-lg-6 control-label">Nim</label>
                                                <div class="col-lg-5">
                                                    <input style="width: 200px;"  class="form-control" type="text" name="nim" value="<?php echo $row['nim']; ?>" readonly/>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Nama</label>
                                                <div class="col-lg-5">
                                                    <input style="width: 200px;"  class="form-control" type="text" name="nama" value="<?php echo $row['nama']; ?>" readonly/>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Tempat Lahir</label>
                                                <div class="col-lg-5">
                                                    <input style="width: 200px;"  class="form-control" type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" readonly/>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Tanggal Lahir</label>
                                                <div class="col-lg-5">
                                                    <input style="width: 200px;"  class="form-control" type="text" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" readonly/>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Alamat</label>
                                                <div class="col-lg-5">
                                                    <textarea style="width: 200px" name="alamat" class="form-control" readonly><?php echo $row['alamat'];?></textarea>
                    
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">Jenis Kelamin</label>
                                                <div class="col-lg-5">
                                                    <input style="width: 200px;"  class="form-control" type="text" name="jenis_kelamin" value="<?php echo $row['jk']; ?>" readonly/>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">No HP</label>
                                                <div class="col-lg-5">
                                                    <input style="width: 200px;"  class="form-control" type="text" name="no_tlp" value="<?php echo $row['no_tlp']; ?>" readonly/>
                                                </div>
                                        </div>


                            
                        </div>
                        
                        
                         <div class="col-lg-3 control-label">
                             <a href="2.jpg" target="_blank">
                                <?php echo '<img src=foto/'.$row['foto'].' width="180" height="190">'  ?>  
                                
                             </a>
                          
                        </div>
                              
                    </div>
                 </div>
                            
                
                            
            </form>
            <?php
    }
            ?>
        </div>
    </div>
</div>