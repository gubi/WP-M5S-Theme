<?php
$config = get_config();
?>

<footer class="container-fluid" id="footer_main">
	<div class="row">
		<div class="container" id="footer_container">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					<div id="footer_identity" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<img src="<?php print get_home_url(); ?>/wp-content/themes/M5S/images/logo_m5s.png" alt="<?php print __('Logo', 'm5s'); ?>" />
						<p>
	                        <span><?php print $config->site_title ?></span>
	                        <span class="location"><?php print $config->location; ?></span>
	                    </p>
					</div>
				</div>
				<div class="row">
					<div id="footer_contacts" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h4><?php print __("Contatti", "m5s"); ?></h4>
						<p><?php print $config->contacts->mail; ?></p>
						<p><?php print $config->contacts->cell; ?></p>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div id="footer_adv">
					<img class="img-responsive pull-right" src="<?php print get_home_url(); ?>/wp-content/themes/M5S/images/adv_here_300x250px.png" alt="Adv here" />
				</div>
			</div>
		</div>
	</div>
</footer>
<div id="identity_bar">
	<?php print $config->site_title . " " . $config->location; ?>
	</p>
</div>

<?php wp_footer(); ?>

</body>

</html>
