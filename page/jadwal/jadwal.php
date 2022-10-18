<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Jadwal
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <center>
                                        <tr>
                                        	<th>No</th>
                                            <th>Mata Kuliah</th>
                                            <th>Semester</th>
                                            <th>Ruang</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Dosen</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </center>
                                    </thead>
                                    <tbody>

                                    <?php

                                    	$no=1;

                                    	$sql = $koneksi->query("select * from tb_jadwal, tb_matkul, tb_ruang, tb_dosen
                                    							WHERE   tb_jadwal.kode_mk=tb_matkul.kode_mk
                                    							AND 	tb_jadwal.kode_ruang=tb_ruang.kode_ruang
                                    							AND 	tb_jadwal.kode_dosen=tb_dosen.kode_dosen order by $no");
                                                                
                                    	while ($data=$sql->fetch_assoc()) {



                                     ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_mk']; ?></td>
                                            <td><?php echo $data['smester']; ?></td>
                                            <td><?php echo $data['nama_ruang']; ?></td>
                                            <td><?php echo $data['hari']; ?></td>
                                            <td><?php echo date('h:i', strtotime($data['jam_mulai'])).'&nbsp; - &nbsp;'.date('h:i', strtotime($data['jam_selesai'])).'&nbsp; WIB'; ?></td>
                                            <td><?php echo $data['nama_dosen']; ?></td>
                                            <td>
                                            	<a href="?page=jadwal&aksi=ubah&id=<?php echo $data['id']; ?>" class=" btn btn-info" ><i class="fa fa-edit"></i> Ubah</a>

                                            	<a onclick="return confirm('Yakin Akan Mengahapus Data Ini...???')" href="?page=jadwal&aksi=hapus&id=<?php echo $data['id']; ?>" class=" btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>

                                        <?php } ?>

                                     </tbody>

                               </table>

                               </div>

                                 <a href="?page=jadwal&aksi=tambah" class=" btn btn-success" style="margin-top: 8px;" ><i class="fa fa-plus"></i> Tambah Data</a>
