<?php
$label = $attributes['label'] ?? '';
$url   = $attributes['url']   ?? '';
?>
<div class="intt-megamenu__col">
	<?php if ( $url ) : ?>
		<a class="intt-megamenu__heading" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
	<?php else : ?>
		<span class="intt-megamenu__heading"><?php echo esc_html( $label ); ?></span>
	<?php endif; ?>
	<?php if ( $content ) : ?>
		<div class="intt-megamenu__links">
			<?php echo $content; ?>
		</div>
	<?php endif; ?>
</div>
