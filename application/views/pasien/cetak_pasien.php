<!DOCTYPE HTML>
<html>
  <head>
    <title>Cetak Riwayat Medik Pasien</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cetak.css">
  </head>
  <body>
    <div class="title" align='center'>
      <?php echo "<center>PRAKTIK DOKTER dr. Hj. Siti Sundari, SpM,. Mkes</center>";?><br>
      <?php echo "Jln. Soeradjitirtonegoro No.67, Bendogantungan, Klaten";?><br>
      <?php echo "Telp. (0272) 323210";?> <br>
      <br>
      <?php echo "<center>LAPORAN HISTORY PEMERIKSAAN DOKTER</center>";?><br>
      <?php echo $this->session->userdata('namalengkap');?><br>
    </div>
    <div class="content"><!-- 
      <h3>Data Pasien</h3> -->
    </div>  

        <table class="table" align="center">
          <tr class="info">
              <th width="20%">NRP</th>
              <th width="30%">Nama</th>
              <th width="10%">Umur</th>
              <th width="50%">Alamat</th>
          </tr>

          <tbody>
        <?php if(empty($cetak)){
          echo '<tr><td colspan="6">Data tidak tersedia.</td></tr>';
          }else{
            foreach($cetak as $rowcetak) :
            ?>
          <tr>
            <td><?php echo $rowcetak->id;?></td>
            <td><?php echo $rowcetak->namalengkap;?></td>
            <td><?php echo $rowcetak->umur;?> Th</td>
            <td><?php echo $rowcetak->alamat;?> </td> 
          </tr> 

          <?php
            
            endforeach;
          }
          ?>
          </tbody>
        </table>
        <table width="700" border="0" cellspacing="0" cellpadding="2" align="center">
          <tr>
            <td width="1200">&nbsp;</td><br><br><br>
            <td width="164" class="style14">Hormat Kami </td>
          </tr>
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