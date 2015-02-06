<?php

namespace ICanBoogie\Binding\View;

$hooks = __NAMESPACE__ . '\Hooks::';

return [

	'prototypes' => [

		'ICanBoogie\Routing\Controller::lazy_get_view' => $hooks . 'controller_get_view',
		'ICanBoogie\View\View::lazy_get_engines' => $hooks . 'view_lazy_get_engines',
		'ICanBoogie\View\View::lazy_get_template_resolver' => $hooks . 'view_lazy_get_template_resolver'

	]

];
