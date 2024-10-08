<?php

namespace Blocksy\Extensions\ColorModeSwitch;

class LogoEnhancements {
	public function __construct() {
		add_filter(
			'blocksy:panel-builder:logo:options:general',
			[$this, 'append_options']
		);

		add_filter(
			'blocksy:panel-builder:offcanvas-logo:options:general',
			[$this, 'append_options']
		);

		add_filter(
			'blocksy:panel-builder:logo:additional-logos',
			[$this, 'append_additional_logo'],
			10,
			3
		);

		add_filter(
			'blocksy:panel-builder:offcanvas-logo:additional-logos',
			[$this, 'append_additional_logo'],
			10,
			3
		);
	}

	public function append_options($options) {
		$options['dark_mode_logo'] = [
			'label' => __( 'Dark Mode Logo', 'blocksy-companion' ),
			'type' => 'ct-image-uploader',
			'value' => '',
			'inline_value' => true,
			'responsive' => [
				'tablet' => 'skip'
			],
			'divider' => 'top',
			'attr' => [ 'data-type' => 'small' ],
		];

		return $options;
	}

	public function append_additional_logo($additional_logos, $atts, $device) {
		$dark_mode_logo = blocksy_expand_responsive_value(
			blocksy_default_akg('dark_mode_logo', $atts, '')
		);

		if (! empty($dark_mode_logo[$device])) {
			$additional_logos[] = [
				'class' => 'dark-mode-logo',
				'id' => $dark_mode_logo[$device]
			];
		}

		return $additional_logos;

	}
}

