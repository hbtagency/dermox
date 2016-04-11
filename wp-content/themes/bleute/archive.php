<?php
get_header();
if (bleute_GetOption('archive-type')!= NULL) {
	$beau_archive = bleute_GetOption('archive-type');
}else{
	$beau_archive = NULL;
}
if($beau_archive==NULL){
	$beau_archive = "default";
}
get_template_part('templates/archive', $beau_archive);
get_footer();
?>