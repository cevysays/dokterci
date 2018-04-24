<div class="container">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Edit Data Master Tindakan</b></h3>
				</div>
				<div class="panel-body">
					<?php echo form_open('master_tindakan/ubah/'.$query->tindakan_id);?>
					<table class="table table-striped">
						<tr>
							<th>Kode ICD9</th>
							<th>:</th>
							<th><?php echo form_input(array(
								'name'=>'kode_tindakan', 
								'class'=>'form-control',
								'id'=>'kode_tindakan',
								'autofocus'=>'autofocus',
								'required'=>'required',
								'disabled'=> TRUE,
								'value' => $query->kode_tindakan));?>
							</th>
						</tr>
						<tr>
							<th>Nama Tindakan</th>
							<th>:</th>
							<th><?php echo form_input(array(
								'name'=>'nama_tindakan', 
								'class'=>'form-control',
								'id'=>'nama_tindakan',
								'autofocus'=>'autofocus',
								'required'=>'required',
								'disabled'=> TRUE,
								'value' => $query->nama_tindakan));?>
							</th>
						</tr>
						<tr>
							<th>Biaya</th>
							<th>:</th>
							<th><?php echo form_input(array(
								'name'=>'biaya', 
								'type'=>'number', 
								'class'=>'form-control',
								'id'=>'biaya',
								'autofocus'=>'autofocus',
								'required'=>'required',
								'value' => $query->biaya));?>
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
													<?php echo anchor('master_tindakan','Kembali',array('class'=>'btn btn-danger'));?>
												</th>
											</tr>

										</table>
									</div>
								</div>
							</div>

						</div>
					</div>