<?php
/**
 * @package snow-monkey-forms
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Snow_Monkey\Plugin\Forms\App\Control;

use Snow_Monkey\Plugin\Forms\App\Contract;

class Text extends Contract\Control {
	protected $name = '';
	protected $value = '';

	public function render() {
		return sprintf(
			'<input class="c-form-control" type="text" %1$s>',
			$this->generate_attributes()
		);
	}
}
