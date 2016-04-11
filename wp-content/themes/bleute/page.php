<?php
get_header(); ?>
<section>
    <div class="container">
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();
        // Include the page content template.
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("section-blog-detail blogs-detail-full"); ?>>
            <div id="post-detail-<?php the_ID();?>" <?php post_class("page-blogs-grid section-landing-view blogs-detail");?>>
                <?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );?>
                <div class="entry-content">
                    <?php
                        the_content();
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bleute' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) );

                        edit_post_link( esc_html__( 'Edit', 'bleute' ), '<span class="edit-link">', '</span>' );
                    ?>
                </div><!-- .entry-content -->
            </div><!--End blogs-detail-->
        </article><!-- #post-## -->

        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile;
    ?>
    </div>
</section>
<?php get_footer(); ?>
