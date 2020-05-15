<?php

use function NOLEAM\affiche_info_mise_en_ligne;
use function NOLEAM\affiche_small_header_external_image;
use function NOLEAM\affiche_small_header_featured_image;

?>

<div class="wrapper-noleam-header small-header">
    <div class="container">

		<?php ob_start(); ?>
        <div id="noleam-header-text">
			<?= "<$header->title_tag>$header->title<$header->title_tag>" ?>
			<?php if ( strlen( $header->sub_title ) > 0 ) { ?>
				<?= "<$header->sub_title_tag>$header->sub_title</$header->sub_title_tag>" ?>
			<?php } ?>
        </div>

		<?php if ( 'post' === $header->type ) {
			affiche_info_mise_en_ligne();
		} ?>

		<?php
		if ( $header->use_background_image ) {
			if ( $header->use_featured ) {
				affiche_small_header_featured_image( [ 'content' => ob_get_clean() ] );
			} else {
				affiche_small_header_external_image( [
					'image'   => $header->background,
					'content' => ob_get_clean()
				] );
			}
		} ?>
    </div>
</div>
