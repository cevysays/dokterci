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
	    		<table class="table table-bordered table-hover table-condensed order-table" id="master-tindakan">
				<thead>
					<tr>
	 				<th width="12%">Kode ICD</th>
					<th>Nama Tindakan</th>
					<th>Biaya</th>
					<th width="15%">Kelola</th>
		 			</tr>
				</thead>
				<tbody>
				
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