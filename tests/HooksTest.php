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

class HooksTest extends \PHPUnit_Framework_TestCase
{
	public function test_controller_get_view()
	{
		$controller = $this
			->getMockBuilder('ICanBoogie\Routing\Controller')
			->disableOriginalConstructor()
			->setMethods([])
			->getMockForAbstractClass();

		/* @var $controller \ICanBoogie\Routing\Controller */
		$view = $controller->view;
		$this->assertInstanceOf('ICanBoogie\View\View', $view);
		$this->assertSame($view, $controller->view);
	}

	public function test_view_get_engines()
	{
		$view = $this
			->getMockBuilder('ICanBoogie\View\View')
			->disableOriginalConstructor()
			->setMethods([])
			->getMockForAbstractClass();

		/* @var $view \ICanBoogie\View\View */
		$engines = $view->engines;
		$this->assertInstanceOf('ICanBoogie\Render\EngineCollection', $engines);
		$this->assertSame($engines, $view->engines);
	}

	public function test_view_get_template_resolver()
	{
		$view = $this
			->getMockBuilder('ICanBoogie\View\View')
			->disableOriginalConstructor()
			->setMethods([])
			->getMockForAbstractClass();

		/* @var $view \ICanBoogie\View\View */
		$template_resolver = $view->template_resolver;
		$this->assertInstanceOf('ICanBoogie\Render\TemplateResolver', $template_resolver);
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
			->getMockBuilder('ICanBoogie\Routing\Route')
			->disableOriginalConstructor()
			->getMock();

		Hooks::get_layout($target);
	}
}
