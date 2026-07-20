<?php
$trigger_label = $attributes['triggerLabel'] ?? 'Menú';
$chevron       = '<svg class="intt-nav__chevron" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 12 12" fill="none" aria-hidden="true" focusable="false"><path d="M1.5 4L6 8L10.5 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<nav class="intt-nav" aria-label="<?php esc_attr_e( 'Navegación principal', 'intt-blocks' ); ?>">
	<button class="intt-nav__item intt-nav__mega-trigger" aria-expanded="false" aria-controls="intt-megamenu">
		<?php echo $chevron; ?>
		<?php echo esc_html( $trigger_label ); ?>
	</button>
</nav>
