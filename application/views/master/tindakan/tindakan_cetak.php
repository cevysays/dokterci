<!DOCTYPE HTML>
<html>
  <head>
    <title>Cetak Riwayat Medik Pasien</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cetak.css">
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
    <b><center>MASTER DATA TINDAKAN</center></b>

    <center>Praktik Dokter dr. Hj. Siti Sundari, Sp.M,. M.kes <br> Jln. Soeradjitirtonegoro No.67, Bendogantungan, Klaten <br> Telp. (0272) 323210 </center><br>
    <!--<?php echo "<center>Oleh : ".$this->session->userdata('namalengkap')."</center>";?><br>-->
    <td style="border-bottom:solid 1px #000000"><span class="style2"> 
    </span></td>
  </tr>
</table><br />

    <!--<div class="title" align='center'>
      <?php echo "<center>PRAKTIK DOKTER dr. Hj. Siti Sundari, Sp.M,. M.kes</center>";?><br>
      <?php echo "Jln. Soeradjitirtonegoro No.67, Bendogantungan, Klaten";?><br>
      <?php echo "Telp. (0272) 323210";?> <br>
      <br>
      <?php echo "<center>LAPORAN HISTORY PEMERIKSAAN DOKTER</center>";?><br>
      <?php echo $this->session->userdata('namalengkap');?><br>
    </div>-->


    <div class="content"><!-- 
      <h3>Data Pasien</h3> -->
    </div>  

        <table class="table" align="center">
          <tr class="info">
              <th width="20%">Kode ICD9</th>
              <th width="30%">Nama Tindakan</th>
              <th width="30%">Biaya</th>
          </tr>

          <tbody>
        <?php if(empty($cetak)){
          echo '<tr><td colspan="6">Data tidak tersedia.</td></tr>';
          }else{
            foreach($cetak as $rowcetak) :
            ?>
          <tr>
            <td><?php echo $rowcetak->kode_tindakan;?></td>
            <td><?php echo $rowcetak->nama_tindakan;?></td>
            <td><?php echo $rowcetak->biaya;?></td>
           
          </tr> 

          <?php
            
            endforeach;
          }
          ?>
          </tbody>
        </table>

 </body>
</html>
<script type="text/javascript">
document.onkeydown = function(e){
    if (e.keyCode==27){//--ESC--
       setTimeout('self.location.href = "<?php echo site_url();?>/laporan"',0);
      }
    else if (e.keyCode==13){//--Tombol ENTER--
       window.print();
      }
    }
</script>