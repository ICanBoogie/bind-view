<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\View;

use ICanBoogie\PropertyNotDefined;
use ICanBoogie\Render\Renderer;
use ICanBoogie\Routing\ControllerAbstract;
use ICanBoogie\View\View;

use function ICanBoogie\app;
use function ICanBoogie\emit;

final class Hooks
{
	/*
	 * Prototypes
	 */

	/**
	 * Returns a view for a controller.
	 */
	static public function controller_get_view(ControllerAbstract $controller): View
	{
		$view = new View($controller, app()->container->get(Renderer::class));

		emit(new View\AlterEvent($view));

		return $view;
	}

	/**
	 * Avoids a trip to `assert_property_is_readable` for controllers or routes that do not
	 * define a `template` property.
	 *
	 * @throws PropertyNotDefined
	 */
	static public function get_template(object $target): void
	{
		throw new PropertyNotDefined([ 'template', $target ]);
	}

	/**
	 * Avoids a trip to `assert_property_is_readable` for controllers or routes that do not
	 * define a `layout` property.
	 *
	 * @throws PropertyNotDefined
	 */
	static public function get_layout(object $target): void
	{
		throw new PropertyNotDefined([ 'layout', $target ]);
	}
}
