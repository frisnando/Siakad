<?php
$koneksi->query("update tb_user set useracc_status=0 where level='mahasiswa'");

// SELECT * FROM `tb_pembayaran` LEFT JOIN tb_user ON tb_pembayaran.nim = tb_user.user_id

?>


<script>
    setTimeout(function() {
        sweetAlert({
            title: 'OKE!',
            text: 'Semua akun mahasiswa telah dinonaktifkan!',
            type: 'success'
        }, function() {
            window.location = '?page=mahasiswa';
        });
    }, 300);
</script>