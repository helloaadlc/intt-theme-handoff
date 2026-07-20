<?php
// This file is generated. Do not modify it manually.
return array(
	'megamenu' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'intt/megamenu',
		'version' => '0.1.0',
		'title' => 'Mega Menú',
		'category' => 'theme',
		'icon' => 'menu',
		'description' => 'Barra de navegación principal con panel de megamenú.',
		'attributes' => array(
			'triggerLabel' => array(
				'type' => 'string',
				'default' => 'Menú'
			)
		),
		'supports' => array(
			'html' => false,
			'multiple' => false,
			'reusable' => false
		),
		'textdomain' => 'intt-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'megamenu-col' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'intt/megamenu-col',
		'version' => '0.1.0',
		'title' => 'Columna de Megamenú',
		'category' => 'theme',
		'icon' => 'columns',
		'description' => 'Columna con encabezado y enlaces dentro del Mega Menú.',
		'attributes' => array(
			'label' => array(
				'type' => 'string',
				'default' => ''
			),
			'url' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'html' => false,
			'reusable' => false
		),
		'textdomain' => 'intt-blocks',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	),
	'organization-chart' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'intt/organization-chart',
		'title' => 'Organigrama INTT',
		'category' => 'theme',
		'icon' => 'networking',
		'description' => 'Organigrama institucional con niveles jerárquicos y columnas auto-balanceadas.',
		'textdomain' => 'intt-blocks',
		'supports' => array(
			'html' => false,
			'align' => array( 'wide', 'full' ),
		),
		'style' => 'file:./style.css',
		'render' => 'file:./render.php',
	),
	'nav-item' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'intt/nav-item',
		'version' => '0.1.0',
		'title' => 'Ítem de Navegación',
		'category' => 'theme',
		'icon' => 'admin-links',
		'description' => 'Enlace con ícono para la barra de navegación principal.',
		'attributes' => array(
			'url' => array(
				'type' => 'string',
				'default' => ''
			),
			'label' => array(
				'type' => 'string',
				'default' => ''
			),
			'icon' => array(
				'type' => 'string',
				'default' => 'location'
			)
		),
		'supports' => array(
			'html' => false,
			'reusable' => false
		),
		'textdomain' => 'intt-blocks',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	)
);
