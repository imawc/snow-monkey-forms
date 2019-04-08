'use strict';

const { registerBlockType } = wp.blocks;
const { Fragment } = wp.element;
const { TextControl } = wp.components;
const { __ } = wp.i18n;

registerBlockType( 'snow-monkey-forms/email', {
	title: __( 'Email', 'snow-monkey-forms' ),
	icon: 'editor-ol',
	category: 'snow-monkey-forms',
	supports: {
		customClassName: false,
	},

	edit( { attributes, setAttributes } ) {
		const { name, value } = attributes;

		return (
			<Fragment>
				<TextControl
					label={ __( 'name', 'snow-monkey-forms' ) }
					value={ name }
					onChange={ ( attribute ) => setAttributes( { name: attribute } ) }
				/>
				<TextControl
					label={ __( 'value', 'snow-monkey-forms' ) }
					value={ value }
					onChange={ ( attribute ) => setAttributes( { value: attribute } ) }
				/>
			</Fragment>
		);
	},

	save() {
		return null;
	},
} );
