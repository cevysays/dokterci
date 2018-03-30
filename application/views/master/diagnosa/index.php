<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
	  		<div class="panel-heading">
	    		<h3 class="panel-title"><b>Data Master Diagnosa</b></h3> 
	  		</div>
	  		<div class="panel-body">
		  		<?php echo anchor('master_diagnosa/tambah_diagnosa','<i class="glyphicon glyphicon-ok"></i> Tambah Master Data Diagnosa',array('class'=>'btn btn-primary btn-md'));?>
		  		<?php echo anchor('master_diagnosa/cetak','<i class="glyphicon glyphicon-print"></i> Cetak Master Data Diagnosa',array('class'=>'btn btn-primary btn-md', 'target'=>'_blank'));?>
	  			
	  			<hr>
	  			<?php echo $this->session->flashdata('pesan');?>
	  		<div id="unseen">
	    		<table class="table table-bordered table-hover table-condensed order-table" id="master-diagnosa">
				<thead>
					<tr>	 				
						<th width="12%">Kode ICD</th>
						<th>Nama Penyakit</th>
						<th width="15%">Kelola</th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
			
			</div>
	 	</div>
	</div>
</div>

	</div>
</div>