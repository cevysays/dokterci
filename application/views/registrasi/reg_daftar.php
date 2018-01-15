<div class="container">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Registrasi Pasien</b></h3>
				</div>
				<div class="panel-body">
					<?php echo form_open('registrasi/daftar/'.$query->id);?>
					<table class="table table-striped">
						<tr>
							<th>No. Daftar</th>
							<th>:</th>
							<th><?php echo $kode;?>
								<?php echo form_hidden('idreg',$kode);?></th>
							</tr>
							<tr>
								<th>Nama Pasien</th>
								<th>:</th>
								<th><?php echo $query->namalengkap;?></th>
							</tr>
							<tr>	
								<th>Umur</th>
								<th>:</th>
								<th><?php echo $query->umur;?> Th</th>
							</tr>
							<tr>	
								<th>Alamat</th>
								<th>:</th>
								<th><?php echo $query->alamat;?></th>
							</tr>
							<tr>	
								<th>Keluhan</th>
								<th>:</th>
								<th>
									<?php echo form_textarea(array(
										'name'=>'keluhan', 
										'class'=>'form-control',
										'id'=>'keluhan',
										'required'=>'required',
										'rows'=>'5'));?>
									</th>
								</tr>
								<!---<tr>
									<th>Divisi</th>
									<th>:</th>
									<th>
										<div class="form-group">
												<select name="tampil" class="form-control">
													<option value="umum">Dokter Umum</option>
													<option value="mata">Dokter Mata</option> 
													<option value="gigi">Dokter Gigi</option> 
												</select>
										</div>
									</th>
								</tr>-->
							<tr>
	    						<th>Divisi</th>
	    						<th>:</th>
	    						<td>
	    						<select name="divisi" class="form-control">
	    						<?php
	    							$role = array(
	    								'Umum'=>'Dokter Umum',
	    								'Mata'=>'Dokter Mata',
	    								'Gigi'=>'Dokter Gigi'
	    								);
	    							foreach($role as $row=>$value):
	    								echo '<option value="'.$row.'">'.$value.'</option>';
	    								endforeach;
	    						?>
	    						</select>
	    						</td>
	    					</tr>

								<tr>
									<th colspan="3">
										<?php echo form_submit(array(
											'name'=>'submit',
											'id'=>'submit',
											'value'=>'Daftarkan Pasien',
											'class'=>'btn btn-success'
											));?>
										</th>
									</tr>

								</table>
							</div>
						</div>
					</div>

				</div>
			</div>