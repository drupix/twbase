<?php

//use \Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function twbase_form_system_theme_settings_alter(&$form, \Drupal\Core\Form\FormStateInterface &$form_state, $form_id = NULL) {
	//Work-around for a core bug affecting admin themes. See issue #943212.
	if (isset($form_id)) {
		return;
	}

	// We are editing the $form in place, so we don't need to return anything.

	// Create vertical tabs for options.
	$form['twbase_settings'] = [
		'#type' => 'vertical_tabs',
		'#title' => t('TWBase Settings'),
		'#weight' => 2,
	];

	/************************/
	/*** General settings ***/
	/************************/
	$form['general'] = [
		'#type' => 'details',
		'#title' => t('General settings'),
		'#group' => 'twbase_settings',
	];

	// Container size
	$form['general']['content_size'] = [
		'#type' => 'select',
		'#title' => t('Container size'),
		'#options' => [
			'sm' => 'Small',
			'md' => 'Medium',
			'lg' => 'Large',
			'xl' => 'Extra Large',
			'full' => 'Full screen',
		],
		'#default_value' => theme_get_setting('content_size'),
		'#description' => t('The maximum width of the content container.'),
	];

	// Breadcrump
	$form['general']['breadcrumb_display'] = [
		'#type' => 'checkbox',
		'#title'         => t('Display breadcrumb'),
		'#default_value' => theme_get_setting('breadcrumb_display'),
		'#description' => t('If unchecked, the Breadcrumb region will not be displayed.'),
	];


	/************************/
	/*** Header settings  ***/
	/************************/
	$form['header_options'] = [
		'#type' => 'details',
		'#title' => t('Header settings'),
		'#group' => 'twbase_settings',
	];

	// Container size
	$form['header_options']['header_size'] = [
		'#type' => 'select',
		'#title' => t('Header size'),
		'#options' => [
			'sm' => 'Small',
			'md' => 'Medium',
			'lg' => 'Large',
			'xl' => 'Extra Large',
			'full' => 'Full width',
		],
		'#default_value' => theme_get_setting('header_size'),
		'#description' => t('The maximum width of the header container.'),
	];

	// Container size
	$form['header_options']['navbar_size'] = [
		'#type' => 'select',
		'#title' => t('Navbar size'),
		'#options' => [
			'sm' => 'Small',
			'md' => 'Medium',
			'lg' => 'Large',
			'xl' => 'Extra Large',
			'full' => 'Full width',
		],
		'#default_value' => theme_get_setting('navbar_size'),
		'#description' => t('The maximum width of the navbar container.'),
	];

	// Header fixed
	$form['header_options']['header_fixed'] = [
		'#title' => t('Fixed header'),
		'#type' => 'checkbox',
		'#default_value' => theme_get_setting('header_fixed'),
		'#description' => t('When checked, the header will be fixed at the top of the browser.'),
	];

	$form['header_options']['show_progress'] = [
		'#title' => t('Show progress'),
		'#type' => 'checkbox',
		'#default_value' => theme_get_setting('show_progress'),
		'#description' => t('When checked, a progress bar will be displayed while scrolling into the page.'),
		'#states' => [
      'invisible' => [
        'input[name="header_fixed"]' => ['checked' => FALSE],
      ],
    ],
	];

	/************************/
	/** Showcase settings  **/
	/************************/
	$form['showcase_options'] = [
		'#type' => 'details',
		'#title' => t('Showcase settings'),
		'#group' => 'twbase_settings',
	];


	$form['showcase_options']['default'] = [
		'#type' => 'details',
		'#title' => t('Default showcase'),
		'#open' => TRUE,
	];

	$msg_infos = t('These options are common to all content types.') . '</br>';
	$moduleHandler = \Drupal::service('module_handler');
	if($moduleHandler->moduleExists('twbase_utils')) {
		$msg_infos .= t('You can override them for each content type via the <a href="@link">admin content type</a> list.',
			['@link' => Url::fromRoute('entity.node_type.collection')->toString()]
		);
	}
	else {
		$msg_infos .= t('Install <a target="_blank" href="@link">TWBase Theme Utilities module</a> to override them by content type.',
			['@link' => Url::fromUri('https://github.com/drupix/twbase_utils')->toString()]
		);
	}

  $form['showcase_options']['default']['default_infos'] = [
    '#markup' => $msg_infos,
		'#prefix' => '<p>',
		'#suffix' => '</p>',
  ];

  $form['showcase_options']['default']['default_showcase_enabled'] = [
    '#type' => 'checkbox',
    '#title' => t('Provide the default showcase'),
    '#default_value' => theme_get_setting('default_showcase_enabled'),
    '#description' => t('A default showcase with gradient background will be displayed on top of pages.'),
  ];

  $form['showcase_options']['default']['options'] = [
		'#type' => 'container',
    '#states' => [
      'invisible' => [
        'input[name="default_showcase_enabled"]' => ['checked' => FALSE],
      ],
    ],
  ];

  // Title
  $form['showcase_options']['default']['options']['default_showcase_display_title'] = [
    '#type' => 'checkbox',
    '#title' => t('Display title'),
    '#default_value' => theme_get_setting('default_showcase_display_title'),
    '#description' => t('Display the node title in the showcase.'),
  ];

	// Submitted: author name and published date
  $form['showcase_options']['default']['options']['default_showcase_display_submitted'] = [
    '#type' => 'checkbox',
    '#title' => t('Author and date information'),
    '#default_value' => theme_get_setting('default_showcase_display_submitted'),
    '#description' => t('Display the node author and the publication date in the showcase.') . ' ' . t('This will automatically hide it from the node default display.') . '<br>' .
											'<strong>' . t('The content type display settings defined at <a href="@link">admin content type</a> will takes precedence over this option.' . '</strong>',
												['@link' => Url::fromRoute('entity.node_type.collection')->toString()]
											),
  ];

	// Image - field_image
  $form['showcase_options']['default']['options']['default_showcase_display_image'] = [
    '#type' => 'checkbox',
    '#title' => t('Use image field'),
    '#default_value' => theme_get_setting('default_showcase_display_image'),
    '#description' => t('If an image field (field_image) exists in the content type it will be used as showcase image.'),
  ];

	// Image - Parallax
