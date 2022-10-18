<?php
  error_reporting(0);
$koneksi = new mysqli  ("localhost","root","","siakad2");
    $content = '

    <style type="text/css">

	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px; background-color: #cccccc;}
	.tabel td{padding: 8px 5px;}
	 img{width:125px; height:130px;}
	 td{font-size:10px;}
	 th{font-size:10px;}

	 .style2 {
    color: black;
    font-weight: bold;
    margin-left:20px ;

}
	</style>


';
    $content .= '
<page>


<table align="center">
<tr>
	<td rowspan="50" ><img src="../assets/img/picture1.png" width="125" heght="125"/></td>
	<td style="font-size: 17px;" center; >Persatuan Guru Republik Indonesia</td>
</tr>
<tr>

</tr>
<tr style="text-align: center;">
	<td style="font-size: 16px; text-align: center;">Palangka Raya</td>
</tr>

<tr>
	<td style="font-size: 11px; text-align: center;">Jl.Hiu Putih Raya,Bukit Tunggal, Kec.Jekan Raya, 
	<br> Kota Palangka Raya, Kalimantan Tengah 73112</td>
</tr>
<tr>
	<td style="font-size: 11px; text-align: center;">Telp: 081348424282</td>
</tr>
<tr>
	<td style="font-size: 11px; text-align: center;"> Website :http://web.upgriplk.ac.id/</td>
</tr>
<br>
<hr>



</table>


<h3 style="text-align:center;">Kartu Rencana Studi (KRS)</h3>';

	$nim = $_GET['id'];
	$sql1 = $koneksi->query("SELECT * from  tb_mahasiswa , tb_jurusan, tb_dosen
							WHERE  tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan 
							AND    	tb_dosen.kode_dosen = tb_dosen.kode_dosen
							
							AND tb_mahasiswa.nim='$nim'");
	$tampil=$sql1->fetch_assoc();


	$sql2 = $koneksi->query("select * from tb_dosen where kode_dosen='$id'");
	$content .= '

	
<table border="" class="" align="center">

	<tr>
	
	  <td  width="10"></td>
	  <td>Nama</td>
	  <td>:</td>
	  <td width="250">'.$tampil['nama'].'</td>
	
	  <td>Fakultas</td>
	  <td>:</td>
	  <td>'.$tampil['fakultas'].'</td>
	</tr>

	<tr>
		<td  width="30"></td>
	  	<td>N.P.M</td>
		<td>:</td>
		<td width="250">'.$tampil['nim'].'</td>

		<td>Program Studi</td>
		<td>:</td>
		<td>'.$tampil['nama_jurusan'].'</td>
	</tr>
	<tr>
	  <td  width="30"></td>
	  <td>Alamat</td>
	  <td>:</td>
	  <td width="250">'.$tampil['alamat'].'</td>

	  <td>Dosen PA</td>
	  <td>:</td>
	  <td>'.$tampil['nama_dosen'].'</td>

	  
	</tr>
	<tr>
		<td  width="30"></td>
	  	<td>Jurusan</td>
		<td>:</td>
		<td width="250">'.$tampil['nama_jurusan'].'</td>
		
		<td>NIP</td>
	  	<td>:</td>
	 	 <td>'.$tampil['nip'].'</td>
		
	</tr>

	<tr>
		<td  width="30"></td>
		<td></td>
 		<td></td>
 		<td width="250">'.$tampil[''].'</td>

		 <td>Semester</td>
		 <td>:</td>
		 <td >'.$tampil['smester'].'</td>
	
	</tr>
</table>

<br>

<table border="1" class="tabel" align="center" width="300">


		<tr>
			<th rowspan="2" colspan=""  align="center">No</th>
            <th rowspan="2" align="center">Kode MK</th>
            <th rowspan="2" align="center">Nama Mata Kuliah</th>
            <th rowspan="2" align="center">SKS</th>
            <th rowspan="2" align="center" width="500px">Dosen/NIP</th>
            <th colspan="2" align="center"></th>
		</tr>
		<tr>
			
		</tr>
';

$tgl4 = date("d M Y");

$smester = $_GET['smester'];
$nim = $_GET['id'];



$no=1;
$sql = $koneksi->query("SELECT * from tb_krs , tb_matkul, tb_dosen, tb_jadwal, tb_ruang
						WHERE   tb_matkul.kode_mk = tb_krs.kode_mk
						AND    	tb_dosen.kode_dosen = tb_jadwal.kode_dosen
						AND 	tb_matkul.kode_mk = tb_jadwal.kode_mk
						AND 	tb_jadwal.kode_ruang = tb_ruang.kode_ruang
						AND 	tb_krs.nim='$nim'
						AND 	tb_matkul.smester='$smester'");
while ($data=$sql->fetch_assoc()) {

$content .= '

        	<tr>
		        <td colspan="">'.$no++.'</td>
		        <td> '.$data['kode_mk'].'</td>
		        <td>'. $data['nama_mk'].'</td>
		        <td align="center">'.$data['sks'].'</td>
		        <td>'.$data['nama_dosen'].'<br>'.$data['nip'].'</td>
		     	
		    </tr>

        ';

         $jml_krs = $jml_krs+$data['sks'];
        }

        $content .= '

	        <tr>
		        <th style="text-align: center; " colspan="3">Total SKS</th>
		        <td align="right"><b> '.$jml_krs.' </b></td>
		        <td colspan="5"></td>
		    </tr>';

$content .= '

</table>
<br>

<table border="">
		<tr>
			
		<td  width="10"></td>
		<td></td>
		<td></td>
		<td width="350"></td>

		<td></td>
		<td></td>
		<td>Palangka Raya, '.date('d F Y').'</td>
		</tr>
		
		<tr>
		<td  width="30"></td>
		<td></td>
		<td></td>
		<td width="350"></td>

		<td></td>
		<td></td>
		<td>Mahasiswa Yang Bersangkutan,<br><br><br><br><br></td>
		
		</tr>

		
		<tr>
		
		<td  width="10"></td>
		<td></td>
		<td></td>
		<td width="350"> </td>
		
		<td></td>
		<td></td>
		<td align="center" >'.$tampil['nama'].'<br>'.$tampil['nim'].'<br><br><br><br><br></td>
		</tr>


		<tr >

		<td  width="30"></td>
		<td></td>
		<td></td>
		<td width="350"> Mensahkan <br>Ketua Program Studi,</td>

		<td></td>
		<td></td>
		<td>Mensahkan<br>Dosen Pembimbing Akademik, </td>
		</tr>



	<tr>
		<td  width="50"></td>
		<td></td>
 		<td></td>
 		<td width="350"><br><br><br><br>Kurjunaidi, Sos., M.Hum <br> NIP:</td>

		 <td></td>
		 <td></td>
		 <td align="center" ><br><br><br><br>'.$tampil['nama_dosen'].'<br>'.$tampil['nip'].'</td>
	
	</tr>

	
			
  	
</table>

</page>';

    require_once('../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','F4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('krs_mahasiswa.pdf');
?>
