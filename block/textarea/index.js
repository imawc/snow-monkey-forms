import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

import attributes from './attributes';
import edit from './edit';
import save from './save';

registerBlockType( 'snow-monkey-forms/control-textarea', {
	title: __( 'Textarea', 'snow-monkey-forms' ),
	icon: 'editor-ol',
	category: 'snow-monkey-forms',
	parent: [ 'snow-monkey-forms/item' ],
	supports: {
		customClassName: false,
	},
	attributes,
	edit,
	save,
} );
