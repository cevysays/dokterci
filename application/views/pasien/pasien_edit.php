<div class="container">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Edit Pasien</b></h3>
				</div>
				<div class="panel-body">
					<?php echo form_open_multipart('pasien/ubah/'.$query->id);?>
					<table class="table table-striped">
						<tr>
							<th>Nama Pasien</th>
							<th>:</th>
							<th><?php echo form_input(array(
								'name'=>'nama', 
								'class'=>'form-control',
								'id'=>'nama',
								'autofocus'=>'autofocus',
								'required'=>'required',
								'value'=>$query->namalengkap));?>
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
									'required'=>'required',
									'value'=>$query->umur));?>
								</th>
							</tr>
							<tr>
	    						<th>Jenis Kelamin</th>
	    						<th>:</th>
	    						<td>
	    						<select name="jenis_kelamin" class="form-control">
	    						<?php
	    							$role = array(
	    								'L'=>'L',
	    								'P'=>'P',
	    								);
	    							foreach($role as $row=>$value):
	    								echo '<option value="'.$row.'">'.$value.'</option>';
	    								endforeach;
	    						?>
	    						</select>
	    						</td>
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
										'rows'=>'5',
										'value'=>$query->alamat));?>
									</th>
								</tr>
								<tr>	
									<th>Riwayat Sakit</th>
									<th>:</th>
									<th>
										<?php echo form_textarea(array(
											'name'=>'riwayat', 
											'class'=>'form-control',
											'id'=>'riwayat',
											// 'required'=>'required',
											'rows'=>'5',
											'value'=>$query->riwayat));?>
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
												'required'=>'required',
												'value'=>$query->telp));?>
											</th>
										</tr>
										<tr>	
											<th>Upload Rekam Medis</th>
											<th>:</th>
											<th>
												<input type="file" class="filestyle" name="rm_upload">

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
							</div>

						</div>
					</div>