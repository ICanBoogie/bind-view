<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\View\ControllerBindingsTest;

use ICanBoogie\Routing\Controller;
use ICanBoogie\View\ControllerBindings as ViewBindings;

abstract class BoundControllerWithTemplate extends Controller
{
	use ViewBindings;

	protected function get_template()
	{
		return 'my-template';
	}
}
