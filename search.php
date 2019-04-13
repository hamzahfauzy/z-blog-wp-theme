<?php get_header(); $s=get_search_query(); ?>

<div class="container content">
	<div class="row">
		<div class="col-sm-12">
			<h2>Search Result : <?= $s ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-8">
			
			<!-- blog list container -->
			<?php
	        if(have_posts()){
	          while(have_posts()){
	            the_post();
	        ?>
			<div class="blog-list-container">
				<div class="blog-list-title">
					<h2>
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</h2>
				</div>
				<div class="blog-list-info">
					<span><i class="fas fa-calendar-alt"></i> <?= get_the_date('j F, Y') ?></span>
					|
					<span><i class="fas fa-user"></i> <?php the_author() ?></span>
					|
					<span><i class="fas fa-comments"></i> Comments (<?= get_comments_number(get_the_ID()) ?>)</span>
				</div>
				<div class="blog-list-content">
					<div class="row">
						<div class="col-sm-3 blog-thumbnail">
							<?php if(get_the_post_thumbnail_url()): ?>
							<img src="<?=get_the_post_thumbnail_url()?>" width="100%" height="auto">
							<?php endif ?>
						</div>
						<div class="col-sm-9 blog-content">
							<!-- excerpt and read more -->
							<p><?= wp_trim_words(get_the_content(), 50) ?> ...</p>

							<div>
								<a href="<?php the_permalink() ?>" class="btn btn-danger">READ MORE <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
	          } 
	          wp_reset_postdata();
	        }else{
	        	?>
	        	<h2>Sorry, no post match in for this criteria</h2>
	        	<?php
	        }
	        ?>

	        <div>
	        	<?php wpbeginner_numeric_posts_nav(); ?>
			</div>

		</div>
		<div class="col-sm-12 col-md-4">
			
			<?php require_once('partial-templates/sidebar.php') ?>

		</div>
	</div>
</div>

<?php get_footer() ?>