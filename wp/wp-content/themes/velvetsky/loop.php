<?php
// If no post found, use this markup
if (!have_posts()) : ?>

    <div class="post">
        <h1 class="post-title"><?php _e("Oh snap. Houston, looks like we've lost.", 'essential'); ?></h1>
        <div class="the-content">
            <h2><?php _e("The page you try to access is not exist. You can go back to <a href='" . get_bloginfo('url') . "'>the homepage</a> or search something else:", 'essential'); ?></h2>
            <p>
                <form method="get" id="searchform" action="<?php echo get_option('home'); ?>">
                    <input type="text" value="<?php _e("Type keywords and hit enter", "essential"); ?>" name="s" id="s-404" onfocus="if (this.value == '<?php _e("Type keywords and hit enter", "essential"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Type keywords and hit enter", "essential"); ?>';}" />
                    <input type="hidden" id="searchsubmit" value="<?php _e("Search", 'essential'); ?>" />
                </form>
            </p>
        </div>
    </div>

<?php endif;
while ( have_posts() ) : the_post(); ?>

    <?php if (is_single()) : // single post loop ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
            <div class="post-time">
                <?php ess_post_date(); ?>
            </div><!-- .post-time -->
        
            <div class="post-content-wrap">
                <h2 class="post-title">
                    <?php the_title(); ?>
                </h2><!-- .post-title -->
                <div class="post-meta">
                    <?php ess_post_meta(); ?>
                </div><!-- .post-meta -->
                <div class="post-content the-content">
                    <?php the_content(); ?>
                </div><!-- .post-content -->
                <?php ess_related_posts(); ?>
                <?php ess_tweet_this("horizontal"); ?>
                <?php ess_facebook_like(); ?>
                <?php ess_share_button(); ?>
                <?php ess_author_box(); ?>
                
                <div id="post-comment">
                    <?php comments_template( '', true ); ?>
                </div><!--- #post-comment -->
            </div>

        </div><!-- #post -->

      
    <?php elseif (is_page()) : // page loop ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2 class="post-title">
                <?php the_title(); ?>
            </h2><!-- .post-title -->
            <div class="post-content the-content">
                <?php the_content(); ?>
            </div><!-- .post-content -->
            <?php ess_share_button(); ?>
        </div><!-- #post -->
        <div id="post-comment">
            <?php comments_template( '', true ); ?>
        </div><!--- #post-comment -->

    <?php else : // else's loop: search, archive, home, etc ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-time">
                <?php ess_post_date(); ?>
            </div><!-- .post-time -->
            <div class="post-content-wrap">
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>" title="<?php _e('View ', 'essential'); the_title(); ?>"><?php the_title(); ?></a>
                </h2><!-- .post-title -->
                <div class="post-meta">
                    <?php ess_post_meta(); ?>
                </div><!-- .post-meta -->
                <?php
                    if ( has_post_thumbnail()) {
                        echo '<div class="post-thumb">';
                        the_post_thumbnail("home-image");
                        echo '</div><!-- .post-thumb --> ';
                    }
                ?>               
                <div class="post-content the-content">
                    <p><?php echo ess_excerpt(45); ?></p>
                    <p class="read-more">
                        <a href="<?php the_permalink(); ?>" title="<?php _e('Read More', 'essential'); ?>" class="more-link"><?php _e('Read More', 'essential'); ?></a>
                    </p>
                    <?php ess_facebook_like(); ?>
                </div><!-- .post-content -->
            </div><!-- .post-content-wrap -->
        </div><!-- #post -->


    <?php endif; ?>

<?php endwhile; ?>