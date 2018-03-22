<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
	  		<div class="panel-heading">
	    		<h3 class="panel-title"><b>Daftar Registrasi Pasien</b></h3>
	  		</div>
	  		<div class="panel-body">
		  		<?php echo anchor('pasien','<i class="glyphicon glyphicon-plus"></i> Registrasi Baru',array('class'=>'btn btn-warning btn-md'));?>
	  			<hr>
	  			<?php echo $this->session->flashdata('pesan');?>
	  		<div id="unseen">
	    		<table class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th>No. Urut</th>
						<!-- <th>No. Registrasi</th> -->
						<th>Nama Pasien</th>
						<th>Alamat</th>
						<th>Umur</th>
						<th>Diperiksa oleh</th>
					</tr>
				</thead>
				<tbody>
				<?php if(empty($query)){
					echo '<tr><td colspan="6">Data tidak tersedia.</td></tr>';
					}else{
						$no = 1;
						foreach($query as $row) :
						?>
					<tr>
						<td><span class="label label-danger"><?php echo $no;?></span></td>
						<!-- <td><?php echo $row->no_reg;?></td> -->
						<td><?php echo $row->namalengkap;?></td>
						<td><?php echo $row->alamat;?></td>
						<td><?php echo $row->umur;?>Th</td>
						<td><?php echo "Dokter ".$row->divisi;?></td>
						
					</tr>	
						<?php
						$no++;
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