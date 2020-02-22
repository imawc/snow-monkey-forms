<?php
/**
 * @package snow-monkey-forms
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Snow_Monkey\Plugin\Forms\App\Control;

use Snow_Monkey\Plugin\Forms\App\Contract;
use Snow_Monkey\Plugin\Forms\App\Helper;

class Text extends Contract\Control {

	/**
	 * @var array
	 *   @var string name
	 *   @var string value
	 *   @var string placeholder
	 *   @var boolean disabled
	 *   @var boolean data-invalid
	 */
	protected $attributes = [];

	/**
	 * @var array
	 */
	protected $validations = [];

	public function input() {
		return sprintf(
			'<input class="smf-text-control" type="text" %1$s>',
			$this->generate_attributes( $this->attributes )
		);
	}

	public function confirm() {
		return sprintf(
			'%1$s%2$s',
			esc_html( $this->get( 'value' ) ),
			Helper::control(
				'hidden',
				[
					'attributes' => [
						'name'  => $this->get( 'name' ),
						'value' => $this->get( 'value' ),
					],
				]
			)->input()
		);
	}

	public function error( $error_message = '' ) {
		$this->set( 'data-invalid', true );

		return sprintf(
			'%1$s
			<div class="smf-error-messages">
				%2$s
			</div>',
			$this->input(),
			$error_message
		);
	}
}
