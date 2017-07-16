<div class="container">
	<div class="row"> 
	<div class="col-md-12 col-sm-12 col-lg-12">
  <!-- awal panel--->
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><b>Tambah Pasien</b></h3>
	  </div>
	  <div class="panel-body">
	  	<?php echo form_open('pasien/tambah');?>
		  <table class="table table-striped">
		  	<tr>
		  		<th>Nama Pasien</th>
		  		<th>:</th>
		  		<th><?php echo form_input(array(
		  						'name'=>'nama', 
		  						'class'=>'form-control',
		  						'id'=>'nama',
		  						'autofocus'=>'autofocus',
		  						'required'=>'required'));?>
		  		</th>
		  	</tr>
		  	<tr>	
		  		<th>Umur</th>
		  		<th>:</th>
		  		<th>
		  			<?php echo form_input(array(
		  						'name'=>'umur', 
		  						'class'=>'form-control',
		  						'id'=>'umur',
		  						'required'=>'required'));?>
		  		</th>
		  	</tr>
		  	<tr>	
		  		<th>Alamat</th>
		  		<th>:</th>
		  		<th>
		  			<?php echo form_textarea(array(
		  						'name'=>'alamat', 
		  						'class'=>'form-control',
		  						'id'=>'alamat',
		  						'required'=>'required',
		  						'rows'=>'5'));?>
		  		</th>
		  	</tr>
		  	<tr>	
		  		<th>Telp</th>
		  		<th>:</th>
		  		<th>
		  			<?php echo form_input(array(
		  						'name'=>'telp', 
		  						'class'=>'form-control',
		  						'id'=>'telp',
		  						'required'=>'required'));?>
		  		</th>
		  	</tr>
		  	<tr>
		  		<th colspan="3">
		  			<?php echo form_submit(array(
		  				'name'=>'submit',
		  				'id'=>'submit',
		  				'value'=>'Simpan Data',
		  				'class'=>'btn btn-success'
		  			));?>
		  			<?php echo anchor('pasien','Kembali',array('class'=>'btn btn-danger'));?>
		  		</th>
		  	</tr>

		  </table>
	  </div>
	</div>
  <!--- akhir panel--->
  </div>
	</div>
</div>