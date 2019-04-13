	<?php wp_footer(); ?>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<center>
						<?php bloginfo('name'); ?> &copy; copyright 2019

						<?php 
			            $menuLocations = get_nav_menu_locations(); 

						$menuID = $menuLocations['footer-menu']; // Get the *primary* menu ID

						$primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
			            ?>

						<div class="footer-menu">
							<ul>
								<li>
									<a href="<?= home_url() ?>">Home</a>
								</li>
								<?php foreach ($primaryNav as $key => $value): ?>
							    <li class="nav-item">
							        <a href="<?= $value->url ?>"><?= $value->title ?></a>
							    </li>
							    <?php endforeach ?>
							</ul>
						</div>

						<p>Theme created by <a href="https://z-techno.com">Z-Techno</a></p>
					</center>
				</div>
			</div>
		</div>
	</div>
	<!-- SCRIPTS -->
	<!-- JQuery -->
	<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?= get_template_directory_uri() ?>/js/mdb.min.js"></script>

	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="<?= get_template_directory_uri() ?>/slick/slick.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
	  $('.z-slider').slick({
	    dots: true,
		infinite: true,
		autoplay: true,
		speed: 300
	  });
	});
	</script>
</body>
</html>