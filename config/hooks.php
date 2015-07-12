<?php

namespace ICanBoogie\Binding\View;

$hooks = __NAMESPACE__ . '\Hooks::';

return [

	'prototypes' => [

		'ICanBoogie\Routing\Controller::lazy_get_view' => $hooks . 'controller_get_view',
		'ICanBoogie\Routing\Controller::get_template' => $hooks . 'get_template',
		'ICanBoogie\Routing\Controller::get_layout' => $hooks . 'get_layout',
		'ICanBoogie\Routing\Route::lazy_get_template' => $hooks . 'get_template',
		'ICanBoogie\Routing\Route::lazy_get_layout' => $hooks . 'get_layout',
		'ICanBoogie\View\View::lazy_get_engines' => $hooks . 'view_lazy_get_engines',
		'ICanBoogie\View\View::lazy_get_template_resolver' => $hooks . 'view_lazy_get_template_resolver',

	]

];
