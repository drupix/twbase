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

	$form['twbase_settings'] = [
		'#type' => 'vertical_tabs',
		'#title' => t('TWBase Settings'),
		'#weight' => 2,
		// '#collapsible' => TRUE,
		// '#collapsed' => FALSE,
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

/*
	// Offset box
	$form['general']['offset_box'] = [
		'#title' => t('Offset box'),
		'#type' => 'checkbox',
		'#default_value' => theme_get_setting('offset_box'),
		'#description' => t('When checked, frontpage content will be displayed with a negative offset.'),
	];

	// Page loader
	$form['general']['page_loader'] = [
		'#title' => t('Add a page loader'),
		'#type' => 'checkbox',
		'#default_value' => theme_get_setting('page_loader'),
		'#description' => t('When checked, a page loader is displayed.'),
	];

	// Page loader background
	$form['general']['page_loader_dark'] = [
		'#title' => t('Page loader dark'),
		'#type' => 'checkbox',
		'#default_value' => theme_get_setting('page_loader_dark'),
		'#description' => t('When checked, a dark-friendly style will be used.'),
	];
*/

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

	// Header background color
/*
	$form['header_options']['header_dark'] = [
		'#type' => 'checkbox',
		'#title' => t('Dark Style'),
		'#default_value' => theme_get_setting('header_dark'),
		'#description' => t('When checked, a dark-friendly style will be used.'),
	];
*/
	// Header background transparent
/*
	$form['header_options']['header_transparent'] = [
		'#type' => 'checkbox',
		'#title' => t('Transparent'),
		'#default_value' => theme_get_setting('header_transparent'),
		'#description' => t('When checked, a transparent style will be used on the front page (nice with content in Showcase region).'),
	];
*/

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

  $form['showcase_options']['default']['options']['default_showcase_display_title'] = [
    '#type' => 'checkbox',
    '#title' => t('Display title'),
    '#default_value' => theme_get_setting('default_showcase_display_title'),
    '#description' => t('Display the node title in the showcase.'),
  ];
  $form['showcase_options']['default']['options']['default_showcase_display_submitted'] = [
    '#type' => 'checkbox',
    '#title' => t('Author and date information'),
    '#default_value' => theme_get_setting('default_showcase_display_submitted'),
    '#description' => t('Display the node author and the publication date in the showcase.'),
  ];

	// Parallax
/*
	$form['showcase_options']['showcase_parallax'] = [
		'#type' => 'checkbox',
		'#title' => t('Parralax effect'),
		'#default_value' => theme_get_setting('showcase_parallax'),
		'#description' => t('When checked, a CSS-powered parallax effect will be used for Showcase section.'),
	];
*/

	// Text style
	$form['showcase_options']['showcase_textstyle'] = [
		'#type' => 'select',
		'#title' => t('Text style'),
		'#options' => ['text-light' => t('Text light'), 'text-dark' => t('Text dark')],
		'#default_value' => theme_get_setting('showcase_textstyle'),
		'#description' => t('Set if the text should be light or dark depending on the content.'),
	];

	// Overlay
	$form['showcase_options']['showcase_add_overlay'] = [
		'#type' => 'checkbox',
		'#title' => t('Add an overlay over the underlying image.'),
		'#default_value' => theme_get_setting('showcase_add_overlay'),
		'#description' => t('When checked, add an overlay over the underlying image.'),
	];
	// Overlay type
	$form['showcase_options']['showcase_overlay_type'] = [
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

	//
	// Frontpage options
	//
	$form['showcase_options']['frontpage_options'] = [
		'#type' => 'fieldset',
		'#title' => t('Frontpage options'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	];

	// Hero size
	$form['showcase_options']['frontpage_options']['showcase_hero_size'] = [
		'#type' => 'select',
		'#title' => t('Size of the showcase'),
		'#options' => [
			'default' => t('Default'),
			'fullscreen' => t('Fullscreen'),
			// 'hero-large' => t('Large'),
			// 'hero-medium' => t('Medium'),
			// 'hero-small' => t('Small'),
			// 'hero-tiny' => t('Tiny'),
		],
		'#default_value' => theme_get_setting('showcase_hero_size'),
		// '#description' => t('Size of the hero block is only applied on the frontpage.'),
	];

	// Hero content position
	$form['showcase_options']['frontpage_options']['showcase_content_pos'] = [
		'#type' => 'select',
		'#title' => t('Position of the hero content'),
		'#options' => [
			'default' => t('Default'),
			'bottom' => t('Bottom left'),
		],
		'#default_value' => theme_get_setting('showcase_content_pos'),
		// '#description' => t('Provide a more dynamic header.'),
	];

	// Decorations - Front
	$form['showcase_options']['frontpage_options']['showcase_deco_front'] = [
		'#type' => 'checkbox',
		'#title'         => t('Swirl decoration'),
		'#default_value' => theme_get_setting('showcase_deco_front'),
		'#description' => t('If checked a nice swirl is added under the showcase region.'),
	];

	//
	// Pages options (except frontpage)
	//
	$form['showcase_options']['pages_options'] = [
		'#type' => 'fieldset',
		'#title' => t('All other pages options'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	];

	// Decorations - Pages
	$form['showcase_options']['pages_options']['showcase_deco'] = [
		'#type' => 'checkbox',
		'#title'         => t('Swirl decoration'),
		'#default_value' => theme_get_setting('showcase_deco'),
		'#description' => t('If checked a nice swirl is added under the showcase region on <strong>all pages (except the frontpage)</strong>.'),
	];

	// // Decorations - Front
	// $form['showcase_options']['frontpage_options']['showcase_deco_front'] = [
	// 	'#type' => 'checkbox',
	// 	'#title'         => t('Swirl decoration on the frontpage'),
	// 	'#default_value' => theme_get_setting('showcase_deco_front'),
	// 	'#description' => t('If checked a nice swirl is added under the showcase region on the <strong>frontpage</strong>.'),
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
