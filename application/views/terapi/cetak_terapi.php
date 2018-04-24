<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Data Rekam Medik</title>
<style type="text/css">
<!--
.style2 {
	font-size: 14px;
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
}
.style14 {font-family: "Courier New", Courier, monospace; font-size: 13px; }
.style15 {font-size: 12px}
-->
tr th{
  font-family: "Courier New", Courier, monospace; font-size: 13px; font-weight: bold; 

}

tr td{
  font-family: "Courier New", Courier, monospace; font-size: 12px; 

}
</style>
</head>

<body onload="window.print()">
<table width="700" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <?php echo "<b><center>LAPORAN PEMERIKSAAN DOKTER</center></b>

    <center>Praktik Dokter dr. Hj. Siti Sundari, Sp.M,. M.kes <br> Jln. Soeradjitirtonegoro No.67, Bendogantungan, Klaten <br> Telp. (0272) 323210 </center>";?><hr>
    <td style="border-bottom:solid 1px #000000"><span class="style2">
    <p style="float:left;"><?php echo "Petugas : ".$this->session->userdata('namalengkap')?></p>
    <p style="float:right;">Diperiksa oleh : <?php echo $dokter->namalengkap; ?></p>
    <br />
   <br />  
    </span></td>
  </tr>
</table><br />

<table width="700" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td width="53"><span class="style14">NO. </span></td>
    <td width="164"><span class="style14">: <?php echo $pasien->no_reg;?></span></td>
	<td width="21"><span class="style15"></span></td>
    <td width="91"><span class="style14">Nama Pasien </span></td>
    <td width="151"><span class="style14">: <?php echo $pasien->namalengkap;?> </span></td>
  </tr>
  <tr>
    <td><span class="style14">Tanggal</span></td>
    <td><span class="style14">: <?php echo date('d-m-Y');?> </span></td>
	<td><span class="style15"></span></td>
    <td><span class="style14">Jam</span></td>
    <td><span class="style14">: <?php echo date('H:i:s');?></span></td>
  </tr>
  
</table><br />
<table width="700" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr><th colspan="2" align="left">Data Diagnosa</th></tr>
  <tr>
    <td style="border-top:1px solid #000;border-bottom:1px solid #000;">No.</td>
    <td style="border-top:1px solid #000;border-bottom:1px solid #000;">Diagnosa</td>
  </tr>
  <?php 
    if(empty($diagnosa)){
      echo '<tr><th colspan="2">Data tidak tersedia.</th></tr>';
    }else{
      $no = 1;
      foreach($diagnosa as $rowdiagnosa):
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $rowdiagnosa->nama_penyakit;?></td>
        </tr>
        <?php
        $no++;
      endforeach;
    }
  ?>
</table>
<br>

<table width="700" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr><th colspan="2" align="left">Data Tindakan</th></tr>
  <tr>
    <td style="border-top:1px solid #000;border-bottom:1px solid #000;">No.</td>
    <td style="border-top:1px solid #000;border-bottom:1px solid #000;">Tindakan</td>
    <td align="right" style="border-top:1px solid #000;border-bottom:1px solid #000;">Biaya(Rp)</td>
  </tr>
  <?php 
  $sum = 0;
    if(empty($tindakan)){
      echo '<tr><th colspan="2">Data tidak tersedia.</th></tr>';
    }else{
      $no = 1;
      
      foreach($tindakan as $rowtindakan):
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $rowtindakan->nama_tindakan;?></td>
          <td align="right"><?php echo number_format($rowtindakan->biaya,2,',','.');?></td>
        </tr>
        <?php
        $sum += $rowtindakan->biaya;
        $no++;
      endforeach;
    }
  ?>
</table>
<br>

<table width="700" border="0" cellspacing="0" cellpadding="0" align="center">
  <!-- <tr><th colspan="4" align="left">Data Terapi</th></tr> -->
  <tr>
    <td ><div align="left" style="border-top:1px solid #000;border-bottom:1px solid #000;">Jumlah</div></td>
    <td ><div style="border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;</div></td>
    <td ><div align="right" style="border-top:1px solid #000;border-bottom:1px solid #000;"><?php echo number_format($sum,2,',','.'); ?> </div></td>
  <!--   <td width="96"><div align="center" class="style14" style="border-top:1px solid #000;border-bottom:1px solid #000;">Jumlah</div></td> -->
     </tr>
  <!-- <?php 
  $no = 0;
  foreach($terapi as $rowterapi){
  $no++;
  ?>
  <tr>
    <td><div align="center" class="style14"><?php echo $no;?></div></td>
    <td><div align="center" class="style14"><?php echo $rowterapi->terapi;?></div></td>
    <td><div align="center" class="style14"><?php echo $rowterapi->etiket;?></div></td>
    <td><div align="center" class="style14"><?php echo $rowterapi->jml;?></div></td>
  </tr>
  <?php 
  }
  ?> -->
  
</table>
<br />
<table width="700" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td width="1200">&nbsp;</td><br><br><br>
    <td width="164" class="style14">Hormat Kami </td>
  </tr>
</table>
<script type="text/javascript">
document.onkeydown = function(e){
    if (e.keyCode==27){//--ESC--
       setTimeout('self.location.href = "<?php echo site_url();?>/terapi"',0);
      }
    else if (e.keyCode==13){//--Tombol ENTER--
       window.print();
      }
    }</script>
</body>
</html>