/*
	$form['showcase_options']['showcase_parallax'] = [
		'#type' => 'checkbox',
		'#title' => t('Parralax effect'),
		'#default_value' => theme_get_setting('showcase_parallax'),
		'#description' => t('When checked, a CSS-powered parallax effect will be used for Showcase section.'),
	];
*/

	// Swirl decoration
	$form['showcase_options']['default']['options']['default_showcase_deco'] = [
		'#type' => 'checkbox',
		'#title'         => t('Swirl decoration'),
		'#default_value' => theme_get_setting('default_showcase_deco'),
		'#description' => t('If checked a nice swirl is added under the showcase region on <strong>all pages (except the frontpage)</strong>.'),
	];

	//
	// Frontpage options
	//
	$form['showcase_options']['default']['frontpage_options'] = [
		'#type' => 'fieldset',
		'#title' => t('Frontpage options'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	];

  $form['showcase_options']['default']['frontpage_options']['default_showcase_front_enabled'] = [
    '#type' => 'checkbox',
    '#title' => t('Provide the default showcase'),
    '#default_value' => theme_get_setting('default_showcase_front_enabled'),
    '#description' => t('A default showcase with gradient background will be displayed on top of pages.'),
  ];

  $form['showcase_options']['default']['frontpage_options']['options'] = [
		'#type' => 'container',
    '#states' => [
      'invisible' => [
        'input[name="default_showcase_front_enabled"]' => ['checked' => FALSE],
      ],
    ],
  ];

	// Hero size
	$form['showcase_options']['default']['frontpage_options']['options']['showcase_hero_size'] = [
		'#type' => 'select',
		'#title' => t('Size of the showcase'),
		'#options' => [
			'default' => t('Default'),
			'fullscreen' => t('Fullscreen'),
		],
		'#default_value' => theme_get_setting('showcase_hero_size'),
	];

	// Hero content position
	$form['showcase_options']['default']['frontpage_options']['options']['showcase_content_pos'] = [
		'#type' => 'select',
		'#title' => t('Position of the hero content'),
		'#options' => [
			'default' => t('Default'),
			'bottom' => t('Bottom left'),
		],
		'#default_value' => theme_get_setting('showcase_content_pos'),
	];

	// Decorations - Front
	$form['showcase_options']['default']['frontpage_options']['options']['showcase_deco_front'] = [
		'#type' => 'checkbox',
		'#title'         => t('Swirl decoration'),
		'#default_value' => theme_get_setting('showcase_deco_front'),
		'#description' => t('If checked a nice swirl is added under the showcase region.'),
	];

	//
	// Common options
	//
	$form['showcase_options']['default']['common_options'] = [
		'#type' => 'fieldset',
		'#title' => t('Common options'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	];

	// Image - Overlay
	$form['showcase_options']['default']['common_options']['showcase_add_overlay'] = [
		'#type' => 'checkbox',
		'#title' => t('Add an overlay over the underlying image.'),
		'#default_value' => theme_get_setting('showcase_add_overlay'),
		'#description' => t('When checked, add an overlay over the underlying image.'),
	];

	// Image - Overlay type
	$form['showcase_options']['default']['common_options']['showcase_overlay_type'] = [
		'#type' => 'select',
		'#title' => t('Overlay type'),
		'#options' => [
			'overlay-dark-gradient' => t('Dark gradient'),
			'overlay-dark' => t('Dark solid'),
			'overlay-light-gradient' => t('Light gradient'),
			'overlay-light' => t('Light solid'),
		],
		'#default_value' => theme_get_setting('showcase_overlay_type'),
		'#description' => t('Displays a solid transparent overlay or transparent gradient which further darkens/lightens the underlying image.'),
		'#states' => [
			'enabled' => [
				':input[name="showcase_add_overlay"]' => ['checked' => TRUE],
			],
		],
	];

	// @todo: Text style is not used for now
	// Text style
	// $form['showcase_options']['default']['common_options']['showcase_textstyle'] = [
	// 	'#type' => 'select',
	// 	'#title' => t('Text style'),
	// 	'#options' => ['text-light' => t('Text light'), 'text-dark' => t('Text dark')],
	// 	'#default_value' => theme_get_setting('showcase_textstyle'),
	// 	'#description' => t('Set if the text should be light or dark depending on the content.'),
	// ];

	/************************/
	/* Pre Footer settings  */
	/************************/
	$form['pre_footer_options'] = [
		'#type' => 'details',
		'#title' => t('Pre Footer settings'),
		'#group' => 'twbase_settings',
	];

	/* Container size */
	$form['pre_footer_options']['pre_footer_size'] = [
		'#type' => 'select',
		'#title' => t('Container size'),
		'#options' => [
			'sm' => 'Small',
			'md' => 'Medium',
			'lg' => 'Large',
			'xl' => 'Extra Large',
			'full' => 'Full screen',
		],
		'#default_value' => theme_get_setting('pre_footer_size'),
		'#description' => t('The maximum width of the pre footer container.'),
	];

	/************************/
	/*** Footer settings  ***/
	/************************/
	$form['footer_options'] = [
		'#type' => 'details',
		'#title' => t('Footer settings'),
		'#group' => 'twbase_settings',
	];

	/* Container size */
	$form['footer_options']['footer_size'] = [
		'#type' => 'select',
		'#title' => t('Container size'),
		'#options' => [
			'sm' => 'Small',
			'md' => 'Medium',
			'lg' => 'Large',
			'xl' => 'Extra Large',
			'full' => 'Full screen',
		],
		'#default_value' => theme_get_setting('footer_size'),
		'#description' => t('The maximum width of the footer container.'),
	];

	// Sticky footer
/*
	$form['footer_options']['sticky_footer'] = [
		'#type' => 'checkbox',
		'#title' => t('Sticky footer'),
		'#default_value' => theme_get_setting('sticky_footer'),
		'#description' => t('When checked, the footer will be sticky at the bottom of the browser.'),
	];
*/

	/************************/
	/*** Maintenance page ***/
	/************************/
	$form['maintenance'] = [
		'#type' => 'details',
		'#title' => t('Maintenance page'),
		'#group' => 'twbase_settings',
	];

	$form['maintenance']['email'] = [
		'#type' => 'fieldset',
		'#title' => t('Email settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	];

	$form['maintenance']['email']['email_maintenance'] = [
		'#type' => 'textfield',
		'#title' => t('Email for maintenance'),
		'#default_value' => theme_get_setting('email_maintenance'),
		'#size' => 50,
		'#maxlength' => 50,
	];

}
