<?php
get_header();
$title_page = esc_html__('Blog','bleute');
if(is_category()){
    $cat = get_category_by_path(get_query_var('category_name'),false);
    $title_page = $cat->cat_name;
}
if (is_tag()) {
    $postTag = get_term_by('slug', get_query_var('tag'), 'post_tag');
    $title_page = esc_html__('Tag: ','bleute').$postTag->name;
}
if (is_search()) {
    $title_page = esc_html__('Search with keywords: ','bleute').esc_html($_REQUEST['s']);
}
?>
    <section class="menu-breadcrumb">
        <div class="container">
          <div class="breadcrumb">
            <ul>
                <?php if (function_exists('beau_the_breadcrumb')) beau_the_breadcrumb(); ?>
            </ul>
          </div>
        </div>
    </section>
    <section>
        <?php $description_header = get_post_meta( get_the_ID(), '_beautheme_header_description', TRUE ); ?>
        <div class="container">
            <div class="content page">
                <div class="title"><?php the_title(); ?></div>
                <div class="description"><?php print($description_header); ?></div>
            </div>
        </div>
    </section>
    <article>
        <div class="container blog-page padding">
        <?php
            $args = array(
              'post_type'     => 'post',
              'posts_per_page'  => 5,
            );
                while ( have_posts() ) : the_post();
                   require(get_template_directory().'/templates/content-post.php');
                endwhile;
        ?>
        </div>
        <div class="clearfix"></div>
        <?php 
          echo bleute_pagination();
        ?>
      </article>
<?php
get_footer();
?>