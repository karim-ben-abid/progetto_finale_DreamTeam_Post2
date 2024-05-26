<?php

namespace Automad\Bootstrap;

defined('AUTOMAD') or die('Direct access not permitted!');

class Icon {

	
	/**
	 *	The main function to embed an icon within a template.
	 *
	 * 	@param array $options
	 * 	@param object $Automad
	 * 	@return string The SVG markup  
	 */

	public function Icon($options, $Automad) {

		$defaults = array(
			'icon' => 'alert-circle',
			'w' => '1em',
			'h' => '1em',
			'viewBox' => '0 0 16 16'
		);

		$options = array_merge($defaults, $options);

		$file = __DIR__ . '/node_modules/bootstrap-icons/icons/' . $options['icon'] . '.svg';

		if (!is_readable($file)) {
			return false;
		}

		$svg = file_get_contents($file);
		return str_replace(
			array(
				'width="16"',
				'height="16"', 
				'viewBox="0 0 16 16'
			), 
			array(
				'width="' . $options['w'] . '"', 
				'height="' . $options['h'] . '"', 
				'viewBox="' . $options['viewBox'] . '"'
			),
			$svg
		);
		
	}

}