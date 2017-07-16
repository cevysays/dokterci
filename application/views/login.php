<!DOCTYPE html>
<html>
	<head>
		<title>Sistem Informasi Praktik Dokter</title>
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/web.png">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<nav class="navbar navbar-inverse" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="login"><i class="glyphicon glyphicon-plus"></i>Sistem Informasi Praktik Dokter</a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li class="active"><a href=""><?php echo date('d F Y')?></a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
	    <div class="container">
	    	<div class="row">
		    	<div class="col-lg-4 col-sm-4 col-xs-4 col-md-offset-4">
		    		<?php echo form_open('auth/login');?>
		    		<fieldset>
		    			<legend align="center">Form Login</legend>
		    		</fieldset>
		    		<?php echo validation_errors();?>
		    		<?php echo $this->session->flashdata('pesan');?>
		    		<label>Username</label>		    		
		    		<?php echo form_input(array(
		    			'name'=>'username',
		    			'id'=>'username',
		    			'placeholder'=>'Masukkan Username',
		    			'class'=>'form-control input-lg',
		    			'autofocus'=>'autofocus'
		    		));?><br>
		    		<label>Password</label>		    		
		    		<?php echo form_password(array(
		    			'name'=>'password',
		    			'id'=>'password',
		    			'placeholder'=>'Masukkan Password',
		    			'class'=>'form-control input-lg'
		    		));?>
		    		<br>
		    		<?php
		    		echo form_submit(array(
		    			'name'=>'submit',
		    			'value'=>'Login',
		    			'class'=>'btn btn-primary btn-lg'
		    			));
		    		?>
		    		<?php
		    		echo form_reset(array(
		    			'name'=>'reset',
		    			'value'=>'Ulangi',
		    			'class'=>'btn btn-danger btn-lg'
		    			));
		    		?>
		    		<?php echo form_close();?>
		    	<hr>
		    	<footer>
		    		<p>&nbsp;</p>
		    	</footer>
		    	</div>
	    	</div>
	    </div>
	    
	</body>
</html>