<?php
// add categories to attachments
// get_woocommerce_term_meta( $category[$i], 'thumbnail_id', true );
function wptp_add_categories_to_attachments() {
      register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'wptp_add_categories_to_attachments' );
?>