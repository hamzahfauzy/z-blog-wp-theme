<!-- Categories -->
			<div class="categories-container">
				<div class="categories-header primary-color">
					<i class="fas fa-search"></i> Pencarian
				</div>
				<div class="categories-content">
					<form action="<?= home_url() ?>" method="get" class="form-inline">
					    <input type="hidden" name="post_type" value="post" />
					    <div class="form-group">
						    <input type="text" name="s" class="form-control" id="search" value="<?php the_search_query(); ?>" />
						    <button class="btn btn-primary btn-md"><i class="fas fa-search"></i></button>
					    </div>
					</form>
				</div>
			</div>

			<div class="categories-container">
				<div class="categories-header default-color">
					<i class="fas fa-list-alt"></i> Kategori
				</div>
				<div class="categories-content">
					<ul>
						<?php 
						$categories = get_categories();
						foreach($categories as $category){
						?>
						<li>
							<a href="<?= get_category_link( $category->term_id ) ?>"><?= $category->name  ?> <span>(<?= $category->category_count ?>)</span></a>
						</li>
						<?php 
						}
						?>
					</ul>
				</div>
			</div>

			<!-- Recent Post -->
			<div class="categories-container">
				<div class="categories-header warning-color">
					<i class="fas fa-folder-plus"></i> Postingan Terbaru
				</div>
				<div class="categories-content">
					<ul>
						<?php
				        $args = array(
				          'post_type'     =>  'post',
				          'post_status'   =>  'publish',
				          'posts_per_page'=>  5,
				          'orderby'       => 'ID',
				    	  'order'         => 'DESC'
				        );
				        $posts = new WP_Query($args);
				        if($posts->have_posts()){
				          while($posts->have_posts()){
				            $posts->the_post();
				        ?>
						<li>
							<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
						</li>
						<?php 
				          } 
				          wp_reset_postdata();
				        }
				        ?>
					</ul>
				</div>
			</div>