<div class="container">
	<hr>
		<p>&nbsp;</p>
</div>
</div>

	  
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/exporting.js"></script>

    <script type="text/javascript">

  window.setTimeout(function(){
    $("#pesan").fadeOut(800,0).slideUp(800, function(){
     $(this).remove();
   })
  }, 2000);
  $(":file").filestyle('ButtoText', 'Pilih');  

  $(document).ready(function() {
    $("a.fancyimg").fancybox();
  });

$(document).ready(function () {
    $('.select2').select2({
      placeholder:'pilih data',
      width: '100%' 
    });
    $('.data-table').dataTable({
      "ordering":false,
    });
  });
</script>
    
	</body>
</html>