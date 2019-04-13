<?php get_header() ?>

<div class="container content">
	<div class="row">
		<?php 
		if(have_posts())
			while(have_posts()){
				the_post();
		?>
		<div class="col-sm-12">
			
			<!-- blog list container -->
			<div class="blog-list-container">
				<div class="row">
					<div class="col-sm-12 blog-thumbnail">
							<?php if(get_the_post_thumbnail_url()): ?>
							<img src="<?=get_the_post_thumbnail_url()?>" width="100%" height="auto">
							<?php endif ?>
					</div>
				</div>
				<div class="blog-list-content">
					<div class="row">
						<div class="col-sm-12 blog-content">
							<div class="blog-list-title">
								<h2>
								<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
								</h2>
							</div>
							<div class="blog-list-info">
								<span><i class="fas fa-calendar-alt"></i> <?= get_the_date('j F, Y') ?></span>
								|
								<span><i class="fas fa-user"></i> <?php the_author() ?></span>
							</div>
							<!-- excerpt and read more -->
							<?php the_content() ?>
						</div>
					</div>
				</div>
			</div>

		</div>

		<?php
		}
		?>
	</div>
</div>

<?php get_footer() ?>