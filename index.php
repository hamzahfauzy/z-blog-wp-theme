<?php get_header() ?>

<?php
	$args = array(
	    'post_type'     =>  'post',
	    'post_status'   =>  'publish',
	    'category_name' => 	'featured',
	    'posts_per_page'=>  5,
	    'orderby'       => 'date',
	    'order'         => 'DESC'
	);
	$posts = new WP_Query($args);
	if($posts->have_posts()){
?>
<div class="z-slider slider">
	<?php	
	    while($posts->have_posts()){
	        $posts->the_post();
	        if(get_the_post_thumbnail_url()):
	?>
    <div style="background:url('<?=get_the_post_thumbnail_url()?>');background-size:cover;background-position:center;overflow: auto;">
    	<div class="slider-post-title">
    		<div>
    		<h2><?= get_the_title() ?></h2>
    		<p><?= wp_trim_words(get_the_content(), 50) ?> ...</p>
    		<a href="<?php the_permalink() ?>" class="btn btn-primary">Read More <i class="fa fa-arrow-right"></i></a>
    		</div>
    	</div>
    </div>
    <?php 
    		endif;
	    } 
	wp_reset_postdata();
	}
	?>
</div>

<div class="container content">
	<div class="row">
		<div class="col-sm-12 col-md-8">
			
			<!-- blog list container -->
			<?php
	        $args = array(
	          'post_type'     =>  'post',
	          'post_status'   =>  'publish',
	          'posts_per_page'=>  7,
	          'orderby'       => 'date',
	    	  'order'         => 'DESC'
	        );
	        $posts = new WP_Query($args);
	        if($posts->have_posts()){
	          while($posts->have_posts()){
	            $posts->the_post();
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
	        }
	        ?>

		</div>
		<div class="col-sm-12 col-md-4">
			
			<?php require_once('partial-templates/sidebar.php') ?>

		</div>
	</div>
</div>

<?php get_footer() ?>