<div class="container">
	<div class="row"> 
		<div class="col-md-12 col-sm-12 col-lg-12">
			<!-- awal panel-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Tambah Data Master Diagnosa</b></h3>
				</div>
				<div class="panel-body">
					<?php echo form_open_multipart('master_diagnosa/tambah_diagnosa');?>
					<table class="table table-striped">
						<tr>
							<th>Kode ICD</th>
							<th>:</th>
							<th><?php echo form_input(array(
								'name'=>'kode_icd', 
								'class'=>'form-control',
								'id'=>'nama',
								'autofocus'=>'autofocus',
								'required'=>'required'));?>
							</th>
						</tr>
						<tr>
							<th>Nama Penyakit</th>
							<th>:</th>
							<th><?php echo form_input(array(
								'name'=>'nama_penyakit', 
								'class'=>'form-control',
								'id'=>'nama',
								'autofocus'=>'autofocus',
								'required'=>'required'));?>
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
													<?php echo anchor('master_diagnosa','Kembali',array('class'=>'btn btn-danger'));?>
												</th>
											</tr>

										</table>
									</div>
								</div>
  <!--- akhir panel--->
  </div>
	</div>
</div>
