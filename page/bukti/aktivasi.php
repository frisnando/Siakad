<?php

$ambil = $koneksi->query("select * from tb_mahasiswa 
    left join tb_user on tb_mahasiswa.nim = tb_user.user_id
    where tb_mahasiswa.nim='$_GET[id]'");

$data = $ambil->fetch_assoc();

$status = $data['useracc_status'];

if ($status == 0) {
    $koneksi->query("update tb_user set useracc_status=1 where user_id='$_GET[id]'");
} elseif ($status == 1) {
    $koneksi->query("update tb_user set useracc_status=0 where user_id='$_GET[id]'");
}

?>


<script>
    setTimeout(function() {
        sweetAlert({
            title: 'OKE!',
            text: 'Status berhasil diubah!',
            type: 'success'
        }, function() {
            window.location = '?page=mahasiswa';
        });
    }, 300);
</script>