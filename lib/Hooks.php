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
use ICanBoogie\Render;
use ICanBoogie\Routing\Controller;
use ICanBoogie\View\View;

class Hooks
{
	/*
	 * Prototypes
	 */

	/**
	 * Returns a view for a controller.
	 *
	 * @param Controller $controller
	 *
	 * @return View
	 */
	static public function controller_get_view(Controller $controller)
	{
		$view = new View($controller, Render\get_renderer());

		new View\AlterEvent($view);

		return $view;
	}

	/**
	 * Avoids a trip to `assert_property_is_readable` for controllers or routes that do not
	 * define a `template` property.
	 *
	 * @param $target
	 *
	 * @throws PropertyNotDefined
	 */
	static public function get_template($target)
	{
		throw new PropertyNotDefined([ 'template', $target ]);
	}

	/**
	 * Avoids a trip to `assert_property_is_readable` for controllers or routes that do not
	 * define a `layout` property.
	 *
	 * @param $target
	 *
	 * @throws PropertyNotDefined
	 */
	static public function get_layout($target)
	{
		throw new PropertyNotDefined([ 'layout', $target ]);
	}
}
