import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

export default function Edit( { attributes, setAttributes } ) {
	return (
		<div { ...useBlockProps( { className: 'intt-megamenu-col-editor' } ) }>
			<RichText
				tagName="span"
				className="intt-megamenu__heading"
				value={ attributes.label }
				onChange={ ( label ) => setAttributes( { label } ) }
				placeholder={ __( 'Nombre de la categoría', 'intt-blocks' ) }
				allowedFormats={ [] }
			/>
			<InnerBlocks
				allowedBlocks={ [ 'core/list' ] }
				template={ [ [ 'core/list', {} ] ] }
				templateLock={ false }
			/>
		</div>
	);
}
