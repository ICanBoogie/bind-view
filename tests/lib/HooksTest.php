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
use ICanBoogie\Routing\Controller;
use ICanBoogie\Routing\ControllerAbstract;
use ICanBoogie\Routing\Route;
use ICanBoogie\View\ControllerBindings;
use ICanBoogie\View\View;
use PHPUnit\Framework\TestCase;

class HooksTest extends TestCase
{
	public function test_controller_get_view()
	{
		$controller = $this
			->getMockBuilder(ControllerAbstract::class)
			->disableOriginalConstructor()
			->setMethods([])
			->getMockForAbstractClass();

		/* @var $controller ControllerAbstract|ControllerBindings */
		$view = $controller->view;
		$this->assertInstanceOf(View::class, $view);
		$this->assertSame($view, $controller->view);
	}

	public function test_get_template()
	{
		$this->markTestSkipped();

		$target = $this
			->getMockBuilder('ICanBoogie\Routing\Route')
			->disableOriginalConstructor()
			->getMock();

		$this->expectException(PropertyNotDefined::class);
		Hooks::get_template($target);
	}

	public function test_get_layout()
	{
		$this->markTestSkipped();

		$target = $this
			->getMockBuilder(Route::class)
			->disableOriginalConstructor()
			->getMock();

		$this->expectException(PropertyNotDefined::class);
		Hooks::get_layout($target);
	}
}
