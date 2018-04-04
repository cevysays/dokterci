<div class="container">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Pemeriksaan Pasien</b></h3>
				</div>
				<div class="panel-body">
					<?php echo form_open('terapi/periksa/'.$pasien->no_reg.'/'.$pasien->id,['target'=>'_blank']);?>
					<input type="hidden" id="idreg" name="noreg" value="<?php echo $pasien->no_reg;?>">
					<input type="hidden" id="pasien" value="<?php echo $pasien->id;?>">
					<table class="table table-striped">
						<tr>
							<th width="10%">No. Daftar</th>
							<th width="5%">:</th>
							<th width="55%"><?php echo $pasien->no_reg;?>
							</th>
						</tr>
						<tr>
							<th>Nama Pasien</th>
							<th>:</th>
							<th><?php echo $pasien->namalengkap;?></th>
						</tr>
						<tr>
							<th>Umur</th>
							<th>:</th>
							<th><?php echo $pasien->umur;?> Th</th>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<th><?php echo $pasien->alamat;?></th>
						</tr>
						<tr>
							<th>Keluhan</th>
							<th>:</th>
							<th>
								<?php echo $pasien->keluhan;?>
							</th>
						</tr>
						<tr>
							<th>Diperiksa Oleh</th>
							<th>:</th>
							<th>
								<div class="form-group">
									<div class="col-lg-12">
										<select name="tampil" class="form-control">
											<?php if ($dokter): ?>
												<?php foreach ($dokter as $d): ?>
													<option value="<?php echo $d->id; ?>"><?php echo $d->namalengkap; ?></option>
												<?php endforeach; ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
							</th>
						</tr>
					</table>
					<h4>Data Medik Pasien</h4>
					<hr>
					<div id="notif" class="alert alert-danger" style="display:none;"></div>
					<div role="tabpanel">
						<ul class="nav nav-tabs" role="tablist">
							<li role="periksa" class="active">
								<a href="#diagnosa" aria-controls="diagnosa" role="tab" data-toggle="tab">Diagnosa</a>
							</li>
							<li role="periksa">
								<a href="#tindakan" aria-controls="tindakan" role="tab" data-toggle="tab">Tindakan</a>
							</li>
							<li role="periksa">
								<a href="#terapi" aria-controls="terapi" role="tab" data-toggle="tab">Terapi</a>
							</li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="diagnosa">
								<table class="table">
									<tr>
										<th colspan="2">Input Diagnosa</th>
									</tr>
									<tr>
										<th><?php //echo form_input(array('id'=>'formdiagnosa','class'=>'form-control'));?>
											<select name="diagnosa" id="formdiagnosa" class="form-control select2">
									<?php foreach ($list_diagnosa as $item):?>
										<!-- <option 
										value="<?=$item->diagnosa_id ?>"> -->
										<option value="<?=$item->diagnosa_id ?>">
											<?= $item->nama_penyakit ?>
											</option>
									<?php endforeach ?>
								</select>

										</th>
										<th><?php echo form_submit(array('type'=>'button','id'=>'simpandiagnosa','value'=>'Tambah','class'=>'btn btn-info'));?></th>
									</tr>
								</table>
								<div id="datadiagnosa"></div>
							</div>
							<div role="tabpanel" class="tab-pane" id="tindakan">
								<table class="table">
									<tr>
										<th colspan="2">Input Tindakan</th>
									</tr>
									<tr>
										<th><?php 
										// echo form_input(array('id'=>'formtindakan','class'=>'form-control'));
										?>

									<select name="tindakan[]" id="formtindakan" class="form-control select2">
									<?php foreach ($list_tindakan as $item):?>
										<!-- <option 
										value="<?=$item->tindakan_id ?>"> -->
										<option value="<?=$item->tindakan_id ?>">
											<?= $item->nama_tindakan ?>
											</option>
									<?php endforeach ?>

										</th>
										<th><?php echo form_submit(array('type'=>'button','id'=>'simpantindakan','value'=>'Tambah','class'=>'btn btn-info'));?></th>
									</tr>
								</table>
								<div id="datatindakan"></div>
							</div>
							<div role="tabpanel" class="tab-pane" id="terapi">
								<table class="table">
									<tr>
			  				
			  				<th>Upload Resep Dokter</th>
			  			</tr>
			  			<tr>
			  			
			  				<th>
			  					<iframe src="<?= site_url() ?>/frame_resep/index/<?= $this->uri->segment(3); ?>/<?= $this->uri->segment(4); ?>" style="border:none" width="100%"></iframe>
			  				</th>

			  			</tr>
			  		</table>
			  		<div id="dataterapi"></div>
			  	</div>
			  </div>

			  <div class="well">
			  	<?php
			  	echo form_submit(array('name'=>'submit','id'=>'submit','class'=>'btn btn-success','value'=>'Selesai Pemeriksaan',))
			  	?>
			  </div>

			</div>
		</div>
	</div>
