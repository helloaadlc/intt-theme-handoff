import { useState } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
	BlockControls,
	URLInput,
} from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	SelectControl,
	ToolbarButton,
	ToolbarGroup,
	Popover,
} from '@wordpress/components';
import { link } from '@wordpress/icons';

const ICONS = {
	location: (
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
			<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
			<circle cx="12" cy="10" r="3"/>
		</svg>
	),
	search: (
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
			<circle cx="11" cy="11" r="8"/>
			<path d="m21 21-4.35-4.35"/>
		</svg>
	),
	phone: (
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
			<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.06 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16z"/>
		</svg>
	),
	user: (
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
			<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
			<circle cx="12" cy="7" r="4"/>
		</svg>
	),
};

export default function Edit( { attributes, setAttributes } ) {
	const { url, label, icon } = attributes;
	const [ isURLPickerOpen, setIsURLPickerOpen ] = useState( false );

	return (
		<>
			<BlockControls>
				<ToolbarGroup>
					<ToolbarButton
						icon={ link }
						label={ __( 'Editar enlace', 'intt-blocks' ) }
						onClick={ () => setIsURLPickerOpen( ( open ) => ! open ) }
						isActive={ !! url }
					/>
				</ToolbarGroup>
			</BlockControls>

			{ isURLPickerOpen && (
				<Popover
					placement="bottom"
					onClose={ () => setIsURLPickerOpen( false ) }
					focusOnMount="firstElement"
				>
					<URLInput
						value={ url }
						onChange={ ( value ) => setAttributes( { url: value } ) }
					/>
				</Popover>
			) }

			<InspectorControls>
				<PanelBody title={ __( 'Ítem de navegación', 'intt-blocks' ) }>
					<TextControl
						label={ __( 'Etiqueta (accesibilidad)', 'intt-blocks' ) }
						value={ label }
						onChange={ ( value ) => setAttributes( { label: value } ) }
						help={ __( 'Texto visible para lectores de pantalla.', 'intt-blocks' ) }
					/>
					<SelectControl
						label={ __( 'Ícono', 'intt-blocks' ) }
						value={ icon }
						options={ [
							{ label: __( 'Ubicación', 'intt-blocks' ), value: 'location' },
							{ label: __( 'Búsqueda', 'intt-blocks' ), value: 'search' },
							{ label: __( 'Teléfono', 'intt-blocks' ), value: 'phone' },
							{ label: __( 'Usuario', 'intt-blocks' ), value: 'user' },
						] }
						onChange={ ( value ) => setAttributes( { icon: value } ) }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...useBlockProps( { className: 'intt-nav__item intt-nav__icon-link' } ) }>
				{ ICONS[ icon ] || ICONS.location }
			</div>
		</>
	);
}
