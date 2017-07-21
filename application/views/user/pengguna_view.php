
	    <div class="container">
	    	<div class="row">
	    		<div class="col-lg-12 col-sm-12 col-xs-12">
	    			<?php echo $this->session->flashdata('pesan')?>
	    			<h4>Data Pengguna</h4>
	    			<hr>

	    			<?php 
	    			if($this->session->userdata('isLogin') == TRUE){
	    				echo anchor('pengguna/tambah','<i class="glyphicon glyphicon-plus"></i> Pengguna Baru',array(
	    				'class'=>'btn btn-warning'
	    			));}?><br><br>

	    			
	    			<?php echo form_close();?>
	    			<table class="table table-bordered table-hover table-condensed">
	    				<tr class="info">
	    					<th style="text-align:center">No.</th>
	    					<th style="text-align:center">Username</th>
	    					<th style="text-align:center">Nama Asli</th>
	    					<th style="text-align:center">Level</th>
	    					<th style="text-align:center">Status</th>
	    					<th style="text-align:center">Kelola</th>
	    					<?php if($this->session->userdata('isLogin') == TRUE){ 
	    						/*echo '<th>&nbsp;</th>';*/
	    					}?>
	    				</tr>	    
	    				<?php
	    				if(empty($query)){
	    					echo '<tr class="danger"><th>Data tidak ditemukan.</th></tr>';
	    				}else{
	    				//untuk pengurutan angka
						$id = $this->uri->segment(3);
	    				if(empty($id)){
	    					$no= 1;
	    				}else{
	    					$no = $id;
	    				}	
	    				foreach($query as $row):
	    					?>
	    					<tr>
	    						<td style="text-align:center"><?php echo $no;?></td>
	    						<td><?php echo $row->username;?></td>
	    						<td><?php echo $row->namalengkap;?></td>
	    						<td style="text-align:center"><?php echo strtoupper($row->role);?></td>
	    						<td align="center"><?php 
	    						if($row->status == 1){
	    							echo '<span class="label label-info">Aktif</span>';
	    						}else{
	    							echo '<span class="label label-default">Disable</span>';
	    						}
	    						?></td>
	    						<?php if($this->session->userdata('isLogin') == TRUE){
	    						?>
	    						<td style="text-align:center">
	    						<?php 
	    						
	    						echo anchor('pengguna/ubah/'.$row->id,'<i class="glyphicon glyphicon-pencil"></i>',array(
	    							'class'=>'btn btn-sm btn-warning'
	    						));



	    						if($row->status == 1){

		    						echo '&nbsp;'. anchor('pengguna/disable/'.$row->id,'<i class="glyphicon glyphicon-remove"></i>',array(
		    							'class'=>'btn btn-sm btn-danger',
		    							'onclick'=>"return confirm('Apakah yakin ingin disable pengguna ini?')"
		    						));
	    						}else{
	    							echo '&nbsp;'. anchor('pengguna/enable/'.$row->id,'<i class="glyphicon glyphicon-ok"></i>',array(
		    							'class'=>'btn btn-sm btn-success',
		    							'onclick'=>"return confirm('Apakah yakin ingin mengaktifkan pengguna ini?')"
		    						));
	    						}

	    						echo '&nbsp;'.anchor('pengguna/hapus/'.$row->id,'<i class="glyphicon glyphicon-trash"></i>',array(
	    							'class'=>'btn btn-sm btn-danger',
	    							'onclick'=>"return confirm('Apakah yakin ingin menghapus pengguna ini?')"
	    						));

	    						?>
	    					</td><?php }?>
	    					</tr>
    						<?php
    						$no++;
	    					endforeach;
	    				}
	    				?>				
	    			</table>
	    			<?php echo $halaman;?>
	    		</div>
	    	</div>
	    	