<script type="text/javascript" src="<?php echo base_url();?>/public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/js/carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/js/scrolling-nav.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/js/mdb.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/js/wow.js"></script>

<script>
  new WOW().init();
</script>

<?php if (isset($scripts)) {
			foreach ($scripts as $script_name) {
				$src = base_url() . "public/js/" . $script_name; ?>
				<script src="<?=$src?>"></script>
			<?php }
		} ?>

</body>
</html>