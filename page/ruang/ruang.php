<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Ruang
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" kode_ruang="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Ruang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    	$no=1;

                                    	$sql = $koneksi->query("select * from tb_ruang order by kode_ruang ASC");
                                    	while ($data=$sql->fetch_assoc()) {



                                     ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_ruang']; ?></td>
                                            <td>
                                            	<a href="?page=ruang&aksi=ubah&kode_ruang=<?php echo $data['kode_ruang']; ?>" class=" btn btn-info" ><i class="fa fa-edit"></i> Ubah</a>

                                            	<a onclick="return confirm('Yakin Akan Mengahapus Data Ini...???')" href="?page=ruang&aksi=hapus&kode_ruang=<?php echo $data['kode_ruang']; ?>" class=" btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>

                                        <?php } ?>

                                     </tbody>

                               </table>

                               </div>

                                 <a href="?page=ruang&aksi=tambah" class=" btn btn-success" style="margin-top: 8px;" ><i class="fa fa-plus"></i> Tambah Data</a>
