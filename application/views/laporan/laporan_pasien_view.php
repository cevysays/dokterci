<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
	  		<div class="panel-heading">
	    		<h3 class="panel-title"><b>Laporan Pasien</b></h3>
	  		</div>
	  		<div class="panel-body">
	  			<div class="well">
	  				<h4>Periode Laporan : <?php echo date('d-M-Y', strtotime($dari));?> s/d <?php echo date('d-M-Y', strtotime($sampai));?></h4>
	  			</div>
		  		<?php echo anchor('laporan','<i class="glyphicon glyphicon-backward"></i> Kembali',array('class'=>'btn btn-warning btn-md'));?>
	  			<hr>
	  			<?php echo $this->session->flashdata('pesan');?>
	  		<div id="unseen">
	    		<table class="table table-striped">
				<thead>
					<tr>
						<th>No. Registrasi</th>
						<th>Tanggal</th>
						<th>Nama Pasien</th>
						<th>Alamat</th>
						<th>Umur</th>
					</tr>
				</thead>
				<tbody>
				<?php if(empty($query)){
					echo '<tr><td colspan="6">Data tidak tersedia.</td></tr>';
					}else{
						foreach($query as $row) :
						?>
					<tr>
						<td><?php echo $row->no_reg;?></td>
						<td><?php echo $row->tanggal;?></td>
						<td><?php echo $row->namalengkap;?></td>
						<td><?php echo $row->alamat;?></td>
						<td><?php echo $row->umur;?> Th</td>
						
					</tr>	
						<?php
						endforeach;
					}
					?>
				</tbody>
			</table>
			</div>
	 	</div>
	</div>
</div>

	</div>
</div>