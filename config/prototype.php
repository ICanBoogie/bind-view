<?php

namespace ICanBoogie\Binding\View;

use ICanBoogie;

$hooks = Hooks::class . '::';

/**
 * @uses Hooks::controller_get_view()
 * @uses Hooks::get_template()
 * @uses Hooks::get_layout()
 */
return [

	ICanBoogie\Routing\ControllerAbstract::class . '::lazy_get_view' => $hooks . 'controller_get_view',
	ICanBoogie\Routing\ControllerAbstract::class . '::get_template' => $hooks . 'get_template',
	ICanBoogie\Routing\ControllerAbstract::class . '::get_layout' => $hooks . 'get_layout',

];
