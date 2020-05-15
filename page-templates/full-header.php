<?php

use function NOLEAM\affiche_info_mise_en_ligne;

?>

<div class="wrapper-noleam-header <?= $header->class_css ?>"
	<?php if ( $header->use_background_image ) { ?>
        style="background-image:url('<?= $header->background ?>')"
	<?php } ?>
>
    <div class="container" style="height:<?= $header->height ?><?= $header->unit ?>;">
		<?php if ( $header->overlay ) { ?>
            <div class="overlay-noleam-header"
                 style="background-color:<?= $header->overlay_color ?>;opacity:<?= $header->overlay_opacity ?>"></div>
		<?php } ?>
        <div id="noleam-header-text">
			<?= "<$header->title_tag style=\"color:$header->text_color\">$header->title</$header->title_tag>" ?>
			<?php if ( strlen( $header->sub_title ) > 0 ) { ?>
				<?= "<$header->sub_title_tag style=\"color:$header->text_color\">$header->sub_title</$header->sub_title_tag>" ?>
			<?php } ?>
        </div>
		<?php
		if ( 'post' === $header->type ) {
			affiche_info_mise_en_ligne();
		}
		?>

    </div>
</div>