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

use ICanBoogie\Render;
use ICanBoogie\Render\TemplateResolver;
use ICanBoogie\Routing\Controller;
use ICanBoogie\View\View;

class Hooks
{
	/*
	 * Prototypes
	 */

	/**
	 * Return a view for a controller.
	 *
	 * @param Controller $controller
	 *
	 * @return View
	 */
	static public function controller_get_view(Controller $controller)
	{
		$view = new View($controller);

		new View\AlterEvent($view);

		return $view;
	}

	/**
	 * Returns the shared engine collection.
	 *
	 * @return Render\EngineCollection
	 */
	static public function view_lazy_get_engines()
	{
		return Render\get_engines();
	}

	/**
	 * Returns a clone of the shared template resolver.
	 *
	 * @return Render\TemplateResolver
	 */
	static public function view_lazy_get_template_resolver()
	{
		return clone Render\get_template_resolver();
	}
}
