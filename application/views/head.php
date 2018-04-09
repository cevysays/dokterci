<!DOCTYPE HTML>
<html>
<head>
  <title>Sistem Informasi Praktik Dokter</title>

  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/web.png">
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/datepicker3.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugin/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugin/easyautocomplete/easy-autocomplete.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugin/easyautocomplete/easy-autocomplete.themes.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/select2.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugin/dataTables/datatables.min.css" rel="stylesheet">

  <style type="text/css">
  body{ padding: 70px 0px; }


</style>



<script type="text/javascript" async="" src="<?php echo base_url();?>assets/js/script.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker3.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.js">"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/fancybox/jquery.easing-1.3.pack.js">"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/fancybox/jquery.fancybox-1.3.4.js">"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/fancybox/jquery.mousewheel-3.0.4.pack.js">"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/easyautocomplete/jquery.easy-autocomplete.min.js">"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.js">"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.min.js">"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.full.js">"></script>  
<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.full.min.js">"></script>  

<script type="text/javascript" src="<?php echo base_url();?>assets/plugin/dataTables/datatables.min.js">"></script>  

<script type="text/javascript">

  window.setTimeout(function(){
    $("#pesan").fadeOut(800,0).slideUp(800, function(){
     $(this).remove();
   })
  }, 2000);
  $(":file").filestyle('ButtoText', 'Pilih');  

  // $(document).ready(function() {
  //   $("a.fancyimg").fancybox();
  // });

  /*
  $(document).ready(function() {
    $("a.fancyimg").fancybox({
      console.log('testing');
      'onComplete': function() { // for v2.0.6+ use : 'beforeShow' 
      var win=null;
      var content = $('#fancybox-content'); // for v2.x use : var content = $('.fancybox-inner');
    
    $('#fancybox-outer').append('<div id="fancy_print"></div>'); // for v2.x use : $('.fancybox-wrap').append(...
    
    $('#fancy_print').bind("click", function(){
      win = window.open("width=200,height=200");
      self.focus();
      win.document.open();
      win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
      win.document.write('body, td { font-family: Verdana; font-size: 10pt;}');
      win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
      win.document.write(content.html());
      win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
      win.document.close();
      win.print();
      win.close();
    }); // bind
  } //onComplete
 }); // fancybox
}); //  ready
*/
  
  $(document).ready(function() {
    $('a.fancyimg').fancybox({
      'onComplete': function() {
        var win = null;
        var content = $('#fancybox-content');

        $('#fancybox-outer').append('<div id="fancy_print"></div>');

        $('#fancy_print').bind("click", function(){
          win = window.open("width=200,height=200");
          self.focus();
          win.document.open();
          win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
          win.document.write('body, td { font-family: Verdana; font-size: 10pt;}');
          win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
          win.document.write(content.html());
          win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
          win.document.close();
          win.print();
          win.close();
        });
      }
    });
  });


  //  $(document).ready(function() {
  //   $("a.fancyimg").fancybox();
  // });

  $(document).ready(function () {
    $('.select2').select2({
      placeholder:'pilih data',
      width: '100%' 
    });
    $('.data-table').dataTable({
      // "ordering":false,
      retrieve: true
    });

    $('#master-diagnosa').DataTable({
        "ajax": {
            url : "<?= site_url() ?>/master_diagnosa/get_items",
            type : 'GET'
        },
    });

    $('#master-tindakan').DataTable({
        "ajax": {
            url : "<?= site_url() ?>/master_tindakan/get_items",
            type : 'GET'
        },
    });

  });

   $(function() { 
   // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
   $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
   // save the latest tab; use cookies if you like 'em better:
   localStorage.setItem('lastTab', $(this).attr('href'));
});
   
   // go to the latest tab, if it exists:
   var lastTab = localStorage.getItem('lastTab');
   if (lastTab) {
      $('[href="' + lastTab + '"]').tab('show');
   }
});
</script>

</head>
<body>
  <div id="status-msg"></div>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php echo anchor('depan','<i class="glyphicon glyphicon-plus"></i> SI Praktik Dokter',array('class'=>'navbar-brand'));?>
      </div>
      <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
          <?php 
          $level = $this->session->userdata('role');

          if($level == "admin"){
            ?>
            <li class="active"> <?php echo anchor('depan','Home');?></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('pasien','Data Pasien');?></li>
                <li> <?php echo anchor('master_diagnosa','Data Diagnosa');?></li>
                <li> <?php echo anchor('master_tindakan','Data Tindakan');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dokter <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('terapi/index','Antrian Pasien');?></li>
                <li> <?php echo anchor('terapi/history','History Pasien');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">FO <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('registrasi','Antrian');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengguna <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('pengguna','Data Pengguna');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('laporan','Laporan Pasien Per Periode');?></li>
                <li> <?php echo anchor('pasien/cetak','Laporan Pasien Keseluruhan',['target'=>'_blank']);?></li>
                <li> <?php echo anchor('terapi/history','Laporan History Pemeriksaan Pasien');?></li>

              </ul>
            </li>
            <?php
          }elseif($level=="petugas"){
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">FO <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('registrasi','Antrian');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pasien <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('pasien','Data Pasien');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Periksa Pasien <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <?php echo anchor('terapi/index','Antrian Pasien');?></li>
              </ul>
            </li>

            <?php
          }elseif($level=="dokter"){
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dokter <b class="caret"></b></a>
              <ul class="dropdown-menu">
               <li> <?php echo anchor('terapi/index','Antrian Pasien');?></li>
               <li> <?php echo anchor('terapi/history','History Pasien');?></li>
             </ul>
           </li>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li> <?php echo anchor('laporan','Laporan Pasien Per Periode');?></li>
              <li> <?php echo anchor('pasien/cetak','Laporan Pasien Keseluruhan',['target'=>'_blank']);?></li>
              <li> <?php echo anchor('terapi/history','Laporan History Pemeriksaan Pasien');?></li>

            </ul>
          </li>

          <?php
        }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Hai, <?php echo $this->session->userdata('namalengkap');?> (<?php echo $this->session->userdata('role');?>)</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengaturan <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li> <?php echo anchor('user/profil','Profil');?></li>
            <li><?php echo anchor('auth/logout','Keluar',array(),'Yakin Mau keluar dari sistem?');?></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

