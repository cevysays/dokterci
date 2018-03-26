<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
	  		<div class="panel-heading">
	    		<h3 class="panel-title"><b>Data Master Tindakan</b></h3>
	  		</div>
	  		<div class="panel-body">
		  		<?php echo anchor('master_tindakan/tambah_tindakan','<i class="glyphicon glyphicon-ok"></i> Tambah Data Master Tindakan',array('class'=>'btn btn-primary btn-md'));?>
		  		<?php echo anchor('master_tindakan/cetak','<i class="glyphicon glyphicon-print"></i> Cetak Data Master Tindakan',array('class'=>'btn btn-primary btn-md', 'target'=>'_blank'));?>
	  			
	  			<hr>
	  			<?php echo $this->session->flashdata('pesan');?>
		  		<div id="unseen">
	    		<table class="table table-bordered table-hover table-condensed data-table order-table ">
				<thead>
					<tr>
	 				<th>Kode ICD9</th>
					<th>Nama Tindakan</th>
					<th>Biaya</th>
					<th>Kelola</th>
		 			</tr>
				</thead>
				<tbody>
				<?php if(empty($query)){
					echo '<tr><td colspan="6">Data tidak tersedia.</td></tr>';
					}else{
						
						foreach($query as $row) :
						?>
					<tr> 
						<td><?php echo $row->kode_tindakan;?></td>
						<td><?php echo $row->nama_tindakan;?></td>
						<td><?php echo $row->biaya;?></td>
						<td><?php ?>
						
						<?php echo anchor('master_tindakan/ubah/'.$row->tindakan_id,'<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'btn btn-sm btn-info', 'title'=>'Ubah Data'));?>
						<?php echo anchor('master_tindakan/hapus/'.$row->tindakan_id,'<i class="glyphicon glyphicon-trash"></i>',array('class'=>'btn btn-sm btn-danger','title'=>'Hapus Data','onclick'=>"return confirm('Yakin mau hapus data ini?')"));?>
						</td>
					</tr>
						<?php
						endforeach;
					}
					?>
				</tbody>
			</table>
			<ul class="pagination pagination-large pull-right">
				<?php // echo $halaman;?>
			</ul>
			</div>
	 	</div>
	</div>
</div>

	</div>
</div>