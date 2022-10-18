<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Mahasiswa
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Status Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $koneksi->query("select * from tb_mahasiswa 
                            inner join tb_jurusan on tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan
                            left join tb_user on tb_mahasiswa.nim = tb_user.user_id");
                            while ($data = $sql->fetch_assoc()) {

                            ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nim']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['nama_jurusan']; ?></td>
                                    <td>
                                        <?php
                                        if ($data['useracc_status'] == "1") {
                                            echo "Aktif";
                                        } else {
                                            echo "Nonaktif";
                                        }
                                        ?>
                                    </td>

                                    <td>

                                        <a href="?page=bukti&aksi=detail&id=<?php echo $data['nim']; ?>" class=" btn btn-success"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>

                                        <?php
                                        if ($data['useracc_status'] == "1") {
                                        ?>
                                            <a onclick="return confirm('Yakin Akan Menonaktifkan Akun Ini...???')" href="?page=bukti&aksi=aktivasi&status=<?php echo $data['useracc_status']; ?>&id=<?php echo $data['nim']; ?>" class=" btn btn-warning"><i class="fa fa-ban"></i> Nonaktifkan</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a onclick="return confirm('Yakin Akan Mengaktifkan Akun Ini...???')" href="?page=bukti&aksi=aktivasi&status=<?php echo $data['useracc_status']; ?>&id=<?php echo $data['nim']; ?>" class=" btn btn-primary"><i class="fa fa-check"></i> Aktifkan</a>
                                        <?php
                                        }
                                        ?>

                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>


                    </table>
                </div>
                <a onclick="return confirm('Yakin Akan Menonaktifkan Semua Akun...???')" href="?page=bukti&aksi=nonaktif_all" class=" btn btn-danger" style="margin-top: 8px;"><i class="fa fa-ban"></i> Nonaktifkan Semua</a>