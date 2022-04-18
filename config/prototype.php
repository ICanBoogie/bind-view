<?php

namespace ICanBoogie\Binding\View;

use ICanBoogie;
use ICanBoogie\Routing\ControllerAbstract;

return [

	ControllerAbstract::class . '::lazy_get_view' => [ Hooks::class, 'controller_get_view' ],
	ControllerAbstract::class . '::get_template' => [ Hooks::class, 'get_template' ],
	ControllerAbstract::class . '::get_layout' => [ Hooks::class, 'get_layout' ],

];
