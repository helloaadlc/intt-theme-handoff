import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	return (
		<nav { ...useBlockProps( { className: 'intt-nav' } ) }>
			<div className="intt-nav__item intt-nav__mega-trigger">
				<RichText
					tagName="span"
					value={ attributes.triggerLabel }
					onChange={ ( triggerLabel ) => setAttributes( { triggerLabel } ) }
					placeholder={ __( 'Etiqueta del menú', 'intt-blocks' ) }
					allowedFormats={ [] }
				/>
				<span className="intt-megamenu-editor__chevron">▾</span>
			</div>
		</nav>
	);
}
