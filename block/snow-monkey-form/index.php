<?php
/**
 * @package snow-monkey-forms
 * @author inc2734
 * @license GPL-2.0+
 */

use Snow_Monkey\Plugin\Forms\App\Helper;
use Snow_Monkey\Plugin\Forms\App\DataStore;

use Snow_Monkey\Plugin\Forms\App\Controller\Input;
use Snow_Monkey\Plugin\Forms\App\Model\Responser;
use Snow_Monkey\Plugin\Forms\App\Model\Validator;
use Snow_Monkey\Plugin\Forms\App\Model\Dispatcher;

add_action(
	'init',
	function() {
		$attributes = include( __DIR__ . '/attributes.php' );

		register_block_type(
			'snow-monkey-forms/snow-monkey-form',
			[
				'attributes'      => $attributes,
				'render_callback' => function( $attributes, $content ) {
					if ( empty( $attributes['formId'] ) ) {
						return;
					}

					$form_id = $attributes['formId'];
					$setting = DataStore::get( $form_id );
					if ( ! $setting->get( 'input_content' ) ) {
						return;
					}

					$responser  = new Responser( [] );
					$validator  = new Validator( $responser, $setting );
					$controller = Dispatcher::dispatch( 'input', $responser, $setting, $validator );
					if ( ! $controller ) {
						return;
					}

					ob_start();
					$controller->send();
					$response = ob_get_clean();
					$response = json_decode( $response );

					ob_start();
					include( __DIR__ . '/view.php' );
					return ob_get_clean();
				},
			]
		);
	}
);