</div>

</div>
</div>
<?php ob_start(); ?>
<script type="text/javascript">

	$(document).ready(function(){

		$('#simpandiagnosa').click(function(){
			var diagnosa = $('#formdiagnosa').val();
			var pasien = $('#pasien').val();
			var noreg = $('#idreg').val();

			if(diagnosa == ""){
				$.ajax({
					success:function(html){
						$('#notif').html('Silahkan input data diagnosa terlebih dahulu');
						$('#notif').fadeIn(1000);
						$('#notif').fadeOut(2500);
						$('#formdiagnosa').focus();
					}
				});
			}else{
				$.ajax({
					url : '<?php echo site_url();?>/terapi/tambahdiagnosa',
					type : 'POST',
					data : 'diagnosa='+diagnosa+'&noreg='+noreg+'&pasien='+pasien,
					beforeSend : function(html){
						$('#datadiagnosa').html('<center><img src="<?php echo base_url();?>assets/img/loading-gede.gif"></center>');
						$('#datadiagnosa').fadeIn(2000);
					},
					success:function(){
						$('#datadiagnosa').load('<?php echo site_url();?>/terapi/tampildiagnosa/'+noreg);
						$('#formdiagnosa').val('');
					}
				});
			}
		});


		$('#simpantindakan').click(function(){
			var tindakan = $('#formtindakan').val();
			var pasien = $('#pasien').val();
			var noreg = $('#idreg').val();

			if(tindakan == ""){
				$.ajax({
					success:function(html){
						$('#notif').html('Silahkan input data tindakan terlebih dahulu');
						$('#notif').fadeIn(1000);
						$('#notif').fadeOut(2500);
						$('#formtindakan').focus();
					}
				});
			}else{
				$.ajax({
					url : '<?php echo site_url();?>/terapi/tambahtindakan',
					type : 'POST',
					data : 'tindakan='+tindakan+'&noreg='+noreg+'&pasien='+pasien,
					beforeSend : function(html){
						$('#datatindakan').html('<center><img src="<?php echo base_url();?>assets/img/loading-gede.gif"></center>');
						$('#datatindakan').fadeIn(2000);
					},
					success:function(){
						$('#datatindakan').load('<?php echo site_url();?>/terapi/tampiltindakan/'+noreg);
						$('#formtindakan').val('');
					}
				});
			}
		});


		$('#simpanterapi').click(function(){
			var obat = $('#formobat').val();
			var etiket = $('#formetiket').val();
			var jml = $('#formjml').val();
			var pasien = $('#pasien').val();
			var noreg = $('#idreg').val();

			if(obat == "" || etiket == "" || jml == ""){
				$.ajax({
					success:function(html){
						$('#notif').html('Silahkan input data tindakan terlebih dahulu');
						$('#notif').fadeIn(1000);
						$('#notif').fadeOut(2500);
						$('#formtindakan').focus();
					}
				});

			}else{
				$.ajax({
					url : '<?php echo site_url();?>/terapi/tambahterapi',
					type : 'POST',
					data : 'obat='+obat+'&etiket='+etiket+'&jml='+jml+'&noreg='+noreg+'&pasien='+pasien,
					beforeSend : function(html){
						$('#dataterapi').html('<center><img src="<?php echo base_url();?>assets/img/loading-gede.gif"></center>');
						$('#dataterapi').fadeIn(2000);
					},
					success:function(){
						$('#dataterapi').load('<?php echo site_url();?>/terapi/tampilterapi/'+noreg);
						$('#formobat').val('');
						$('#formetiket').val('');
						$('#formjml').val('');
					}
				});
			}
		});

		var options = {
			url: function(phrase) {
				return "<?php echo site_url();?>/terapi/get_diagnosa/" + phrase;
			},
			// getValue: function(element) {
			// 	return element.nama_penyakit;
			// },
			getValue : 'nama_penyakit',
			listLocation: "diagnosa",
			list: {
				maxNumberOfElements: 2,
				match: {
					enabled: true
				}
			}
		};

		$("#formdiagnosa").easyAutocomplete(options);

	});
	$(document).on('click', '#resep', function(event) {
		event.preventDefault();
		/* Act on the event */
		var formData = new FormData($('#file_resep'));
		console.log(formData);
	});

</script>
<?php ob_end_flush(); ?>