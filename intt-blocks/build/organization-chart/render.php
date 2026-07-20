<?php
$miembros = get_field( 'organigrama_miembros' );
if ( empty( $miembros ) ) {
	return;
}

$grupos = array(
	'estrategico'    => array(),
	'asesoria_apoyo' => array(),
	'sustantivo'     => array(),
);

foreach ( $miembros as $fila ) {
	$nivel = $fila['nivel'] ?? '';
	if ( isset( $grupos[ $nivel ] ) ) {
		$grupos[ $nivel ][] = $fila;
	}
}

$tier_labels = array(
	'estrategico'    => 'Nivel Estratégico',
	'asesoria_apoyo' => 'Nivel de Asesoría y Apoyo',
	'sustantivo'     => 'Nivel Sustantivo',
);

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'intt-organization-chart' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
	<div class="intt-org-spine"></div>

	<?php if ( ! empty( $grupos['estrategico'] ) ) : ?>
		<section class="intt-org-tier intt-org-tier--exec">
			<div class="intt-org-tag-wrap">
				<span class="intt-org-tag"><?php echo esc_html( $tier_labels['estrategico'] ); ?></span>
			</div>
			<div class="intt-org-col-single">
				<?php foreach ( $grupos['estrategico'] as $persona ) : ?>
					<div class="intt-org-node-single">
						<div class="intt-org-dot"></div>
						<div class="intt-org-card">
							<p class="intt-org-name"><?php echo esc_html( $persona['nombre'] ); ?></p>
							<p class="intt-org-role"><?php echo esc_html( $persona['cargo'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php foreach ( array( 'asesoria_apoyo' => 'support', 'sustantivo' => 'core' ) as $nivel_key => $modifier ) : ?>
		<?php
		$fila_nivel = $grupos[ $nivel_key ];
		if ( empty( $fila_nivel ) ) {
			continue;
		}
		$izquierda = array();
		$derecha   = array();
		foreach ( $fila_nivel as $indice => $persona ) {
			( 0 === $indice % 2 ) ? $izquierda[] = $persona : $derecha[] = $persona;
		}
		$total_filas = max( count( $izquierda ), count( $derecha ) );
		?>
		<section class="intt-org-tier intt-org-tier--<?php echo esc_attr( $modifier ); ?>">
			<div class="intt-org-tag-wrap">
				<span class="intt-org-tag"><?php echo esc_html( $tier_labels[ $nivel_key ] ); ?></span>
			</div>
			<div class="intt-org-col-two">
				<?php for ( $i = 0; $i < $total_filas; $i++ ) : ?>
					<div class="intt-org-row">
						<?php if ( isset( $izquierda[ $i ] ) ) : ?>
							<div class="intt-org-card intt-org-card--left">
								<p class="intt-org-name"><?php echo esc_html( $izquierda[ $i ]['nombre'] ); ?></p>
								<p class="intt-org-role"><?php echo esc_html( $izquierda[ $i ]['cargo'] ); ?></p>
							</div>
						<?php else : ?>
							<div class="intt-org-card intt-org-card--left intt-org-card--empty"></div>
						<?php endif; ?>

						<div class="intt-org-node-dot"></div>

						<?php if ( isset( $derecha[ $i ] ) ) : ?>
							<div class="intt-org-card intt-org-card--right">
								<p class="intt-org-name"><?php echo esc_html( $derecha[ $i ]['nombre'] ); ?></p>
								<p class="intt-org-role"><?php echo esc_html( $derecha[ $i ]['cargo'] ); ?></p>
							</div>
						<?php else : ?>
							<div class="intt-org-card intt-org-card--right intt-org-card--empty"></div>
						<?php endif; ?>
					</div>
				<?php endfor; ?>
			</div>
		</section>
	<?php endforeach; ?>
</div>
