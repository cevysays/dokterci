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
	    		<table class="table table-bordered table-hover table-condensed data-table order-table ">
				<thead>
					<tr>	 				
						<th>Kode ICD</th>
						<th>Nama Penyakit</th>
						<th>Kelola</th>
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

<script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
 
                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "master_diagnosa/json", "type": "POST"},
                    columns: [
                        {
                            "data": "ID",
                            "orderable": false
                        },
                        {"data": "diagnosa_id"},
                        {"data": "kode_icd"},
                        {"data": "nama_penyakit"},
                        {"data": "view"}
                    ],
                    order: [[1, 'asc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>