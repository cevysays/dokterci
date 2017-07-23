<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
	  		<div class="panel-heading">
	    		<h3 class="panel-title"><b>Data Pasien</b></h3>
	  		</div>
	  		<div class="panel-body">
		  		<?php echo anchor('pasien/tambah','<i class="glyphicon glyphicon-ok"></i> Tambah Pasien',array('class'=>'btn btn-primary btn-md'));?>
		  		<?php echo anchor('pasien/cetak','<i class="glyphicon glyphicon-print"></i> Cetak Data Pasien',array('class'=>'btn btn-primary btn-md', 'target'=>'_blank'));?>
	  			
	  			<hr>
	  			<?php echo $this->session->flashdata('pesan');?>
	  		<div id="unseen">
	  			<form action="<?php echo site_url('pasien/search_keyword');?>" method = "post">
					<input size="25"  placeholder="Cari NRP Pasien ex: 00001" type="text" name = "keyword" />
					<input  type="submit" value = "Cari" />
				</form>
	  			<!-- <input type="search" class="light-table-filter" data-table="order-table" placeholder="Cari Data.." /> -->
	    		<table class="table table-bordered table-hover table-condensed order-table ">
				<thead>
					<tr>
						<th>No. Rekam</th>
						<th>Nama Pasien</th>
						<th>Alamat</th>
						<th>Umur</th>
						<th>Riwayat Penyakit</th>
						<th>Berkas Rekam Medis</th>
						<th>Tgl. Register</th>
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
						<td><?php echo $row->id;?></td>
						<td><?php echo $row->namalengkap;?></td>
						<td><?php echo $row->alamat;?></td>
						<td><?php echo $row->umur;?></td>
						<td><?php echo $row->riwayat;?></td>
						<td>
						<?php if($row->rm_upload!=''): ?>
						<a class="fancyimg" href="<?php echo base_url();?>assets/img/pasien/<?php echo $row->rm_upload;?>"><img src="<?php echo base_url();?>assets/img/pasien/<?php echo $row->rm_upload;?>" alt="" height="50px" width="50px"/></a>
					<?php endif;?>

						</td>
						<td><?php echo $row->tanggal;?></td>
						<td><?php echo anchor('pasien/ubah/'.$row->id,'<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'btn btn-sm btn-info', 'title'=>'Ubah Pasien'));?>
						<?php echo anchor('pasien/hapus/'.$row->id,'<i class="glyphicon glyphicon-trash"></i>',array('class'=>'btn btn-sm btn-danger','title'=>'Hapus Pasien','onclick'=>"return confirm('Yakin mau hapus data ini?')"));?>
						<?php echo anchor('registrasi/daftar/'.$row->id,'<i class="glyphicon glyphicon-download-alt"></i>',array('class'=>'btn btn-sm btn-success','title'=>'Registrasi Pasien'));?>
						</td>
					</tr>	
						<?php
						endforeach;
					}
					?>
				</tbody>
			</table>
			<ul class="pagination pagination-large pull-right">
				<?php echo $halaman;?>
			</ul>
			</div>
	 	</div>
	</div>
</div>

	</div>
</div>