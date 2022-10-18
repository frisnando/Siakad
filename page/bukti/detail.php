<?php
$nim = $_GET['id'];
?>

<style type="text/css" media="screen">
	.style2 {
		color: black;
		font-weight: bold;
		margin-left: 20px;
		font-family: "comic sans ms", cursive;
	}
</style>

<div class="col-md-9 col-sm-6">

	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Tanggal</th>
					<th>Bukti Pembayaran</th>
				</tr>
			</thead>
			<tbody>

				<?php

				$no = 1;

				$sql = $koneksi->query("select * from tb_pembayaran where nim='$nim'");
				while ($data = $sql->fetch_assoc()) {

				?>

					<tr class="odd gradeX">
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nim']; ?></td>
						<td><?php echo $data['tanggal']; ?></td>
						<td><a href="img/bukti_pembayaran/<?php echo $data['bukti_pembayaran']; ?>">
								<?php echo $data['bukti_pembayaran']; ?></a></td>
					</tr>

				<?php } ?>
			</tbody>


		</table>
	</div>

</div>