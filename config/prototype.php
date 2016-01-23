<?php

namespace ICanBoogie\Binding\View;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Routing\Controller::class . '::lazy_get_view' => $hooks . 'controller_get_view',
	ICanBoogie\Routing\Controller::class . '::get_template' => $hooks . 'get_template',
	ICanBoogie\Routing\Controller::class . '::get_layout' => $hooks . 'get_layout',
	ICanBoogie\Routing\Route::class . '::lazy_get_template' => $hooks . 'get_template',
	ICanBoogie\Routing\Route::class . '::lazy_get_layout' => $hooks . 'get_layout',

];
