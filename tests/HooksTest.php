<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Bindings\View;

use ICanBoogie\Binding\View\Hooks;
use ICanBoogie\Render\EngineCollection;
use ICanBoogie\Render\EngineCollectionTest;
use ICanBoogie\Render\TemplateResolver;
use ICanBoogie\Routing\Controller;
use ICanBoogie\Routing\Route;
use ICanBoogie\View\ControllerBindings;
use ICanBoogie\View\View;

class HooksTest extends \PHPUnit_Framework_TestCase
{
	public function test_controller_get_view()
	{
		$controller = $this
			->getMockBuilder(Controller::class)
			->disableOriginalConstructor()
			->setMethods([])
			->getMockForAbstractClass();

		/* @var $controller Controller|ControllerBindings */
		$view = $controller->view;
		$this->assertInstanceOf(View::class, $view);
		$this->assertSame($view, $controller->view);
	}

	public function test_view_get_engines()
	{
		$view = $this
			->getMockBuilder(View::class)
			->disableOriginalConstructor()
			->setMethods([])
			->getMockForAbstractClass();

		/* @var $view View */
		$engines = $view->engines;
		$this->assertInstanceOf(EngineCollection::class, $engines);
		$this->assertSame($engines, $view->engines);
	}

	public function test_view_get_template_resolver()
	{
		$view = $this
			->getMockBuilder(View::class)
			->disableOriginalConstructor()
			->setMethods([])
			->getMockForAbstractClass();

		/* @var $view View */
		$template_resolver = $view->template_resolver;
		$this->assertInstanceOf(TemplateResolver::class, $template_resolver);
		$this->assertSame($template_resolver, $view->template_resolver);
	}

	/**
	 * @expectedException \ICanBoogie\PropertyNotDefined
	 */
	public function test_get_template()
	{
		$target = $this
			->getMockBuilder('ICanBoogie\Routing\Route')
			->disableOriginalConstructor()
			->getMock();

		Hooks::get_template($target);
	}

	/**
	 * @expectedException \ICanBoogie\PropertyNotDefined
	 */
	public function test_get_layout()
	{
		$target = $this
			->getMockBuilder(Route::class)
			->disableOriginalConstructor()
			->getMock();

		Hooks::get_layout($target);
	}
}
