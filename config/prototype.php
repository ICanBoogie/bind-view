<?php

namespace ICanBoogie\Binding\View;

use ICanBoogie;
use ICanBoogie\Routing\ControllerAbstract;

return fn(ICanBoogie\Binding\Prototype\ConfigBuilder $config) => $config
    ->bind(ControllerAbstract::class, 'lazy_get_view', [ Hooks::class, 'controller_get_view' ])
    ->bind(ControllerAbstract::class, 'get_template', [ Hooks::class, 'get_template' ])
    ->bind(ControllerAbstract::class, 'get_layout', [ Hooks::class, 'get_layout' ]);
