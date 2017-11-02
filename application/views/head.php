<!DOCTYPE HTML>
<html>
	<head>
  <title>Sistem Informasi Praktik Dokter</title>

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/web.png">
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/plugin/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
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


  <script type="text/javascript">
 
        window.setTimeout(function(){
        $("#pesan").fadeOut(800,0).slideUp(800, function(){
         $(this).remove();
        })
      }, 2000);
      $(":file").filestyle('ButtoText', 'Pilih');  

      $(document).ready(function() {
      $("a.fancyimg").fancybox();
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
          <?php echo anchor('depan','<i class="glyphicon glyphicon-plus"></i>Sistem Informasi Praktik Dokter',array('class'=>'navbar-brand'));?>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
          <ul class="nav navbar-nav">
            <?php 
            $level = $this->session->userdata('role');

            if($level == "admin"){
              ?>
                <li class="active"> <?php echo anchor('depan','Home');?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pasien <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li> <?php echo anchor('pasien','Data Pasien');?></li>
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

